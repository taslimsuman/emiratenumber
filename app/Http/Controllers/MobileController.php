<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\libs\Helper;
use Image;
use App\Traits\MobileTag;
use App\Mobile;
use Auth;

class MobileController extends Controller
{
    use MobileTag;

    public function __construct(){

       $this->middleware('member');
    }

    public function mobile_create(){

    	return view('mobile.create');
    }

    public function mobile_store(Request $r){

    	$this->validate($r, [

              'provider' => 'required',
              'code' => 'required',
              'number' => 'required',
              'mobile' => 'required',
              
          ]);

    		$img_path = Helper::get_mobile_canvas_path($r->provider,$r->vip);
    		$provider = $r->provider;
    		$code = $r->code;
    		$number = $r->number;
    		$full_number = $code."-".$number;
    		$mobile = $r->mobile;
    		$price = Helper::checkPrice($r->price);
    		$sold = $r->sold;
    		$isnew = Helper::checkSold($r->new_old);
        $more_details = $r->more_details;
        $hashtag = $r->hashtag;

        // default setup
        $numx = 180;
        $numy = 165;
        $num_font_size = 60;
        $pricex = 110;
        $pricey = 300;

        $soldx = 15;
        $soldy = 95;
        $sold_align = 'top';


        // set vip
        if($r->vip=='on'){ // ok

            $numx = 240;
            $numy = 280;
            $pricex = 200;
            $pricey = 400;
            $num_font_size = 72;
            $soldx = 90;
            $soldy = 220;
            $sold_align = 'top-left';

        }

    		// Draw sell number
           $img = Image::make(public_path($img_path));

           $img->text($full_number, $numx, $numy, function($font) use($num_font_size) {  

              $font->file(public_path('font/angsaz.ttf'));  
              $font->size($num_font_size);  
              $font->color('#141414');  
              $font->align('left');  
              $font->valign('top');  
              
          });


           // Draw price angsaz

           $img->text($price,$pricex, $pricey, function($font) {  

              $font->file(public_path('font/angsaz.ttf'));  
              $font->size(72);  
              $font->color('#ce0006');  
              $font->align('left');  
              $font->valign('bottom');  
              
          });



           // if has sold

           if($r->has('sold')){
             
             $img->insert(public_path('template/sold.png'), $sold_align, $soldx, $soldy);

          } 

          if(is_null($r->vip)){
              // Draw mobile
             $img->text($mobile, 495, 485, function($font) {  

                $font->file(public_path('font/GL-Nummernschild-Eng.ttf'));  
                $font->size(36);  
                $font->color('#f2f2f2');  
                $font->align('right');  
                $font->valign('bottom');  
                
            });
          }

           // final output
           $rnd = str_random(12);
           $file_name = $rnd.".jpg";
           $img->save(public_path("mobiles/".$file_name)); 

           // save to db
           $mdata = new Mobile();

           $mdata->carrier = $provider;
           $mdata->user_id = Auth::user()->id;
           $mdata->code = $code;
           $mdata->number = $number;
           $mdata->price = is_null($r->price)?0:$r->price;
           $mdata->contact = $mobile;
           $mdata->sold = $sold=='on'?$sold:NULL;
           $mdata->more = $more_details;
           $mdata->hashtag = $hashtag;
           $mdata->type = "canvas";

           $mdata->repeat_three = Helper::repeat_three($number);
           $mdata->repeat_four = Helper::repeat_four($number);
           $mdata->enclosed = Helper::enclosed($number);
           $mdata->superEnclosed = Helper::superEnclosed($number);
           $mdata->doubleEnclosed =  Helper::doubleEnclosed($number);
           $mdata->bothside = Helper::bothside($number);
           $mdata->canvas = $file_name;
           $mdata->slug = $rnd;
           $mdata->save();

           // output
           $path = Helper::mimgpath();

           return view('plate.download_canvas',compact('path','file_name'));

    }

    public function mobile_bulk(){

      return view('mobile.mobile_bulk');

    }

    public function mobile_bulk_store(Request $r){

      $this->validate($r,[
          
          'carrier' => 'required',
          'code' => 'required',
          'number' => 'required',

      ]);

          $mobile = $r->mobile;
          $more_details = $r->more_details;
          $hashtag = $r->hashtag;
          $carriers =  array_filter($r->carrier);
          $codes = array_filter($r->code);
          $numbers = array_filter($r->number);
          $prices = array_filter($r->price);
          $solds = array_filter($r->sold);

          // set array for print canvas
          $tag_array = array();
          $carrier_array = array();
          $price_array = array();
         

          $i = 0;

          foreach ($carriers as $key => $carrier) {

            if(!empty($carrier) && !empty($codes[$key]) && !empty($numbers[$key])){

              $price = !empty($prices[$key])?$prices[$key]:'0';
              

              $data = [
                  'mobile' => $mobile,
                  'more_details' => $more_details,
                  'carrier' => $carrier,
                  'code' => $codes[$key],
                  'number' => $numbers[$key],
                  'price' => $price,
                  'sold' => $solds[$key],
                  'hashtag' => $hashtag
                  ];

                  $tag = $this->print_mobile_tag($data);

            }
            // set array for canvas

            $tag_array[$i] = $tag;
            $carrier_array[$i] = $carrier;
            $price_array[$i] = $price;

              $i++;
          }          

          // print canvas
         $canvas = $this->makecanvas($tag_array,$carrier_array,$price_array,$mobile,$more_details);

         $file_name = $canvas;

      $path = Helper::mimgpath();

      return view('plate.download_canvas',compact('path','file_name'));
        

    }

    public function mobile_delete($slug){

        $mobile = Auth::user()->mobiles()->where('slug',$slug)->first();


       if(empty($mobile)){ 

         return back()->with('message_red','Number not found or there is an error');
       }
        
        $a = public_path('mobiles'.'/'.$mobile->imgname);

        if($mobile->delete()){

              if(file_exists($a)){

                 unlink($a);
              }

          // delete canvas if no record

          $this->deleteMobileCanvas($mobile->canvas);
         

         return back()->with('message_green','Number has been removed');

        }else{

         return back()->with('message_red','There is an error');

        }


    }

        private function deleteMobileCanvas($canvas){

        if($canvas!=null){

            $mobiles = Mobile::where('canvas',$canvas)->get();

            if($mobiles->count()==0){

              $canvas_file = public_path('mobiles'.'/'.$canvas);

              if(file_exists($canvas_file)){

                 unlink($canvas_file);

                 return true;
              }
             

            }

        }

        return false;
    }

    
}
