<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
class MailController extends Controller
{
    //

    public function send(Request $request){
        Mail::to($request->email)->send(new ContactMail($request->text, $request->subject));

        return response("", 200);
    }
}
