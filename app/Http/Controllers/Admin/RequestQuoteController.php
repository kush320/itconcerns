<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestQuote;

class RequestQuoteController extends Controller
{
    function __construct()
    {
        $this->middleware('can:quote list', ['only' => ['index', 'show']]);
        $this->middleware('can:quote delete', ['only' => ['destroy']]);
    }
   
    public function quoteList()
    {
        $details = RequestQuote::orderBy('updated_at', 'desc')->get();
        return view('admin.request.quote', compact('details'));
    }
    

    public function removeQuote($id)
    {
        $data = RequestQuote::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('message', 'Request Quote Deleted Successfully.');
    }

}