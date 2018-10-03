<?php
namespace App\Traits;

use Image;
use App\libs\Helper;
use App\Mobile;
use Auth;


trait MobileTag {

	public function print_mobile_tag($data){

      
      // default setting

      $tag_font = 'font/angsaz.ttf';
      $tag_color = '#141414';

      // default for etisalat
      $img_path = "template/mobile/etisalat_tag.png";
      $tagx = 255;
      $tagy = 90;


      // set if du
      if($data['carrier']=='du'){
        $img_path = "template/mobile/du_tag.png";
        $tagx = 260;
        $tagy = 85; //perfect
      }
      
      // Draw mobile number
      $img = Image::make(public_path($img_path));

      $full_number = $data['code'].'-'.$data['number'];

      $img->text($full_number, $tagx, $tagy, function($font) use ($tag_font,$tag_color) {  

              $font->file(public_path($tag_font));  
              $font->size(65);  
              $font->color($tag_color);  
              $font->align('center');  
              $font->valign('bottom');  
              
          });

        if($data['sold'] == 'on'){

             $img->insert(public_path('template/sold-sm.png'), 'top', 1, 2);

          }

          // final output
           $rnd = str_random(12);
           $file_name = $rnd.".png";  // Keep the png
           $img->save(public_path("mobiles/".$file_name));

           $mdata = new Mobile();

           $mdata->carrier = $data['carrier'];
           $mdata->user_id = Auth::user()->id;
           $mdata->code = $data['code'];
           $mdata->number = $data['number'];
           $mdata->price = $data['price'];
           $mdata->contact = $data['mobile'];
           $mdata->sold = $data['sold']=='on'?'on':NULL;
           $mdata->more = $data['more_details'];
           $mdata->hashtag = $data['hashtag'];
           $mdata->type = "tag";

           $mdata->repeat_three = Helper::repeat_three($data['number']);
           $mdata->repeat_four = Helper::repeat_four($data['number']);
           $mdata->enclosed = Helper::enclosed($data['number']);
           $mdata->superEnclosed = Helper::superEnclosed($data['number']);
           $mdata->doubleEnclosed =  Helper::doubleEnclosed($data['number']);
           $mdata->bothside = Helper::bothside($data['number']);
           $mdata->imgname = $file_name;
           $mdata->slug = $rnd;
           $mdata->save();


          return $file_name;

  }


  public function makecanvas($tag_array,$carrier_array,$price_array,$mobile,$more_details){

        // default setting
        $tag_count = count($tag_array);
        $img_path = "template/mobile/etisalat_canvas_blank.jpg";
        $thub_size = 240;

         // set canvas for single
            if($tag_count==1 && $carrier_array[0]=='du'){
              $img_path = "template/mobile/du_canvas_blank.jpg";
            }

        $tagx = 5;
        $tag_step = 5;
        $tag_step_up = 82;

        $pricex = 70;
        $price_step = 77; 
        $price_step_up = 82; 
        $pirce_font_size = 36;
        $price_align = 'top';

        // parameters as per tag count
        if($tag_count == 1 ){ // ok
          $thub_size = 400;
          $tagx = 45;
          $tag_step = 95;

          $pricex = 150;
          $price_step = 250;
          $pirce_font_size = 70;

        }elseif($tag_count == 2){ // ok
          $thub_size = 400;
          $tagx = 45;
          $tag_step = 25;
          $tag_step_up = 160;

          $pricex = 170;
          $price_step = 145;
          $price_step_up = 165; 
          $pirce_font_size = 65;

        }elseif($tag_count == 3){ //ok

          $thub_size = 350;
          $tagx = 70;
          $tag_step = 5;
          $tag_step_up = 130;

          $pricex = 170;
          $price_step = 112;
          $price_step_up = 132; 
          $pirce_font_size = 58;

        }elseif($tag_count == 4){ // ok

          $thub_size = 320;
          $tagx = 5;
          $tag_step = 5;
          $tag_step_up = 93;

          $pricex = 325;
          $price_step = 55;
          $price_step_up = 93; 
          $pirce_font_size = 42;

        }elseif($tag_count == 5){ // ok

          $thub_size = 280;
          $tagx = 5;
          $tag_step = 5;
          $tag_step_up = 80;

          $pricex = 305;
          $price_step = 50;
          $price_step_up = 80; 
          $pirce_font_size = 42;

        }

        // end parameters

        // create canvas
        $img = Image::make(public_path($img_path));

        $print_count = 0;

        foreach ($tag_array as $k => $tag) {

          $tag_path = 'mobiles/'.$tag;
          $print_price = Helper::checkPrice($price_array[$k]);

           //tag resize to thumbnail
           $thumb = Image::make(public_path($tag_path));
           $thumb->resize($thub_size, null, function ($constraint) {
                $constraint->aspectRatio();
            });
           $thumb->save(public_path("mobiles/mthumb.png"));

           // draw tag from thumbnail
           $img->insert(public_path("mobiles/mthumb.png"), 'top-left', $tagx, $tag_step);
           
           $tag_step += $tag_step_up;

          // Draw price
           $img->text($print_price,$pricex, $price_step, function($font) use($pirce_font_size,$price_align ){  

              $font->file(public_path('font/angsaz.ttf'));  
              $font->size($pirce_font_size);  
              $font->color('#ce0006');
              $font->align('left');
              $font->valign($price_align );   
          });

           $price_step +=$price_step_up;

          $print_count++;
        // after 5 plate print move to second column
         if($print_count==5){
            $tagx = 248;
            $tag_step = 5;
            $pricex = 300;
            $price_step = 75;
         }

         if($print_count > 9 ){
            break;
         }



          
        } // end loop

            // draw mobile number
           $img->text($mobile, 495, 485, function($font) {  

              $font->file(public_path('font/GL-Nummernschild-Eng.ttf'));  
              $font->size(36);  
              $font->color('#f2f2f2');  
              $font->align('right');  
              $font->valign('bottom');  
              
          });

            // draw more details
           if(!empty($more_details)){

             $img->text($more_details, 7, 445, function($font) {  

              $font->file(public_path('font/arial.ttf'));  
              $font->size(18);  
              $font->color('#333');  
              $font->align('left');  
              $font->valign('bottom');  
              
              });

           }

           $rnd = str_random(12);
           $file_name = $rnd.".jpg";
           $img->save(public_path("mobiles/".$file_name));

           // update the database;
           foreach ($tag_array as $tag_item) {

              $mobile_data = Mobile::where('imgname',$tag_item)->first();

              $mobile_data->canvas = $file_name;

              $mobile_data->save();
              
           }
           

           return $file_name;


  }

          
}