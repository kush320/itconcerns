<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MicrosoftSolutionEnquiry;

class MicrosoftSolutionEnquiryController extends Controller
{
    function __construct()
    {
        $this->middleware('can:microsoft_solutions list', ['only' => ['index']]);
        $this->middleware('can:microsoft_solutions delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the enquiries.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquiries = MicrosoftSolutionEnquiry::orderBy('created_at', 'desc')->get();
        return view('admin.microsoft-solution.enquiries', compact('enquiries'));
    }

    /**
     * Display the specified enquiry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enquiry = MicrosoftSolutionEnquiry::findorfail($id);
        return view('admin.microsoft-solution.enquiry-view', compact('enquiry'));
    }

    /**
     * Remove the specified enquiry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enquiry = MicrosoftSolutionEnquiry::findorfail($id);
        $enquiry->delete();
        return redirect()->route('microsoft-solution-enquiries')->with('message', 'Enquiry Deleted Successfully.');
    }
}

