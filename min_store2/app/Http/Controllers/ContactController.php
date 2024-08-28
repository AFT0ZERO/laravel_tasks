<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $ContactFromDB = Contact::all();
        return view("dashboard.contact.index", ["contacts" => $ContactFromDB]);
    }

    public function show(Contact $contact)
    {
        return view("dashboard.contact.show", ["contact" => $contact]);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return to_route('contact.index');
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }



    public function edit(Contact $contact)
    {
        //
    }


    public function update(Request $request, Contact $contact)
    {
        //
    }


}
