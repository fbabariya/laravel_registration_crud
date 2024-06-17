<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\countrylist;
use GuzzleHttp\Promise\Create;

use App\Mail\welcomeMail;
use Illuminate\Support\Facades\Mail;

class CountrylistController extends Controller
{   

    //code for mail send
    // public function mail(Request $request)
    // {
    //     $emailData=[
    //         'subject'=>'welcome in laravel mailing',
    //         'body'=>'this is first try of sending mail through larvel mail facade.'
    //     ];
    //     Mail::to('falgunibabariya07@gmail.com')->send(new welcomeMail($emailData));
    // }
}

