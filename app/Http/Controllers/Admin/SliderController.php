<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Image;
use Illuminate\Support\Str;



class SliderController extends Controller
{
  function __construct()
  {
      $this->middleware('can:slider list', ['only' => ['index', 'show']]);
      $this->middleware('can:slider create', ['only' => ['create', 'store']]);
      $this->middleware('can:slider edit', ['only' => ['edit', 'update']]);
      $this->middleware('can:slider delete', ['only' => ['destroy']]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Slider::orderBy('updated_at', 'asc')->get();
        return view('admin.slider.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
          'image' => 'required|mimes:jpg,jpeg,png,gif,webp|max:3048',
        ]);
        $formInput = $request->except(['image', 'published']);
        // $formInput['slug'] = $this->generateSlug($request->title, $request->slug, null);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        if($request->hasFile('image')){
          $formInput['image'] = $this->imageProcessing($request->image, 1920, 1080, 'no');
        }
        Slider::create($formInput);
        return redirect()->route('slider.index')->with('message', 'Slider Create Successfully.');
    }

    public function updateSortOrder(Request $request)
{
    // Get the positions from the request
    $positions = $request->input('position');

    // Update the order in the database
    foreach ($positions as $position) {
        $service = Slider::find($position['id']);
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
        $detail = Slider::findorfail($id);
        return view('admin.slider.edit', compact('detail'));
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
          'image' => 'mimes:jpg,png,jpeg,gif,webp|max:3048',
        ]);
        $oldRecord = Slider::findorfail($id);
  
        $formInput = $request->except(['published', 'image']);
        // $formInput['slug'] = $this->generateSlug($request->title, $request->slug, $oldRecord);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        if($request->hasFile('image')){
          if($oldRecord->image){
            $this->unlinkImage($oldRecord->image);
          }
          $formInput['image'] = $this->imageProcessing($request->image, 1920, 1080, 'no');
        }
        $oldRecord->update($formInput);
        return redirect()->route('slider.index')->with('message', 'Slider Edited Successfully.');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Slider::findorfail($id);
        if($record->image){
          $this->unlinkImage($record->image);
        }
        $record->delete();
        return redirect()->route('slider.index')->with('message', 'Slider Deleted Successfully.');
    }

       public function imageProcessing($image, $width, $height, $otherpath)
{
  
    $input['imagename'] = 'IT-Concerns'. '-' . rand() . '.webp';

   
    $thumbPath = public_path('images/thumbnail');
    $mainPath = public_path('images/main');
    $listingPath = public_path('images/listing');

    $img = Image::make($image->getRealPath())->fit($width, $height)->encode('webp', 90);
    $img->save($mainPath.'/'.$input['imagename']);


 
    $imgMobile = Image::make($image->getRealPath());
    $imgMobile->resize(480, 320, function ($constraint) {
        $constraint->aspectRatio(); 
    })->save($thumbPath . '/' . $input['imagename']);

 
    if ($otherpath == 'yes') {
        $img1 = Image::make($image->getRealPath());


        $img1->resize($width / 2, $height / 2, function ($constraint) {
            $constraint->aspectRatio();
        })->save($listingPath . '/' . $input['imagename']);

      
        $img1->fit(200, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($thumbPath . '/' . $input['imagename']);

        $img1->destroy();
    }


    $img->destroy();
    $imgMobile->destroy();


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
