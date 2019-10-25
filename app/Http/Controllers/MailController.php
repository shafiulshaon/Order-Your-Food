<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
   
   public function basic_email(){
      $data = array('name'=>"Virat Gandhi");
     $userDetailss=$userDetails->email;
       Mail::send('mail', $data, function($message) {
         $message->to('sadmananik1@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('foodtownwalker@gmail.com','Virat Gandhi');
         $message->setBody("okkkkkkkkkkkkkk");
      });
      echo "Basic Email Sent. Check your inbox.";
   }

}