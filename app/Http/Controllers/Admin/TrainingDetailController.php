<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingDetail;
use Illuminate\Support\Facades\Redirect;
class TrainingDetailController extends Controller
{
   function __construct()
    {
        $this->middleware('can:trainingdetail list', ['only' => ['index', 'show']]);
        $this->middleware('can:trainingdetail delete', ['only' => ['destroy']]);
    }  
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trainingDetail()
    {
        $details = TrainingDetail::orderBy('updated_at', 'desc')->get();
        return view('admin.trainingDetail', compact('details'));
    }

    public function removetrainingDetail($id)
    {
        $detail = TrainingDetail::findOrFail($id);
        $detail->delete();
        return Redirect::back()->with('message', 'Training Detail Deleted Successfully.');
    }
}
