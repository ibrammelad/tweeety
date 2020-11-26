<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class tweetsController extends Controller
{
    public function index()
    {return view('tweety.index',[
            'tweets'=> auth()->user()->timeline_show_tweets(),
        ]);
    }
    public function store()
    {
        $validateTweet=\request()->validate([
            'body'=>['required','max:255']
        ]);
        Tweet::create([
            'user_id'=>auth()->id(),
            'body' =>    $validateTweet['body']
            ]);
        return redirect('/tweets');

    }
}
