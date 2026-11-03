<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
use Illuminate\Support\Str;

class TrainingController extends Controller
{
  
   function __construct()
    {
        $this->middleware('can:trainings list', ['only' => ['index', 'show']]);
        $this->middleware('can:trainings create', ['only' => ['create', 'store']]);
        $this->middleware('can:trainings edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:trainings delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Training::orderBy('updated_at', 'desc')->get();
        return view('admin.training.list', compact('details'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.training.create');
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
            'course_title' => 'required|string',
            'duration'=>'required|string',
            'venue' => 'required|string',
            'pre_requisite' => 'required|string',
            'time' => 'required|string',
          'date' => 'required|date'
        ]);
         
        // $pre_requisite = json_encode($request->input('pre_requisite'));
        $pre_requisite = $this->processPreRequisite($request->input('pre_requisite'));
        $formInput = $request->except([ 'published', 'slug',
      'pre_requisite']);
        $formInput['slug'] = $this->generateSlug($request->title, $request->slug, null);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        $formInput['pre_requisite']=($pre_requisite);
       $formInput['date'] = $request->input('date');
        Training::create($formInput);
        return redirect()->route('training.index')->with('message', 'Training Create Successfully.');
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
        $detail = Training::findOrFail($id);
        return view('admin.training.edit',compact('detail'));
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
            'course_title' => 'required|string',
            'duration'=>'required|string',
            'venue' => 'required|string',
            'pre_requisite' => 'required|string',
            'time' => 'required|string',
          'date' => 'required|date' 
        ]);

        // $pre_requisite = json_encode($request->input('pre_requisite'));
        $pre_requisite = $this->processPreRequisite($request->input('pre_requisite'));
        $oldRecord = Training::findorfail($id);
  
        $formInput = $request->except(['slug', 'published','pre_requisite']);
        $formInput['slug'] = $this->generateSlug($request->course_title, $request->slug, $oldRecord);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        $formInput['pre_requisite']= $pre_requisite;
       $formInput['date'] = $request->input('date');
        $oldRecord->update($formInput);
        return redirect()->route('training.index')->with('message', 'Training Edited Successfully.');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Training::findorfail($id);
        
        $record->delete();
        return redirect()->route('training.index')->with('message', 'Training Deleted Successfully.');
    }


    public function generateSlug($title, $slug, $oldRecord)
    {
       if(is_null($slug))
          $slugReturn = Str::slug($title);
       else
         $slugReturn = Str::slug($slug);

      $count = Training::where('slug', $slugReturn)->count();

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

    private function splitOutsideBrackets($text)
    {
        // Regular expression to split by commas not inside parentheses or brackets
        $pattern = '/,(?=(?:[^()\[\]{}]*[()\[\]{}])*(?![^()\[\]{}]*[()\[\]{}]))/';
        
        // Split the text
        $parts = preg_split($pattern, $text);
        
        // Return the parts joined by line breaks
        return implode(", ", array_map('trim', $parts));
    }

    /**
     * Process pre-requisite to split text correctly
     */
    private function processPreRequisite($pre_requisite)
    {
        return $this->splitOutsideBrackets($pre_requisite);
    }
    //  private function processPreRequisite($pre_requisite)
    // {
    //     $pattern = '/,(?![^\(]*\))/';
    //     $parts = preg_split($pattern, $pre_requisite);
    //     return implode(",\n", array_map('trim', $parts));
    // }
}
