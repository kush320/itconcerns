<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Image;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    
   function __construct()
    {
        $this->middleware('can:products list', ['only' => ['index', 'show']]);
        $this->middleware('can:products create', ['only' => ['create', 'store']]);
        $this->middleware('can:products edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:products delete', ['only' => ['destroy']]);
    }
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Products::orderBy('position', 'asc')->get();
        return view('admin.product.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
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
            'title' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:3048',
            'btn_link' => 'required|string'
        ]);

        $formInput = $request->except(['image','published']); 
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        if($request->hasFile('image')){
            $formInput['image'] = $this->imageProcessing($request->image, 1920, 1080, 'no');
          }
          Products::create($formInput);
          return redirect()->route('product.index')->with('message', 'Product Create Successfully.');
     
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
        $detail = Products::findorfail($id);
        return view('admin.product.edit', compact('detail'));
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
          'title' => 'required|string',
          'image' => 'mimes:jpg,png,jpeg,gif|max:3048',
           'btn_link' => 'required|string'
        ]);
        $oldRecord = Products::findorfail($id);
  
        $formInput = $request->except(['published', 'image']);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        if($request->hasFile('image')){
          if($oldRecord->image){
            $this->unlinkImage($oldRecord->image);
          }
          $formInput['image'] = $this->imageProcessing($request->image, 1920, 1080, 'no');
        }
        $oldRecord->update($formInput);
        return redirect()->route('product.index')->with('message', 'Product Edited Successfully.');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Products::findorfail($id);
        if($record->image){
          $this->unlinkImage($record->image);
        }
        $record->delete();
        return redirect()->route('product.index')->with('message', 'Product Deleted Successfully.');
    }

    public function updateSortOrder(Request $request)
    {
        $positions = $request->input('position');

        foreach ($positions as $position) {
            $product = Products::find($position['id']);
            if ($product) {
                $product->position = $position['position'];
                $product->save();
            }
        }

        return response()->json(['status' => 'success']);
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
          $img1->resize($width/2,$height/2, function($constraint){
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
