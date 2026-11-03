<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use Image;

class DashboardController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $detail = Dashboard::first();
    return view('admin.dashboard', compact('detail'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    abort('404');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
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
    //
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
    $this->validate($request, $this->rules());
    $formInput = $request->except([
      'logo',
      'aboutus_banner_image',
      'contactus_banner_image',
      'services_banner_image',
      'products_banner_image',
      'teams_banner_image',
      'resource_banner_image',
      'projects_banner_image',
      'testimonials_banner_image',
      'quote_banner_image',
      'about_us_image1',
      'about_us_image2',
      'career_banner_image',
      'training_banner_image',
      'partners_banner_image',
      'download_banner_image',
      'tools_banner_image',
    ]);
    $record = Dashboard::find($id);

    if ($request->hasFile('logo')) {
      if ($record->logo)
        $this->unlinkImage($record->logo);
      list($width, $height) = getimagesize($request->file('logo')->getRealPath());
      $formInput['logo'] = $this->imageProcessing($request->file('logo'), $width, $height, 'no');
    }
    
    if ($request->hasFile('contactus_banner_image')) {
      if ($record->contactus_banner_image)
        $this->unlinkImage($record->contactus_banner_image);
      $formInput['contactus_banner_image'] = $this->imageProcessing($request->contactus_banner_image, 1920, 1080, 'no');
    }

    if ($request->hasFile('aboutus_banner_image')) {
      if ($record->aboutus_banner_image)
        $this->unlinkImage($record->aboutus_banner_image);
      $formInput['aboutus_banner_image'] = $this->imageProcessing($request->aboutus_banner_image, 1920, 1080, 'no');
    }
    if ($request->hasFile('services_banner_image')) {
      if ($record->services_banner_image)
        $this->unlinkImage($record->services_banner_image);
      $formInput['services_banner_image'] = $this->imageProcessing($request->services_banner_image, 1920, 1080, 'no');
    }
     if ($request->hasFile('products_banner_image')) {
      if ($record->products_banner_image)
        $this->unlinkImage($record->products_banner_image);
      $formInput['products_banner_image'] = $this->imageProcessing($request->products_banner_image, 1920, 1080, 'no');
    }
    if ($request->hasFile('about_us_image1')) {
      if ($record->about_us_image1)
        $this->unlinkImage($record->about_us_image1);
      $formInput['about_us_image1'] = $this->imageProcessing($request->about_us_image1, 800, 533, 'no');
    }

    if ($request->hasFile('about_us_image2')) {
      if ($record->about_us_image2)
        $this->unlinkImage($record->about_us_image2);
      $formInput['about_us_image2'] = $this->imageProcessing($request->about_us_image2, 800, 533, 'no');
    }
    if ($request->hasFile('teams_banner_image')) {
      if ($record->teams_banner_image)
        $this->unlinkImage($record->teams_banner_image);
      $formInput['teams_banner_image'] = $this->imageProcessing($request->teams_banner_image, 1920, 1080, 'no');
    }
    if ($request->hasFile('projects_banner_image')) {
      if ($record->projects_banner_image)
        $this->unlinkImage($record->projects_banner_image);
      $formInput['projects_banner_image'] = $this->imageProcessing($request->projects_banner_image, 1920, 1080, 'no');
    }

    if ($request->hasFile('resource_banner_image')) {
      if ($record->resource_banner_image)
        $this->unlinkImage($record->resource_banner_image);
      $formInput['resource_banner_image'] = $this->imageProcessing($request->resource_banner_image, 1920, 1080, 'no');
    }
    
    if ($request->hasFile('testimonials_banner_image')) {
      if ($record->testimonials_banner_image)
        $this->unlinkImage($record->testimonials_banner_image);
      $formInput['testimonials_banner_image'] = $this->imageProcessing($request->testimonials_banner_image, 1920, 1080, 'no');
    }
    if ($request->hasFile('quote_banner_image')) {
      if ($record->quote_banner_image)
        $this->unlinkImage($record->quote_banner_image);
      $formInput['quote_banner_image'] = $this->imageProcessing($request->quote_banner_image, 1920, 1080, 'no');
    }
     if ($request->hasFile('career_banner_image')) {
      if ($record->career_banner_image)
        $this->unlinkImage($record->career_banner_image);
      $formInput['career_banner_image'] = $this->imageProcessing($request->career_banner_image, 1920, 1080, 'no');
    }

 if ($request->hasFile('training_banner_image')) {
      if ($record->training_banner_image)
        $this->unlinkImage($record->training_banner_image);
      $formInput['training_banner_image'] = $this->imageProcessing($request->training_banner_image, 1920, 1080, 'no');
    }
    
     if ($request->hasFile('partners_banner_image')) {
      if ($record->partners_banner_image)
        $this->unlinkImage($record->partners_banner_image);
      $formInput['partners_banner_image'] = $this->imageProcessing($request->partners_banner_image, 1920, 1080, 'no');
    }

     if ($request->hasFile('download_banner_image')) {
      if ($record->download_banner_image)
        $this->unlinkImage($record->download_banner_image);
      $formInput['download_banner_image'] = $this->imageProcessing($request->download_banner_image, 1920, 1080, 'no');
    }
    
      if ($request->hasFile('tools_banner_image')) {
      if ($record->tools_banner_image)
        $this->unlinkImage($record->tools_banner_image);
      $formInput['tools_banner_image'] = $this->imageProcessing($request->tools_banner_image, 1920, 1080, 'no');
    }

    $record->update($formInput);
    return redirect()->back()->with('message', 'Dashboard Edited Successfully.');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }

  public function rules()
  {
    $rules = [
      'site_name' => 'required',
      'logo' => 'mimes:jpg,jpeg,png,gif|max:3048',
      'contactus_image' => 'mimes:jpg,jpeg,png,gif|max:3048',
    ];
    return $rules;
  }

  public function imageProcessing($image, $width, $height, $otherpath)
  {

   $input['imagename'] = 'IT-Concerns'. '-' . rand() . '.webp';
        $thumbPath = public_path('images/thumbnail');
        $mainPath = public_path('images/main');
        $listingPath= public_path('images/listing');
  
        $img = Image::make($image->getRealPath())->fit($width, $height)->encode('webp', 90);
        $img->save($mainPath.'/'.$input['imagename']);
    if ($otherpath == 'yes') {
      $img->resize($width / 2, null, function ($constraint) {
        $constraint->aspectRatio();
      })->save($listingPath . '/' . $input['imagename'],100);

      $img->fit(200, null, function ($constraint) {
        $constraint->aspectRatio();
      })->save($thumbPath . '/' . $input['imagename'],100);
    }

    $img->destroy();
    return $input['imagename'];
  }
  


  public function unlinkImage($imagename)
  {
    $thumbPath = public_path('images/thumbnail/') . $imagename;
    $mainPath = public_path('images/main/') . $imagename;
    $listingPath = public_path('images/listing/') . $imagename;
    if (file_exists($thumbPath))
      unlink($thumbPath);
    if (file_exists($mainPath))
      unlink($mainPath);
    if (file_exists($listingPath))
      unlink($listingPath);
    return;
  }
}
