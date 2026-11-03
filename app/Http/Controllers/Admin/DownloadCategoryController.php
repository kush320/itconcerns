<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DownloadCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DownloadCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('can:category list', ['only' => ['index', 'show']]);
        $this->middleware('can:category create', ['only' => ['create', 'store']]);
        $this->middleware('can:category edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:category delete', ['only' => ['destroy']]);
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = DownloadCategory::orderBy('updated_at', 'desc')->get();
        return view('admin.category.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'slug' => 'required|string'
        ]);
       
        $formInput = $request->except([ 'published', 'slug']);
        $formInput['slug'] = $this->generateSlug($request->name, $request->slug, null);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        
        DownloadCategory::create($formInput);
        return redirect()->route('category.index')->with('message', 'Download Category Create Successfully.');
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
        $detail = DownloadCategory::findOrFail($id);
        return view('admin.category.edit',compact('detail'));
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
            'slug' => 'required|string'
        ]);
        $oldRecord = DownloadCategory::findorfail($id);
  
        $formInput = $request->except(['slug', 'published']);
        $formInput['slug'] = $this->generateSlug($request->name, $request->slug, $oldRecord);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        
        $oldRecord->update($formInput);
        return redirect()->route('category.index')->with('message', 'Download Category Edited Successfully.');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = DownloadCategory::findorfail($id);
        
        $record->delete();
        return redirect()->route('category.index')->with('message', 'Download Category Deleted Successfully.');
    }

    public function generateSlug($name, $slug, $oldRecord)
    {
       if(is_null($slug))
          $slugReturn = Str::slug($name);
       else
         $slugReturn = Str::slug($slug);

      $count = DownloadCategory::where('slug', $slugReturn)->count();

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
