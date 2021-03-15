<?php

namespace App\Http\Controllers;
use App\Mail\SendDemoMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendDemoMail()
    {
        $email = 'tikken23@gmail.com';

        $maildata = [
            'title' => 'Markdown email for you bro',
            'message' => 'Fuck yo bro',
            'url' => 'jsux.fun'
        ];

        Mail::to($email)->send(new SendDemoMail($maildata));

        dd("Mail has been sent successfully");
    }
}
