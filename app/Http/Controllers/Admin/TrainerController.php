<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainer;
use Image;
use Illuminate\Support\Str;

class TrainerController extends Controller
{
   function __construct()
    {
        $this->middleware('can:trainers list', ['only' => ['index', 'show']]);
        $this->middleware('can:trainers create', ['only' => ['create', 'store']]);
        $this->middleware('can:trainers edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:trainers delete', ['only' => ['destroy']]);
    } 
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Trainer::orderBy( 'updated_at','desc')->get();
        return view('admin.trainer.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trainer.create');
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
         'name'=> 'required|string',
         'image' => 'required|mimes:jpg,jpeg,png,gif|max:3048',
         'training_id'=>'required|int'
        ]);

        $formInput = $request->except(['image','published']);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        if($request->hasFile('image')){
            $formInput['image'] = $this->imageProcessing($request->image, 250, 250, 'yes');
        }
        Trainer::create($formInput);
        return redirect()->route('trainer.index')->with('message', 'Trainer Create Successfully');
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
        $detail = Trainer::findOrFail($id);
        return view('admin.trainer.edit', compact('detail'));
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
           'name' => 'required|string',
           'image'=> 'mimes:jpg,jpeg,png,gif|max:3048',
           'training_id' => 'required|int'
        ]);
        $oldRecord = Trainer::findOrFail($id);
        $formInput = $request->except(['published', 'image']);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        if($request->hasFile('image')){
          if($oldRecord->image){
            $this->unlinkImage($oldRecord->image);
          }
          $formInput['image'] = $this->imageProcessing($request->image,  250, 250, 'yes');
        }
        $oldRecord->update($formInput);
        return redirect()->route('trainer.index')->with('message', 'Trainer Edited Successfully.');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Trainer::findorfail($id);
        if($record->image){
          $this->unlinkImage($record->image);
        }
        $record->delete();
        return redirect()->route('trainer.index')->with('message', 'Trainer Deleted Successfully.');
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
}
