<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class HashToolController extends Controller
{
    public function index()
    {
        return view('frontend.pages.generate_hash');
    }

    public function generateHash(Request $request)
{
    $request->validate([
        'input_string' => 'required|string',
        'hash_type' => 'required|in:md5,bcrypt',
    ]);

    $input_string = $request->input('input_string');
    $hash_type = $request->input('hash_type');

    if ($hash_type === 'md5') {
        $generated_hash = md5($input_string);
    } else {
        $generated_hash = bcrypt($input_string);
    }

    return redirect()->route('generate.hash')
        ->with([
            'generated_hash' => $generated_hash,
            'input_string' => $input_string,
            'hash_type' => $hash_type,
        ]);
}


    public function matchHashPage()
    {
        return view('frontend.pages.match_hash'); 
    }

    public function matchHash(Request $request)
{
    // Validate the inputs
    $request->validate([
        'original_string' => 'required|string',
        'hashed_string' => 'required|string',
        'hash_type' => 'required|in:md5,bcrypt', 
    ]);
    $original_string = $request->input('original_string');
    $hashed_string = $request->input('hashed_string');
    $hash_type = $request->input('hash_type');
    
    $is_match = false; 

    if ($hash_type === 'md5') {
        $is_match = md5($original_string) === $hashed_string;
    } elseif ($hash_type === 'bcrypt') {
        $is_match = Hash::check($original_string, $hashed_string);
    }

    return redirect()->route('match.hash')
        ->with([
            'original_string' => $original_string,
            'hashed_string' => $hashed_string,
            'is_match' => $is_match,
        ]);
}

    
}
