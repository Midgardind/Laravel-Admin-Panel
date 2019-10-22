<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function portfolio()
    {
        return view('frontend.portfolio');
    }

    public function clients()
    {
        return view('frontend.clients');
    }

    public function pricing()
    {
        return view('frontend.pricing');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:250',
            'email' => 'required|email',
            'phone' => 'required|min:10',
            'message' => 'required|min:10',
        ));

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'body' => $request->message,
        );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('charlie@midgardind.com', 'Midgard Industries');
            $message->replyTo($data['email']);
            $message->subject('Message from website contact form');
        });

        Session::flash('success', 'Your message was sent successfully');

        return view('frontend.contact');
    }

    public function blog()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        return view('home')->with('posts', $posts);
    }

    
}
