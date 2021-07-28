<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Show homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('home');
    }
}
