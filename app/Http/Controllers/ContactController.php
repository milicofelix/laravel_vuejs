<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        var_dump($_POST);
        return view('site.contact');
    }
}
