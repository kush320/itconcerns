<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordGeneratorController extends Controller
{
    public function generate(Request $request)
    {
      
        $attempts = $request->session()->get('password_attempts', 0);

      
        $maxAttempts = 5;

        $password = '';

     
        if ($request->isMethod('post') && $attempts < $maxAttempts) {
            $length = $request->input('length', 12); 

           
            $password = $this->generatePassword($length);

          
            $request->session()->put('password_attempts', $attempts + 1);
        }

        
        return view('frontend.passwordgenerator', compact('password', 'attempts', 'maxAttempts'));
    }

    private function generatePassword($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+=-';
        $charactersLength = strlen($characters);
        $password = '';


        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, $charactersLength - 1)];
        }

        return $password;
    }
}
