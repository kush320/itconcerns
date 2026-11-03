<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resource;
use Image;
use Illuminate\Support\Str;

class ResourceController extends Controller
{
    function __construct()
    {
        $this->middleware('can:resource list', ['only' => ['index', 'show']]);
        $this->middleware('can:resource create', ['only' => ['create', 'store']]);
        $this->middleware('can:resource edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:resource delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Resource::orderBy('updated_at', 'desc')->get();
        return view('admin.resource.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resource.create');
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
          'date' => 'required|date',
          'banner_image' => 'mimes:jpg,jpeg,png,gif|max:3048',
        ]);
        $formInput = $request->except(['banner_image', 'published', 'slug']);
        $formInput['slug'] = $this->generateSlug($request->title, $request->slug, null);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        if($request->hasFile('banner_image')){
          $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 1920, 1080, 'yes');
        }
    
        Resource::create($formInput);
        return redirect()->route('resource.index')->with('message', 'Resource Create Successfully.');
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
        $detail = Resource::findorfail($id);
        return view('admin.resource.edit', compact('detail'));
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
          'banner_image' => 'mimes:jpg,png,jpeg,gif|max:3048',
        ]);
        $oldRecord = Resource::findorfail($id);
  
        $formInput = $request->except(['slug', 'published', 'banner_image','image']);
        $formInput['slug'] = $this->generateSlug($request->title, $request->slug, $oldRecord);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        if($request->hasFile('banner_image')){
          if($oldRecord->banner_image){
            $this->unlinkImage($oldRecord->banner_image);
          }
          $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 1920, 1080, 'yes');
        }

     
        $oldRecord->update($formInput);
        return redirect()->route('resource.index')->with('message', 'Resource Edited Successfully.');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Resource::findorfail($id);
        if($record->banner_image){
          $this->unlinkImage($record->banner_image);
        }
        $record->delete();
        return redirect()->route('resource.index')->with('message', 'Resource Deleted Successfully.');
    }

    public function generateSlug($title, $slug, $oldRecord)
    {
       if(is_null($slug))
          $slugReturn = Str::slug($title);
       else
         $slugReturn = Str::slug($slug);

      $count = Resource::where('slug', $slugReturn)->count();

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

        $img1->fit(300, null, function($constraint){
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
