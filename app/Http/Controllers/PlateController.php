<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\libs\Helper;
use App\Plate;
use Auth;
use App\Traits\PlateTag;

class plateController extends Controller
{
  use PlateTag;

    public function __construct(){

        $this->middleware('member');
    }

    public function CreatePlate(){

      

      return view('plate.create');    

    }



   
    public function makeplate(Request $r){


        
           $this->validate($r, [

              'plate' => 'required|max:5',
              'city' => 'required',
              'code' => 'required',
              'mobile' => 'required',
              
          ]);

           $img_path = Helper::getCanvasPath($r->city,$r->new_old);
           $plate = $r->plate;
           $code = $r->code;
           $mobile = $r->mobile;
           $city = $r->city;
           $price = Helper::checkPrice($r->price);
           $sold = Helper::checkSold($r->sold);
           $isnew = Helper::checkSold($r->new_old);
           $more_details = $r->more_details;
           $hashtag = substr($r->hashtag,0,254);

           // parameter
           $platex = 340;
           $platey = 193;
           $black_color = '#2b2b2b';
           $myfont = 'font/GL-Nummernschild-Eng.ttf';
           $myfontsize = 95;
           $codefontsize = 65;
           $mobilefontsize = 36;

           // Draw code and set x y for plate variance
           $codex = 58; // default
           $codey = 170; // default

             if($city == "Dubai" && $r->has('new_old')){

                $codex = 55;
                $codey = 180;
                $myfont = 'font/AprilFoolsDay.ttf';
                $myfontsize = 90;
                $codefontsize = 58;
                

             }elseif($city == "Dubai"){

                $codex = 92;
                $codey = 207;
                $myfont = 'font/AprilFoolsDay.ttf';
                $myfontsize = 90;
                $codefontsize = 58;
              

             }

             // set color for abu dhabi old plate
             $code_color = $black_color;

             if($r->city=="Abu Dhabi" && $r->has('new_old')){

                $code_color = '#f2f2f2';

                $codex = 52;
                $codey = 180;

             }

             if($r->city=="Ajman"){
              $platex = 130;
              $platey = 188;
              $codex = 455;
              $codey = 150;
             
             }

          // Draw plate number
           $img = Image::make(public_path($img_path));

           $img->text($plate, $platex, $platey, function($font) use ($black_color,$myfont,$myfontsize) {  

              $font->file(public_path($myfont));  
              $font->size($myfontsize);  
              $font->color($black_color);  
              $font->align('center');  
              $font->valign('bottom');  
              
          });
           // draw code
           $img->text($code,$codex, $codey, function($font) use ($code_color,$myfont,$codefontsize){  

              $font->file(public_path($myfont));  
              $font->size($codefontsize);  
              $font->color($code_color);
              $font->align('center');
              $font->valign('bottom');   
              
              
          });

           // Draw mobile
           $img->text($mobile, 495, 485, function($font){  

              $font->file(public_path('font/GL-Nummernschild-Eng.ttf'));  
              $font->size(36);  
              $font->color('#f2f2f2');  
              $font->align('right');  
              $font->valign('bottom');  
              
          });

           // Draw price angsaz

           $img->text($price, 130, 300, function($font) {  

              $font->file(public_path('font/angsaz.ttf'));  
              $font->size(72);  
              $font->color('#ce0006');  
              $font->align('left');  
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

          // if has sold

           if($r->has('sold')){

             
             $img->insert(public_path('template/sold.png'), 'top', 15, 95);

          } 



           // final output
           $rnd = str_random(12);
           $file_name = $rnd.".jpg";
           $img->save(public_path("uploads/".$file_name)); 

           // save path to db

           $data = new Plate();

           $data->plate = $plate;
           $data->user_id = Auth::user()->id;
           $data->city = $city;
           $data->code = $code;
           $data->price = $r->price;
           $data->sold = $r->sold;
           $data->isold = $r->new_old;
           $data->contact = $mobile;
           $data->hashtag = $r->hashtag;
           $data->digits = strlen($plate);
           $data->enclosed = Helper::enclosed($plate);
           $data->superEnclosed = Helper::superEnclosed($plate);
           $data->doubleEnclosed = Helper::doubleEnclosed($plate);
           $data->middleTriple = Helper::middleTriple($plate);
           $data->type = "canvas";
           $data->imgname = $file_name;
           $data->slug = $rnd;
           $data->more = $more_details;
           $data->hashtag = $hashtag;
           $data->save();


           //redirect to profile view.
           $path = Helper::imgpath();

           return view('plate.download_canvas',compact('path','file_name'));

    }
   
   // bulk plate

    public function bulkplate(){

      return view('plate.bulkplate');


    }

    public function bulkplatestore(Request $r){

        //return $r->all();

        $this->validate($r, [
                
                'city' => 'required',
                'mobile' => 'required',
                
            ]);
        

        $mobile = $r->mobile;
        $more_details = $r->more_details;
        $cityes = array_filter($r->city);
        $plates = array_filter($r->plate);
        $codes = array_filter($r->code);
        $prices = array_filter($r->price);
        $solds = array_filter($r->sold);
        $isolds = array_filter($r->isold);
        $hashtag = $r->hashtag;
        
       


      $tagarray = array();
      $price_array = array();
      $city_array = array();

      $i = 0;

      foreach($cityes as $k => $city){

         

          if(!empty($city) && !empty($plates[$k]) && !empty($codes[$k])){

            //set values

            $city = $cityes[$k];
            $plate = $plates[$k];
            $code = $codes[$k];
            $price = !empty($prices[$k])?$prices[$k]:'0';
            $sold = $solds[$k];
            $isold = $isolds[$k];

            // Print tag and update database
            $tag = $this->Print_Plate_Tag(
                 $city,
                 $mobile,
                 $plate,
                 $code,
                 $price,
                 $sold,
                 $more_details,
                 $hashtag,
                 $isold
                 
               );

            
          }

          // return file name save to array to use in canvas.
          $tagarray[$i] = $tag;
          $price_array[$i]= $price;
          $city_array[$i] = $city;

          $i++;
      }

      // here we need to make the canvas.
      
      $canvas = $this->makecanvas($city_array,$tagarray,$mobile,$price_array,$more_details);
      $file_name = $canvas;

      // update the database

       

      $path = Helper::imgpath();

      return view('plate.download_canvas',compact('path','file_name'));

    }

    public function color_plate(){

      return view('plate.create_color_plate');
    
    }

    public function color_plate_store(Request $r){
                
              $this->validate($r, [
                
                'city' => 'required',
                'mobile' => 'required',
                'numbers' => 'required',
                
                
            ]);
              
              $city = $r->city;
              $mobile = $r->mobile;
              $price = is_null($r->price)?0:$r->price;
              $code = $r->code;
              $sold = $r->sold;
              $new_old = $r->new_old;
              $more_details = $r->more_details;
              $hashtag = $r->hashtag;

              $num_count = 0;
              $num_array = array();
              $color_array = array();
              $id = 0;

              for($i=0;$i<count($r->numbers);$i++){

                if($r->numbers[$i]!=NULL){

                    $num_array[$id] = $r->numbers[$i];
                    $color_array[$id] = $r->colorid[$i];

                    $num_count++;
                    $id++;

                }

              }

              // print the canvas

              $file_name = $this->PrintColorCanvas(
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
                  );

              $path = Helper::imgpath();
             
             return view('plate.download_canvas',compact('path','file_name'));
              
    
    }

    public function plate_delete($slug){

      
        $plate = Auth::user()->plates()->where('slug',$slug)->first();

       if(empty($plate)){ 

         return back()->with('message_red','Plate not found or there is an error');
       }
        
        $a = public_path('uploads'.'/'.$plate->imgname);

        if($plate->delete()){

              if(file_exists($a)){

                 unlink($a);
              }

          // delete canvas if no record

          $this->deletePlateCanvas($plate->canvas);
         

         return back()->with('message_green','Plate has been removed');

        }else{

         return back()->with('message_red','There is an error');

        }

    }

    private function deletePlateCanvas($canvas){

        if($canvas!=null){

            $plates = Plate::where('canvas',$canvas)->get();

            if($plates->count()==0){

              $canvas_file = public_path('uploads'.'/'.$canvas);

              if(file_exists($canvas_file)){

                 unlink($canvas_file);

                 return true;
              }
             

            }

        }

        return false;
    }

    public function car_plate(){

      return view('plate.car_plate');

    }

    public function car_plate_store(Request $r){

      


      $this->validate($r, [

              'plate' => 'required|max:5',
              'city' => 'required',
              'code' => 'required',
              'mobile' => 'required',
              'car' => 'required',
              
          ]);

          // set canvas for car
           $img_path = 'template/car/'.$r->car.'.jpg';

           if(!file_exists(public_path($img_path))){

              return back()->with('message_red','Canvas not found');
           }


           $plate = $r->plate;
           $code = $r->code;
           $mobile = $r->mobile;
           $city = $r->city;
           $price = Helper::checkPrice($r->price);
           $sold = $r->sold;
           $isnew = $r->new_old;
           $more_details = $r->more_details;
           $hashtag = substr($r->hashtag,0,254);
           $isold = $r->new_old;
           $car = $r->car;

           $small_plate = Helper::getcar($car);
           $thub_size2 = $small_plate['w'];

           //print tag and save as car_tag.png

           $this->Print_Car_Tag($city,$plate,$code,$isold,$thub_size2);

         

           // set default parameter to print on canvas
           $platex = 340;
           $platey = 193;
           $black_color = '#2b2b2b';
           $myfont = 'font/GL-Nummernschild-Eng.ttf';
           $myfontsize = 95;
           $codefontsize = 65;
           $mobilefontsize = 36;

           // data for small plate


       
        

          // Create the canvas
           $img = Image::make(public_path($img_path));

           // Draw mobile-fixed
           $img->text($mobile, 495, 100, function($font){  

              $font->file(public_path('font/GL-Nummernschild-Eng.ttf'));  
              $font->size(36);  
              $font->color('#fff');  
              $font->align('right');  // old set left 350,100
              $font->valign('bottom');  
              
          });

           // Draw price - fixed

           $img->text($price, 15, 50, function($font) {  

              $font->file(public_path('font/angsaz.ttf'));  
              $font->size(48);  
              $font->color('#fff');  
              $font->align('left');  
              $font->valign('bottom');  
              
          });

         

          // insert tag on top fixed
          $img->insert(public_path('uploads/car_tag.png'), 'top-left', 237, 10);

        $img->insert(public_path('uploads/car_tag2.png'), 'top-left', $small_plate['x'], $small_plate['y']);

        



           // final output
           $rnd = str_random(12);
           $file_name = $rnd.".jpg";
           $img->save(public_path("uploads/".$file_name)); 

           // save path to db

           $data = new Plate();

           $data->plate = $plate;
           $data->user_id = Auth::user()->id;
           $data->city = $city;
           $data->code = $code;
           $data->price = $r->price;
           $data->sold = $r->sold;
           $data->isold = $r->new_old;
           $data->contact = $mobile;
           $data->hashtag = $r->hashtag;
           $data->digits = strlen($plate);
           $data->enclosed = Helper::enclosed($plate);
           $data->superEnclosed = Helper::superEnclosed($plate);
           $data->doubleEnclosed = Helper::doubleEnclosed($plate);
           $data->middleTriple = Helper::middleTriple($plate);
           $data->type = "canvas";
           $data->imgname = $file_name;
           $data->slug = $rnd;
           $data->more = $more_details;
           $data->hashtag = $hashtag;
           $data->save();


           //redirect to profile view.
           $path = Helper::imgpath();

           return view('plate.download_canvas',compact('path','file_name'));




    }
    
}
