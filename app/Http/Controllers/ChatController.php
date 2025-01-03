<?php

namespace App\Http\Controllers;

use App\Events\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function send_message(Request $request){
       $userName =auth()->user()->name;
        // save into database if needed
        event(new Chat($request->message,$userName,$request->senderId));
        
        return response()->json([
            'message'=>'message send',
            'status'=>1
        ]);
    }
}
