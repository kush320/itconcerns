<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GoogleCloudSolutionEnquiry;

class GoogleCloudSolutionEnquiryController extends Controller
{
    function __construct()
    {
        $this->middleware('can:google_cloud_solutions list', ['only' => ['index']]);
        $this->middleware('can:google_cloud_solutions delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the enquiries.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquiries = GoogleCloudSolutionEnquiry::orderBy('created_at', 'desc')->get();
        return view('admin.google-cloud-solution.enquiries', compact('enquiries'));
    }

    /**
     * Display the specified enquiry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enquiry = GoogleCloudSolutionEnquiry::findorfail($id);
        return view('admin.google-cloud-solution.enquiry-view', compact('enquiry'));
    }

    /**
     * Remove the specified enquiry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enquiry = GoogleCloudSolutionEnquiry::findorfail($id);
        $enquiry->delete();
        return redirect()->route('google-cloud-solution-enquiries')->with('message', 'Enquiry deleted successfully.');
    }
}
