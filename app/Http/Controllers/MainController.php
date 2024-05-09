<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactReason;

class MainController extends Controller
{
    public function main() {
        // $contact_reason = [
        //     '1' => 'Dúvida',
        //     '2' => 'Elogio',
        //     '3' => 'Reclamação'
        // ];
        $contact_reason = ContactReason::all();
        return view('site.main', ['contact_reason' => $contact_reason]);
    }
}
