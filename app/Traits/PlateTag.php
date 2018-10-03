<?php
namespace App\Traits;

use Image;
use App\libs\Helper;
use App\Plate;
use Auth;


trait PlateTag {

	public function Print_Plate_Tag($city,$mobile,$plate,$code,$price,$sold,$more_details,
                 $hashtag,$isold){

          // default settings
          

          $txtfont_color = '#323433';
          $txtfont = 'font/GL-Nummernschild-Eng.ttf';

          $codefontcolor = '#323433'; 


          if($city=='Abu Dhabi' && $isold=='on'){

            $img_path = "template/tag/plate_tag_auh_old.png";          

            // for plate
            $platex = 330;
            $platey = 85;
            $txtfont_size = 95;
           
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 52;
            $codey = 70;
            $codefontsize = 65;
            $codefontcolor = '#fff';


          }elseif($city=='Abu Dhabi'){
            $img_path = "template/tag/plate_tag_auh.png";
           

            // for plate
            $platex = 330;
            $platey = 85;
            $txtfont_size = 95;
            
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 51;
            $codey = 65;
            $codefontsize = 67;
           

          }elseif($city=='Dubai' && $isold=='on'){
          
            $img_path = "template/tag/plate_tag_dxb_old.png";
            $txtfont = 'font/AprilFoolsDay.ttf';

             // for plate
            $platex = 330;
            $platey = 87;
            $txtfont_size = 95;
            
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 60;
            $codey = 75;
            $codefontsize = 72;

          }elseif($city=='Dubai'){

            $img_path = "template/tag/plate_tag_dxb.png";
            $txtfont = 'font/AprilFoolsDay.ttf';

             // for plate
            $platex = 330;
            $platey = 87;
            $txtfont_size = 95;
           
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 78;
            $codey = 99;
            $codefontsize = 58;

          }elseif($city=='Sharjah'){
            
            $img_path = "template/tag/plate_tag_shj.png";
            

            // for plate
            $platex = 330;
            $platey = 85;
            $txtfont_size = 95;
            
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 50;
            $codey = 75;
            $codefontsize = 65;
            
          }elseif($city=='Ajman'){
            
            $img_path = "template/tag/plate_tag_ajm.png";
            

            // for plate
            $platex = 120;
            $platey = 85;
            $txtfont_size = 95;
            
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 440;
            $codey = 55;
            $codefontsize = 65;
            
          }elseif($city=='Fujairah'){
            
            $img_path = "template/tag/plate_tag_fuj.png";
           

            // for plate
            $platex = 330;
            $platey = 85;
            $txtfont_size = 95;
           
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 50;
            $codey = 75;
            $codefontsize = 65;
            
          }elseif($city=='Ras-Al-Khaimah'){
            
            $img_path = "template/tag/plate_tag_rak.png";
            

            // for plate
            $platex = 330;
            $platey = 85;
            $txtfont_size = 95;
            
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 58;
            $codey = 65;
            $codefontsize = 65;
            
          }elseif($city=='Umm Al Quwain'){
            
            $img_path = "template/tag/plate_tag_umq.png";
           

            // for plate
            $platex = 340;
            $platey = 85;
            $txtfont_size = 95;
            
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 58;
            $codey = 65;
            $codefontsize = 65;
            
          }

          

          // Draw plate number
           $img = Image::make(public_path($img_path));

           $img->text($plate, $platex, $platey, function($font) use ($txtfont,$txtfont_size,$txtfont_color) {  

              $font->file(public_path($txtfont));  
              $font->size($txtfont_size);  
              $font->color($txtfont_color);  
              $font->align('center');  
              $font->valign('bottom');  
              
          });
           
           // Draw code
           $img->text($code,$codex, $codey, function($font) use ($codefont,$codefontsize,$codefontcolor){  

              $font->file(public_path($codefont));  
              $font->size($codefontsize);  
              $font->color($codefontcolor);
              $font->align('center');
              $font->valign('bottom');   
              
              
          });


           // if has sold print sold watermark

           if($sold == 'on'){

             
             $img->insert(public_path('template/sold-sm.png'), 'top', 2, 5);

          }

          // final output
           $rnd = str_random(12);
           $file_name = $rnd.".png";  // Keep the png
           $img->save(public_path("uploads/".$file_name));

           // insert to database

           $data = new Plate();

           $data->plate = $plate;
           $data->user_id = Auth::user()->id;
           $data->city = $city;
           $data->code = $code;
           $data->price = is_null($price)?'0':$price;
           $data->sold = $sold=='on'?$sold:NULL;
           $data->isold = $isold=='on'?$isold:NULL;
           $data->contact = $mobile;
           $data->enclosed = Helper::enclosed($plate);
           $data->superEnclosed = Helper::superEnclosed($plate);
           $data->doubleEnclosed = Helper::doubleEnclosed($plate);
           $data->middleTriple = Helper::middleTriple($plate);
           $data->type = "tag";
           $data->imgname = $file_name;
           $data->slug = $rnd;
           $data->more = $more_details;
           $data->hashtag = $hashtag;
           $data->digits = strlen($plate);
           $data->save();


          return $file_name;

	}


	public function makecanvas($city_array,$tagarray,$mobile,$price_array,$more_details){

        $if_has_ad = False;

        foreach ($city_array as $city) {
          if($city=="Abu Dhabi" || $city=="Abu Dhabi Old"){
              $if_has_ad = True;
          }
        }
      // set canvas path
      if($if_has_ad){

        $img_path = "template/canvas/plate_cnv_auh_blank.jpg";

      }else{

        // defalut for any other city
        $img_path = "template/canvas/plate_cnv_dxb_blank.jpg";

      }

      // default for 10 plate
      $tag_count = count($tagarray);
      $thub_size = 240;
      $img_x = 5;
      $step = 5;
      $step_up = 85;

      $pricex = 20;
      $price_step = 65; 
      $price_step_up = 85; 
      $pirce_font_size = 40;
      $price_align = 'top';
      

      // Bigger size for up to 5 plates
      if($tag_count == 1 ){
         $thub_size = 490;
         $step = 95;
         $step_up = 160;
         $pricex = 130;
         $price_step = 235;
         $price_step_up = 160;
         $pirce_font_size = 70;
         $price_align = 'top';

      }elseif($tag_count == 2){
         $thub_size = 490;
         $step = 35;
         $step_up = 186;
         $pricex = 120;
         $price_step = 160;
         $price_step_up = 190;
         $pirce_font_size = 70;
         $price_align = 'top';

      }elseif($tag_count < 4){
        
         //--
         $thub_size = 400;
         $img_x = 48;
         $step_up = 140; 
         $pricex = 120;
         $price_step = 100;
         $price_step_up = 140;
         $pirce_font_size = 50;
         $price_align = 'top';

      }elseif($tag_count<5){
         $step = 15;
       
        //--
         $thub_size = 320;
         $step_up = 97; 
         $pricex = 325;
         $price_step = 40; 
         $price_step_up = 97;  
         $pirce_font_size = 40;
         $price_align = 'top';

      }elseif($tag_count<6){
        
         $thub_size = 320;
         $step_up = 85; 
         $pricex = 325;
         $price_step = 30; 
         $price_step_up = 85; 
         $pirce_font_size = 40;
         $price_align = 'top';
      }

      
      

      $img = Image::make(public_path($img_path));
      
      $print_count = 0;

      for($i=0;$i<$tag_count;$i++){

          
          $plate_path =  'uploads/'.$tagarray[$i];

           $print_price = Helper::checkPrice($price_array[$i]);

          //plate tag resize to thumbnail

           $thumb = Image::make(public_path($plate_path));
           $thumb->resize($thub_size, null, function ($constraint) {
                $constraint->aspectRatio();
            });
           $thumb->save(public_path("uploads/thumb.png"));


        // draw plate tag from thumbnail
       $img->insert(public_path("uploads/thumb.png"), 'top-left', $img_x, $step);
       
       $step += $step_up;

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

            $img_x = 248;
            $step = 5;
            $pricex = 265;
            $price_step = 65;

         }
          // after ten image break if any
         if($print_count > 9 ){
            break;
         }

      } // end for loop

      // draw mobile number
           $img->text($mobile, 495, 485, function($font) {  

              $font->file(public_path('font/GL-Nummernschild-Eng.ttf'));  
              $font->size(36);  
              $font->color('#f2f2f2');  
              $font->align('right');  
              $font->valign('bottom');  
              
          });

      // Draw more details

            $img->text($more_details,8, 445, function($font) {  

              $font->file(public_path('font/arial.ttf'));  
              $font->size(20);  
              $font->color('#141414');  
              $font->align('left');  
              $font->valign('bottom');  
              
          });




           $rnd = str_random(12);
           $file_name = $rnd.".jpg";
           $img->save(public_path("uploads/".$file_name));

           // update the database;
           foreach ($tagarray as $tag_item) {

              $plate_item = Plate::where('imgname',$tag_item)->first();

              $plate_item->canvas = $file_name;

              $plate_item->save();
              
           }
           

           return $file_name;
           
		
	}

  public function PrintColorCanvas(
                    $num_array,
                    $color_array,
                    $city,
                    $code,
                    $price,
                    $mobile,
                    $sold,
                    $new_old,
                    $more_details,
                    $hashtag
                  ){


          // set canvas and default data
          //$img_path = "template/canvas/plate_cnv_dxb_blank.jpg";
          
          $img_path = Helper::getCanvasPath($city,$new_old);

          $platex = 250;
          $platey = 193;
          $txtfont = 'font/GL-Nummernschild-Eng.ttf';
          $txtfont_size = 95;
          $price_print = Helper::checkPrice($price);

          //for code
          $codefont = 'font/GL-Nummernschild-Eng.ttf';
          $codex = 51;
          $codey = 170;
          $codefontsize = 67;
          $codefontcolor = '#2b2b2b';

          // Set num position

          $num_count = count($num_array);

          if($num_count<5){

            $platex += (70-15*$num_count);

          }


        
            

            if($city=='Abu Dhabi' && $new_old=='on'){

              
              $codefontcolor = '#fff';
              $codey = 180;

            
            }elseif($city=='Dubai' && $new_old=='on'){

           
              $$txtfont = 'font/AprilFoolsDay.ttf';
              $txtfont_size = 90;
          
              $codex = 55;
              $codey = 180;                
              $codefontsize = 58;

            }elseif($city=='Dubai'){

           
              $$txtfont = 'font/AprilFoolsDay.ttf';
              $txtfont_size = 90;
          
              $codex = 92;
              $codey = 207;                
              $codefontsize = 58;

            }elseif($city=="Ajman"){
              $platex = 110;
              $platey = 188;
              $codex = 455;
              $codey = 150;
             
             }elseif($city=="Umm Al Quwain"){
              $platex = 275;
              $codex = 60;
             
             
             }

          // Draw plate number
           $img = Image::make(public_path($img_path));

           $plate = '';

           for($i=0;$i<count($num_array);$i++){

                if($color_array[$i]=='R'){

                  $txtfont_color = '#ce0006';
                }else{

                  $txtfont_color = '#2b2b2b';
                }

           $img->text($num_array[$i], $platex, $platey, function($font) use ($txtfont,$txtfont_size,$txtfont_color) {  

              $font->file(public_path($txtfont));  
              $font->size($txtfont_size);  
              $font->color($txtfont_color);  
              $font->align('center');  
              $font->valign('bottom');  
              
          });

           $platex+=37;

           $plate .= $num_array[$i];

        } // end for

       

        // Draw Code
        $img->text($code,$codex, $codey, function($font) use ($codefont,$codefontsize,$codefontcolor){  

              $font->file(public_path($codefont));  
              $font->size($codefontsize);  
              $font->color($codefontcolor);
              $font->align('center');
              $font->valign('bottom');   
              
              
          });

         // Draw price
       $img->text($price_print,130, 300, function($font){  

          $font->file(public_path('font/angsaz.ttf'));  
          $font->size(72);  
          $font->color('#ce0006');
          $font->align('left');
          $font->valign('bottom');   
      });

        if($sold=='on'){

             
             $img->insert(public_path('template/sold.png'), 'top', 10, 95);

          }



        // Draw mobile number
           $img->text($mobile, 495, 485, function($font) {  

              $font->file(public_path('font/GL-Nummernschild-Eng.ttf'));  
              $font->size(36);  
              $font->color('#f2f2f2');  
              $font->align('right');  
              $font->valign('bottom');  
              
          });


          // Draw more details

            $img->text($more_details,8, 445, function($font) {  

              $font->file(public_path('font/arial.ttf'));  
              $font->size(20);  
              $font->color('#141414');  
              $font->align('left');  
              $font->valign('bottom');  
              
          });





           $rnd = str_random(12);
           $file_name = $rnd.".jpg";
           $img->save(public_path("uploads/".$file_name));


           // update db


           $data = new Plate();

           $data->plate = $plate;
           $data->user_id = Auth::user()->id;
           $data->city = $city;
           $data->code = $code;
           $data->price = is_null($price)?'0':$price;
           $data->sold = $sold=='on'?$sold:'NULL';
           $data->isold = $new_old;
           $data->contact = $mobile;
           $data->enclosed = Helper::enclosed($plate);
           $data->superEnclosed = Helper::superEnclosed($plate);
           $data->doubleEnclosed = Helper::doubleEnclosed($plate);
           $data->middleTriple = Helper::middleTriple($plate);
           $data->type = "color";
           $data->imgname = $file_name;
           $data->slug = $rnd;
           $data->more = $more_details;
           $data->hashtag = $hashtag;
           $data->digits = strlen($plate);
           $data->save();

           return $file_name;


  }

  public function Print_Car_Tag($city,$plate,$code,$isold,$thub_size2){

          // default settings
          $txtfont_color = '#323433';
          $txtfont = 'font/GL-Nummernschild-Eng.ttf';
          $thub_size = 255;
          $thub_size2 = $thub_size2;
          $codefontcolor = '#323433'; 


          if($city=='Abu Dhabi' && $isold=='on'){

            $img_path = "template/tag/plate_tag_auh_old.png";          

            // for plate
            $platex = 330;
            $platey = 85;
            $txtfont_size = 95;
           
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 52;
            $codey = 70;
            $codefontsize = 65;
            $codefontcolor = '#fff';


          }elseif($city=='Abu Dhabi'){
            $img_path = "template/tag/plate_tag_auh.png";
           

            // for plate
            $platex = 330;
            $platey = 85;
            $txtfont_size = 95;
            
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 51;
            $codey = 65;
            $codefontsize = 67;
           

          }elseif($city=='Dubai' && $isold=='on'){
          
            $img_path = "template/tag/plate_tag_dxb_old.png";
            $txtfont = 'font/AprilFoolsDay.ttf';

             // for plate
            $platex = 330;
            $platey = 87;
            $txtfont_size = 95;
            
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 60;
            $codey = 75;
            $codefontsize = 72;

          }elseif($city=='Dubai'){

            $img_path = "template/tag/plate_tag_dxb.png";
            $txtfont = 'font/AprilFoolsDay.ttf';

             // for plate
            $platex = 330;
            $platey = 87;
            $txtfont_size = 95;
           
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 78;
            $codey = 99;
            $codefontsize = 58;

          }elseif($city=='Sharjah'){
            
            $img_path = "template/tag/plate_tag_shj.png";
            

            // for plate
            $platex = 330;
            $platey = 85;
            $txtfont_size = 95;
            
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 50;
            $codey = 75;
            $codefontsize = 65;
            
          }elseif($city=='Ajman'){
            
            $img_path = "template/tag/plate_tag_ajm.png";
            

            // for plate
            $platex = 120;
            $platey = 85;
            $txtfont_size = 95;
            
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 440;
            $codey = 55;
            $codefontsize = 65;
            
          }elseif($city=='Fujairah'){
            
            $img_path = "template/tag/plate_tag_fuj.png";
           

            // for plate
            $platex = 330;
            $platey = 85;
            $txtfont_size = 95;
           
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 50;
            $codey = 75;
            $codefontsize = 65;
            
          }elseif($city=='Ras-Al-Khaimah'){
            
            $img_path = "template/tag/plate_tag_rak.png";
            

            // for plate
            $platex = 330;
            $platey = 85;
            $txtfont_size = 95;
            
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 58;
            $codey = 65;
            $codefontsize = 65;
            
          }elseif($city=='Umm Al Quwain'){
            
            $img_path = "template/tag/plate_tag_umq.png";
           

            // for plate
            $platex = 340;
            $platey = 85;
            $txtfont_size = 95;
            
            
            // for code
            $codefont = 'font/GL-Nummernschild-Eng.ttf';
            $codex = 58;
            $codey = 65;
            $codefontsize = 65;
            
          }

          

          // Draw plate number
           $img = Image::make(public_path($img_path));

           $img->text($plate, $platex, $platey, function($font) use ($txtfont,$txtfont_size,$txtfont_color) {  

              $font->file(public_path($txtfont));  
              $font->size($txtfont_size);  
              $font->color($txtfont_color);  
              $font->align('center');  
              $font->valign('bottom');  
              
          });
           
           // Draw code
           $img->text($code,$codex, $codey, function($font) use ($codefont,$codefontsize,$codefontcolor){  

              $font->file(public_path($codefont));  
              $font->size($codefontsize);  
              $font->color($codefontcolor);
              $font->align('center');
              $font->valign('bottom');   
              
              
          });


           

          // final output
           
           $file_name = "car_tag".".png";  // save the file for car canvas
           $file_name2 = "car_tag2".".png"; // small thumb for car
            
           $img2 = clone $img;
           
           $img->resize($thub_size, null, function ($constraint) {
                $constraint->aspectRatio();
            });
           
           // 2nd thumb for car
          $img2->resize($thub_size2, null, function ($constraint) {
                $constraint->aspectRatio();
            });

           $img2->save(public_path("uploads/".$file_name2));


           if($img->save(public_path("uploads/".$file_name))){

              return true;
           }else{

            return false;
           }

    }
	
}
// end of trait