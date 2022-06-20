<?php

namespace App\Http\Controllers;

class ModeradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('moderador');
    }

    
}
