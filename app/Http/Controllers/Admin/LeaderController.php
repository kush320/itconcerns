<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;

class LeaderController extends Controller
{
  function __construct()
  {
      $this->middleware('can:leaders list', ['only' => ['index', 'show']]);
      $this->middleware('can:leaders create', ['only' => ['create', 'store']]);
      $this->middleware('can:leaders edit', ['only' => ['edit', 'update']]);
      $this->middleware('can:leaders delete', ['only' => ['destroy']]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Leader::orderBy('updated_at', 'desc')->get();
        return view('admin.leader.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.leader.create');
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
          'name' => 'required',
          'post' => 'required',
          'image' => 'mimes:jpg,jpeg,png,gif|max:3048',
         
        ]);
        $formInput = $request->except(['image', 'published']);
        // $formInput['slug'] = $this->generateSlug($request->title, $request->slug, null);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        if($request->hasFile('image')){
          $formInput['image'] = $this->imageProcessing($request->image, 500, 500, 'no');
        }
        Leader::create($formInput);
        return redirect()->route('leaders.index')->with('message', 'Leader Create Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = Leader::findorfail($id);
        return view('admin.leader.edit', compact('detail'));
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
        'name' => 'required',
        'post' => 'required',
        'image' => 'mimes:jpg,jpeg,png,gif|max:3048',
     
      ]);
      $oldRecord = Leader::findorfail($id);

      $formInput = $request->except(['published', 'image']);
      // $formInput['slug'] = $this->generateSlug($request->title, $request->slug, $oldRecord);
      $formInput['published'] = is_null($request->published) ? 0 : 1;
      if($request->hasFile('image')){
        if($oldRecord->image){
          $this->unlinkImage($oldRecord->image);
        }
        $formInput['image'] = $this->imageProcessing($request->image, 500, 500, 'no');
      }
      $oldRecord->update($formInput);
      return redirect()->route('leaders.index')->with('message', 'Leader Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Leader::findorfail($id);
        if($record->image){
          $this->unlinkImage($record->image);
        }
        $record->delete();
        return redirect()->route('leaders.index')->with('message', 'Leaders Deleted Successfully.');
    }

    public function generateSlug($title, $slug, $oldRecord)
    {
       if(is_null($slug))
          $slugReturn = Str::slug($title);
       else
         $slugReturn = Str::slug($slug);

      $count = Leader::where('slug', $slugReturn)->count();

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
