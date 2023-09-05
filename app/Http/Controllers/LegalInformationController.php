<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalInformationController extends Controller
{
    public function index() {
        return view('legal');
    }
}
