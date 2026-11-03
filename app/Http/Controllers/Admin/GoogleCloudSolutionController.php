<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GoogleCloudSolution;
use Image;

class GoogleCloudSolutionController extends Controller
{
    function __construct()
    {
        $this->middleware('can:google_cloud_solutions list', ['only' => ['index', 'show']]);
        $this->middleware('can:google_cloud_solutions create', ['only' => ['create', 'store']]);
        $this->middleware('can:google_cloud_solutions edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:google_cloud_solutions delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = GoogleCloudSolution::orderBy('position', 'asc')->get();
        return view('admin.google-cloud-solution.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.google-cloud-solution.create');
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
            'name' => 'required|string',
            'description' => 'required|string',
            'features' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,webp|max:3048',
            'price' => 'nullable|numeric',
        ]);

        $formInput = $request->except(['image', 'published']);
        $formInput['published'] = is_null($request->published) ? 0 : 1;

        if ($request->hasFile('image')) {
            $formInput['image'] = $this->imageProcessing($request->image, 800, 600, 'no');
        }

        GoogleCloudSolution::create($formInput);
        return redirect()->route('google-cloud-solution.index')->with('message', 'Google Cloud solution created successfully.');
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
        $detail = GoogleCloudSolution::findorfail($id);
        return view('admin.google-cloud-solution.edit', compact('detail'));
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
            'description' => 'required|string',
            'features' => 'required|string',
            'image' => 'mimes:jpg,png,jpeg,gif,webp|max:3048',
            'price' => 'nullable|numeric',
        ]);

        $oldRecord = GoogleCloudSolution::findorfail($id);

        $formInput = $request->except(['published', 'image']);
        $formInput['published'] = is_null($request->published) ? 0 : 1;

        if ($request->hasFile('image')) {
            if ($oldRecord->image) {
                $this->unlinkImage($oldRecord->image);
            }
            $formInput['image'] = $this->imageProcessing($request->image, 800, 600, 'no');
        }

        $oldRecord->update($formInput);
        return redirect()->route('google-cloud-solution.index')->with('message', 'Google Cloud solution updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = GoogleCloudSolution::findorfail($id);
        if ($record->image) {
            $this->unlinkImage($record->image);
        }
        $record->delete();
        return redirect()->route('google-cloud-solution.index')->with('message', 'Google Cloud solution deleted successfully.');
    }

    public function updateSortOrder(Request $request)
    {
        $positions = $request->input('position');

        foreach ($positions as $position) {
            $solution = GoogleCloudSolution::find($position['id']);
            if ($solution) {
                $solution->position = $position['position'];
                $solution->save();
            }
        }

        return response()->json(['status' => 'success']);
    }

    public function imageProcessing($image, $width, $height, $otherpath)
    {
        $input['imagename'] = 'IT-Concerns' . '-' . rand() . '.webp';
        $thumbPath = public_path('images/thumbnail');
        $mainPath = public_path('images/main');
        $listingPath = public_path('images/listing');

        $img = Image::make($image->getRealPath())->fit($width, $height)->encode('webp', 90);
        $img->save($mainPath . '/' . $input['imagename']);

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
        return $input['imagename'];
    }

    public function unlinkImage($imagename)
    {
        $thumbPath = public_path('images/thumbnail/') . $imagename;
        $mainPath = public_path('images/main/') . $imagename;
        $listingPath = public_path('images/listing/') . $imagename;
        if (file_exists($thumbPath)) {
            unlink($thumbPath);
        }
        if (file_exists($mainPath)) {
            unlink($mainPath);
        }
        if (file_exists($listingPath)) {
            unlink($listingPath);
        }
        return;
    }
}
