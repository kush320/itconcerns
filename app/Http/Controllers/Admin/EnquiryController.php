<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;


class EnquiryController extends Controller
{
    function __construct()
    {
        $this->middleware('can:enquiry list', ['only' => ['index', 'show']]);
        $this->middleware('can:enquiry delete', ['only' => ['destroy']]);
    }
   
  public function enquiryList()
    {
        $details = ContactUs::orderBy('updated_at', 'desc')->get();
        return view('admin.contactus', compact('details'));
    }

    public function removeEnquiry($id)
    {
        $data = ContactUs::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('message', 'Enquiry Deleted Successfully.');
    }


  
}
