<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    function __construct()
    {
        $this->middleware('can:career list', ['only' => ['index', 'show']]);
        $this->middleware('can:career create', ['only' => ['create', 'store']]);
        $this->middleware('can:career edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:career delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Career::orderBy('updated_at', 'desc')->get();
        return view('admin.career.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.career.create');
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
            'number' => 'required|int',
            'job_type' => 'required|string',
            'shift' => 'required|string',
            'career_level' => 'required|string' 
        ]);
       
        $formInput = $request->except([ 'published', 'slug']);
        $formInput['slug'] = $this->generateSlug($request->title, $request->slug, null);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        
        Career::create($formInput);
        return redirect()->route('career.index')->with('message', 'Career Create Successfully.');
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
        $detail = Career::findOrFail($id);
        return view('admin.career.edit',compact('detail'));
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
            'number' => 'required|int',
            'job_type' => 'required|string',
            'shift' => 'required|string',
            'career_level'=>'required|string' 
        ]);
        $oldRecord = Career::findorfail($id);
  
        $formInput = $request->except(['slug', 'published', 'banner_image']);
        $formInput['slug'] = $this->generateSlug($request->title, $request->slug, $oldRecord);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        
        $oldRecord->update($formInput);
        return redirect()->route('career.index')->with('message', 'Career Edited Successfully.');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Career::findorfail($id);
        
        $record->delete();
        return redirect()->route('career.index')->with('message', 'Career Deleted Successfully.');
    }

    public function generateSlug($title, $slug, $oldRecord)
    {
       if(is_null($slug))
          $slugReturn = Str::slug($title);
       else
         $slugReturn = Str::slug($slug);

      $count = Career::where('slug', $slugReturn)->count();

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
