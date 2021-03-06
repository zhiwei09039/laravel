<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create(){

        return view('contact.create');
    }

    public function store(){
        $data = request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required',
            ]);

        //Send an email.
        Mail::to('test@test.com')->send(new ContactFormMail($data));
        //if 530 error run terminal=> php artisan config:cache   to clear previous cache
        return redirect('contact');
    }

}
