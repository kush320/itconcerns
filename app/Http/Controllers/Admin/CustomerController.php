<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Customers;


class CustomerController extends Controller
{
    function __construct()
    {
        $this->middleware('can:customers list', ['only' => ['index', 'show']]);
        $this->middleware('can:customers create', ['only' => ['create', 'store']]);
        $this->middleware('can:customers edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:customers delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Customers::orderBy('updated_at', 'desc')->get();
        return view('admin.customers.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
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
          'number' => 'required|integer',
         
        ]);
        $formInput = $request->except([ 'published']);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
       
        Customers::create($formInput);
        return redirect()->route('customers.index')->with('message', 'Customers Number Create Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = Customers::findorfail($id);
        return view('admin.customers.edit', compact('detail'));
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
        'number' => 'required|integer',
     
      ]);
      $oldRecord = Customers::findorfail($id);

      $formInput = $request->except(['published']);
      $formInput['published'] = is_null($request->published) ? 0 : 1;
      $oldRecord->update($formInput);
      return redirect()->route('customers.index')->with('message', 'Customers Number Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Customers::findorfail($id);
        
        $record->delete();
        return redirect()->route('customers.index')->with('message', 'Customers Number Deleted Successfully.');
    }

}
