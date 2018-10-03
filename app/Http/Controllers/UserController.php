<?php

namespace App\Http\Controllers;


use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Plate;
use App\User;
use Auth;
use Image;

class UserController extends Controller
{
    public function __construct(){

    	$this->middleware('member');

    }


 

    public function change_password(){

        return view('user.change_password');

    }

    public function changePassword(Request $r){

        $this->validate($r,[
                'old_pass' => 'required',
                'new_pass' => 'required|string|min:6',
                'con_pass' => 'required|string|min:6',

        ]);
            
            if(Hash::check($r->old_pass,Auth::user()->password)){

                if($r->new_pass==$r->con_pass){

                    $user = User::findOrFail(Auth::user()->id);

                    $user->password = Hash::make($r->new_pass);

                    $user->save();

                    return redirect('/home');

                }else{

                  return back()->with('message_red','Password does not match');

                }

            }else{

                return back()->with('message_red','Old password does not match');
            }


    }


    public function myprofile(){

        $plates = Auth::user()->plates()->where('type','tag')->get();
        $canvases = Auth::user()->plates()->where('type','canvas')->get();
        $numbers = Auth::user()->mobiles()->get();

   


        return view('user.profile',compact('plates','numbers','canvases'));

    }


    public function myprofile_update(Request $r){

        $user = User::findOrFail(Auth::user()->id);

        $this->validate($r,[
            'name' => 'required|string|max:255',
            'contact' => 'required',

            'email' => [
                        'required',
                        Rule::unique('users')->ignore($user->id),
                    ],


            'profile' => [
                        'required',
                        Rule::unique('users')->ignore($user->id),
                    ]

            
        ]);


       

       if($r->hasFile('photo')){

         $img = $r->file('photo');

         $rnd = str_random(12);

         $imgto = $rnd.'.'.$img->getClientOriginalExtension();

         $image = Image::make($img->getRealPath());

         $des_path = public_path('/profile/');

         $image->resize(250,250,function($constraint){
                  $constraint->aspectRatio();
                  $constraint->upsize();

         })->save($des_path.$imgto);

         

         $user->photo = $imgto;

       }

       $user->name = $r->name;
       $user->profile = preg_replace('/\s+/', '', $r->profile);
       $user->email = $r->email;
       $user->contact = $r->contact;
       $user->hashtag = $r->hashtag;
       $user->more_details = $r->more_details;
       $user->instagram = $r->instagram;
       $user->twitter = $r->twitter;
       $user->facebook = $r->facebook;
       
       if($user->email != $r->email){

            $user->email_verify = null;


       }

       if($user->contact!=$r->contact){

            $user->contact_verify = null;

       }

       $user->save();


       return back()->with('message_green','Profile has been updated');



    }

 
   

}
