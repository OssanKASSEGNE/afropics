<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller 
{   
    /**
     * Get dashboard view with user infos
     *
     * @return Illuminate\Http\Response
     */
    public function create()
    {
        $viewInfo = [
            'user' => Auth::user(),
        ];
        return view('/dashboard', $viewInfo);
    }
}
