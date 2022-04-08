<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

class PageController extends Controller
{
    // About Us
    function about_us(){
        return view('about_us');
    }

    // Contact Us Form
    function contact_us(){
        return view('contact_us');
    }

    // Save Contact Us Form
    function save_contactus(Request $request){
        $request->validate([
            'full_name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'msg'=>'required',
        ]);

        $data = array(
            'name'=>$request->full_name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'msg'=>$request->msg,
        );

        Mail::send('mail', $data, function($message){
            $message->to('codeartisanlab2607@gmail.com', 'Suraj Kumar')->subject('Contact Us Query');
            $message->from('codeartisanlab2607@gmail.com','CodeArtisanLab');
        });

        return redirect('page/contact-us')->with('success','Mail has been sent.');
    }
}
