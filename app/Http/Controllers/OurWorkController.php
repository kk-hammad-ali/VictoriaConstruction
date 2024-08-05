<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OurWorkController extends Controller
{
    public function index()
    {
        return view('public.our-work');
    }
}
