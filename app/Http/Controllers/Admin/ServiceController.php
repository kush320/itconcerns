<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Image;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
  function __construct()
  {
      $this->middleware('can:service list', ['only' => ['index', 'show']]);
      $this->middleware('can:service create', ['only' => ['create', 'store']]);
      $this->middleware('can:service edit', ['only' => ['edit', 'update']]);
      $this->middleware('can:service delete', ['only' => ['destroy']]);
  }  
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Service::orderBy('position', 'asc')->get();
        return view('admin.service.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.service.create');
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
          'image' => 'required|mimes:jpg,jpeg,png,gif|max:3048',
          'description' => 'required',
        ]);
        $formInput = $request->except(['image', 'published']);
        $formInput['slug'] = $this->generateSlug($request->title, $request->slug, null);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        if($request->hasFile('image')){
          $formInput['image'] = $this->imageProcessing($request->image, 1200, 800, 'yes');
        }
        Service::create($formInput);
        return redirect()->route('service.index')->with('message', 'Service Create Successfully.');
    }



 // Assuming you have a controller method like this
public function updateSortOrder(Request $request)
{
    // Get the positions from the request
    $positions = $request->input('position');

    // Update the order in the database
    foreach ($positions as $position) {
        $service = Service::find($position['id']);
        $service->position = $position['position'];
        $service->save();
    }

    return response()->json(['status' => 'success']);
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
        $detail = Service::findOrFail($id);
        return view('admin.service.edit', compact('detail'));
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
          'image' => 'mimes:jpg,png,jpeg,gif|max:3048',
          'description' => 'required',
        ]);
        $oldRecord = Service::findorfail($id);
  
        $formInput = $request->except(['published', 'image']);
        // $formInput['slug'] = $this->generateSlug($request->title, $request->slug, $oldRecord);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        if($request->hasFile('image')){
          if($oldRecord->image){
            $this->unlinkImage($oldRecord->image);
          }
          $formInput['image'] = $this->imageProcessing($request->image,  1200, 800, 'yes');
        }
        $oldRecord->update($formInput);
        return redirect()->route('service.index')->with('message', 'Service Edited Successfully.');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Service::findorfail($id);
        if($record->image){
          $this->unlinkImage($record->image);
        }
        $record->delete();
        return redirect()->route('service.index')->with('message', 'Service Deleted Successfully.');
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
          })->encode('webp', 90)->save($listingPath.'/'.$input['imagename']);
  
          $img1->fit(200, null, function($constraint){
            $constraint->aspectRatio();
          })->encode('webp', 90)->save($thumbPath.'/'.$input['imagename']);
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

      public function generateSlug($title, $slug, $oldRecord)
      {
         if(is_null($slug))
            $slugReturn = Str::slug($title);
         else
           $slugReturn = Str::slug($slug);
  
        $count = Service::where('slug', $slugReturn)->count();
  
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
}
