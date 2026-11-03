<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CareerDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:careerdetail list', ['only' => ['detailList']]);
        $this->middleware('can:careerdetail delete', ['only' => ['removeDetail']]);
    }

    public function detailList()
    {
        $details = CareerDetail::orderBy('updated_at', 'desc')->get();
        return view('admin.careerDetail', compact('details'));
    }

    public function removeDetail($id)
    {
        $detail = CareerDetail::findOrFail($id);
        $detail->delete();
        return Redirect::back()->with('message', 'Career Detail Deleted Successfully.');
    }
    
    
      public function viewCV($filename)
    {
        $path = public_path('cv/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path, [
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
        ]);
    }
  

    
}
