<?php

namespace App\Http\Controllers;

use App\Models\newprocessing;
use Illuminate\Http\Request;

class WFController extends Controller
{
    public function processing()
    {
        $processing=newprocessing::all();
        return view('wf.processing', compact('processing'));
    }
}
