<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NotifyMail;

class MailController extends Controller
{
    function index()
    {
        Mail::to('aliparsa883@gmail.com')->send(new NotifyMail());
        if(Mail::failures()){
            return response()->Fail('sorry! please try again');
        }else{
            return response()->success('Email send successfuly');
        }
    }
}
