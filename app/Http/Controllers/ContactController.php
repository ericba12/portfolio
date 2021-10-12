<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Mail\Contact;


class ContactController extends Controller
{
    public function create () {

        return view('/contact/contact');
    }

    public function confirm(ContactRequest $request) {

        \App\Models\Contact::create([
            'email' => $request->email,
            'message' => $request->message,
        ]);
        Mail::to('eribain@gmail.com')
            ->send(new Contact($request->except('_token')));
        return view('contact/confirm');
    }
}
