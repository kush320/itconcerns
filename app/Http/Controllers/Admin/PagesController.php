<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use Image;

class PagesController extends Controller
{
  public $readonlyslugpages;

  function __construct()
  {
      $this->middleware('can:page list', ['only' => ['index', 'show']]);
      $this->middleware('can:page create', ['only' => ['create', 'store']]);
      $this->middleware('can:page edit', ['only' => ['edit', 'update']]);
      $this->middleware('can:page delete', ['only' => ['destroy']]);

      $this->readonlyslugpages = ['about-us'];

  }  
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    
    public function index()
    {
        $details = Page::orderBy('updated_at','desc')->get();
  
        $readonlyslug = $this->readonlyslugpages;
        return view('admin.pages.list',compact('details', 'readonlyslug'));
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'title' => 'required',
          'image' => 'nullable|mimes:jpg,jpeg,png,gif|max:3048',
        ]);
        
        try {
            $formInput = $request->except(['image', 'published', 'slug', 'keywords']);
            
            // Handle keywords field (migration uses 'keyword' singular)
            if ($request->has('keywords')) {
                $formInput['keyword'] = $request->keywords;
            }
            
            $formInput['slug'] = $this->generateSlug($request->title, $request->slug, null);
            $formInput['published'] = is_null($request->published) ? 0 : 1;
            
            if($request->hasFile('image')){
              $formInput['image'] = $this->imageProcessing($request->image, 1349, 356, 'no');
            }
            
            Page::create($formInput);
            return redirect()->route('pages.index')->with('message', 'Page created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to create page: ' . $e->getMessage()]);
        }
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = Page::findorfail($id);
        //to display delete buttom only if user have created the page
        $readonlyslug = $this->readonlyslugpages;
        return view('admin.pages.edit', compact('detail', 'readonlyslug'));
      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          'title' => 'required',
          'image' => 'nullable|mimes:jpg,png,jpeg,gif|max:3048',
        ]);
        
        try {
            $oldRecord = Page::findorfail($id);
      
            $formInput = $request->except(['slug', 'published', 'image', 'keywords']);
            
            // Handle keywords field (migration uses 'keyword' singular)
            if ($request->has('keywords')) {
                $formInput['keyword'] = $request->keywords;
            }
            
            $formInput['slug'] = $this->generateSlug($request->title, $request->slug, $oldRecord);
            $formInput['published'] = is_null($request->published) ? 0 : 1;
            
            if($request->hasFile('image')){
              if($oldRecord->image){
                $this->unlinkImage($oldRecord->image);
              }
              $formInput['image'] = $this->imageProcessing($request->image, 1349, 356, 'no');
            }
            
            $oldRecord->update($formInput);
            return redirect()->route('pages.index')->with('message', 'Page updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update page: ' . $e->getMessage()]);
        }
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Page::findorfail($id);
        if($record->image){
          $this->unlinkImage($record->image);
        }
        $record->delete();
        return redirect()->route('pages.index')->with('message', 'Page Deleted Successfully.');
      }
      public function generateSlug($title, $slug, $oldRecord)
      {
         if(is_null($slug))
            $slugReturn = Str::slug($title);
         else
           $slugReturn = Str::slug($slug);
  
        $count = Page::where('slug', $slugReturn)->count();
  
          if(!is_null($oldRecord)){
            if($oldRecord->slug == $slugReturn){
              return $slugReturn;
            }else{
              if($count > 0)
                return $slugReturn . '-' . $count;
              else
                return $slugReturn;
            }
          } else {
              if($count > 0)
                return $slugReturn . '-' . $count;
              else
                return $slugReturn;
          }
      }
  
      public function imageProcessing($image, $width, $height, $otherpath){
  
       $input['imagename'] = 'IT-Concerns'. '-' . rand() . '.webp';
        $thumbPath = public_path('images/thumbnail');
        $mainPath = public_path('images/main');
        $listingPath= public_path('images/listing');
  
        $img = Image::make($image->getRealPath())->fit($width, $height)->encode('webp', 90);
        $img->save($mainPath.'/'.$input['imagename']);
        if($otherpath == 'yes'){
          $img1 = Image::make($image->getRealPath());
          $img1->resize($width/2, null, function($constraint){
            $constraint->aspectRatio();
          })->save($listingPath.'/'.$input['imagename']);
  
          $img1->fit(200, null, function($constraint){
            $constraint->aspectRatio();
          })->save($thumbPath.'/'.$input['imagename']);
          $img1->destroy();
        }
  
          $img->destroy();
          return $input['imagename'];
      }
  
      public function unlinkImage($imagename)
      {
        $thumbPath = public_path('images/thumbnail/') . $imagename;
        $mainPath = public_path('images/main/') . $imagename;
        $listingPath= public_path('images/listing/') . $imagename;
         if(file_exists($thumbPath))
            unlink($thumbPath);
         if(file_exists($mainPath))
            unlink($mainPath);
         if(file_exists($listingPath))
            unlink($listingPath);
        return;
      }  
}
