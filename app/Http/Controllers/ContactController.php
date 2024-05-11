<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactReason;

class ContactController extends Controller
{

    public function index() {

        // $contact_reason = [
        //     '1' => 'Dúvida',
        //     '2' => 'Elogio',
        //     '3' => 'Reclamação'
        // ];
        $contact_reason = ContactReason::all();
        // $contacts->name = $request->input('name');
        // $contacts->phone = $request->input('phone');
        // $contacts->email = $request->input('email');
        // $contacts->contact_reason = $request->input('contact_reason');
        // $contacts->msg = $request->input('msg');
        
        // dd($contacts);
        //$contacts->create($request->all());

        return view('site.contact', ['contact_reason' => $contact_reason]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'email|unique:contacts',
            'contact_reason_id' => 'required',
            'msg' => 'required|max:2000'
        ],
        ['name.required' => 'O campo nome deve ser preenchido!']
    );
        $contacts = new Contact();
        $contacts->fill($request->all());
        $contacts->save();
        return redirect()->route('site.contato');
    }
}
