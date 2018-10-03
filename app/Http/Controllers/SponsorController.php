<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsor;
use Image;

class SponsorController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }

    
    public function index()
    {
        
        $sponsor = Sponsor::find(1);

        return view('admin.sponsor.index',compact('sponsor'));
    }

    public function update(Request $r){

        $sponsor = Sponsor::find(1);

       if($r->hasFile('img_1')){

             $img1 = $r->file('img_1');
             $img1_to = 'img_1'.'.jpg';
             $image_1 = Image::make($img1->getRealPath());
             $des_path_1 = public_path('/sponsor/');

             $image_1->resize(1200,null,function($constraint){
                  $constraint->aspectRatio();
                  $constraint->upsize();

                     })->save($des_path_1.$img1_to);

                     $sponsor->img_1 = $img1_to;

        }

        $sponsor->link_1 = $r->link_1;

        // file 2
        if($r->hasFile('img_2')){

             $img2 = $r->file('img_2');
             $img2_to = 'img_2'.'.jpg';
             $image_2 = Image::make($img2->getRealPath());
             $des_path_2 = public_path('/sponsor/');

             $image_2->resize(400,null,function($constraint){
                  $constraint->aspectRatio();
                  $constraint->upsize();

                     })->save($des_path_2.$img2_to);

                     $sponsor->img_2 = $img2_to;

        }

        $sponsor->link_2 = $r->link_2;
        // file 3
        if($r->hasFile('img_3')){

             $img3 = $r->file('img_3');
             $img3_to = 'img_3'.'.jpg';
             $image_3 = Image::make($img3->getRealPath());
             $des_path_3 = public_path('/sponsor/');

             $image_3->resize(400,null,function($constraint){
                  $constraint->aspectRatio();
                  $constraint->upsize();

                     })->save($des_path_3.$img3_to);

                     $sponsor->img_3 = $img3_to;

        }

        $sponsor->link_3 = $r->link_3;




        $sponsor->save();

        return back()->with('message_green','Ad has been updated');

    }
}
