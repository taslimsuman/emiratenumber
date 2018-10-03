<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Mail\EmailConfirm;
use Illuminate\Support\Facades\Mail;


class SignupController extends Controller
{
   
    public function user_register(Request $r){

       

        $this->validate($r,[
            'name' => 'required|string|max:255',
            'profile' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $token = random_int(10000, 99999);

      
        $profile = preg_replace('/\s+/', '', $r->profile);

         $user = new User();

         $user->name = $r->name;
         $user->profile = $profile;
         $user->contact = $r->contact;
         $user->email = $r->email;
         $user->password = Hash::make($r->password);
         $user->role_id = 3;
         $user->email_token = $token;

         $user->save();

         $content = $user;

         // send email with active code
         $error = '';
         try {
             
             Mail::to($r->email)->send(new EmailConfirm($content));

         } catch (Exception $e) {

            $error = $e->getMessage();
             
         }
         


         return redirect('/login')->with('message_info',$error);

    }

    public function user_email_confirm(){

        if(Auth::user()->email_verify!='on'){

             return view('user.email_confirm');

        }else{

            return redirect('/home');

        }

        
    }

    public function user_activate(Request $r){

        $this->validate($r,[

            'email_token' => 'required|max:5',

        ]);

       
        
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id );

        //return $user->email_token;


        if($user->email_token==$r->email_token){

            $user->email_verify = 'on';
            $user->email_token = NULL;
            $user->status = 1;

            $user->save();

            return redirect('/home')->with('message_green','Your profile has been activated');


        }else{

            return back()->with('message_red','Code does not match');

           
        }




    }

}
