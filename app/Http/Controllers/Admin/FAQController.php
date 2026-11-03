<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;


class FAQController extends Controller
{
    
    function __construct()
    {
        $this->middleware('can:faq list', ['only' => ['index', 'show']]);
        $this->middleware('can:faq create', ['only' => ['create', 'store']]);
        $this->middleware('can:faq edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:faq delete', ['only' => ['destroy']]);
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = FAQ::orderBy( 'question')->get();
        return view('admin.faq.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
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
          'question' => 'required',
          'answer' => 'required',
        ]);
        $formInput = $request->except([ 'published']);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        FAQ::create($formInput);
        return redirect()->route('faq.index')->with('message', 'FAQ Create Successfully.');
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
        $detail = FAQ::findOrFail($id);
        return view('admin.faq.edit', compact('detail'));
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
          'question' => 'required',
          'answer' => 'required',
        ]);
        $oldRecord = FAQ::findorfail($id);
  
        $formInput = $request->except(['published']);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        $oldRecord->update($formInput);
        return redirect()->route('faq.index')->with('message', 'FAQ Edited Successfully.');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = FAQ::findorfail($id);
        $record->delete();
        return redirect()->route('faq.index')->with('message', 'FAQ Deleted Successfully.');
    }
}
