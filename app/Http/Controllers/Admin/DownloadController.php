<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DownloadCategory;
use Illuminate\Http\Request;
use App\Models\Download;
use Illuminate\Support\Facades\Storage;
class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = DownloadCategory::with('downloads')->get();
        return view('admin.download.list', compact('details'));
    }
   
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
       
        return view('admin.download.create');
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
            'name' => 'required|string',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,csv,txt|max:2048',
            'download_categories_id' => 'required|int'
        ]);
    
        $formInput = $request->except(['file', 'published']);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
    
        if ($request->hasFile('file')) {
            $formInput['file'] = $this->fileProcessing($request->file);
        }
    
        Download::create($formInput);
    
        return redirect()->route('download.index')->with('message', 'Download created successfully');
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
        $detail = Download::findOrFail($id);
        return view('admin.download.edit', compact('detail'));
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
            'name' => 'required|string',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,csv,txt|max:2048',
            'download_categories_id' => 'required|int'
        ]);

        $oldRecord = Download::findOrFail($id);
        $formInput = $request->except(['published', 'file']);
        $formInput['published'] = is_null($request->published) ? 0 : 1;

        if ($request->hasFile('file')) {
            if ($oldRecord->file) {
                $this->unlinkFile($oldRecord->file);
            }
            $formInput['file'] = $this->fileProcessing($request->file);
        }

        $oldRecord->update($formInput);
        return redirect()->route('download.index')->with('message', 'Download updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Download::findOrFail($id);
        if ($record->file) {
            $this->unlinkFile($record->file);
        }
        $record->delete();
        return redirect()->route('download.index')->with('message', 'Download deleted successfully.');
    }


   

    private function fileProcessing($file)
    {
        $directory = 'uploads'; // Directory relative to public/
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path($directory), $fileName);
        return $fileName; // Return just the filename
    }
    


    private function unlinkFile($filePath)
    {
        $filePath = public_path($filePath);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

   


    public function viewDownload($filename)
    {
        $path = public_path('uploads/' . $filename); // Construct path correctly
    
        if (!file_exists($path)) {
            abort(404);
        }
    
        return response()->file($path, [
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
        ]);
    }
    
    



}
