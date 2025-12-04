<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackYourOrderController extends Controller
{
    public function index(){

        return view('track-your-order');
    }
}
