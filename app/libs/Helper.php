<?php
namespace App\libs;

class Helper {


	public static function getlen($num){

			return strlen($num);
	}

	public static function enclosed($num){

		$len = strlen($num);

		$f1 =  substr($num, 0,1);
		$f2 = substr($num, $len-1,1);

		if($f1 == $f2){

			return "on";

			

		}else{

			return NULL;

			
		}
	}

	public static function superEnclosed($num){
			$len = strlen($num);

			$f1 =  substr($num, 0,1);
			$f2 = substr($num,1,1);
			$f3 = substr($num, $len-2,1);
			$f4 = substr($num, $len-1,1);

			

			if($f1 == $f4 && $f2 == $f3){

				return "on";

			}else{

				return NULL;
			}
	}

	public static function doubleEnclosed($num){
			$len = strlen($num);

			$f1 =  substr($num, 0,2);
			$f2 = substr($num, $len-2,2);

			if($f1 == $f2){

					return "on";

				

				}else{

					return NULL;

					
				}
	}

	public static function middleTriple($num){

		$len = strlen($num);

		$f1 =  substr($num, 1,1);
		$f2 =  substr($num, 2,1);
		$f3 =  substr($num, 3,1);

		if($f1 == $f2 && $f2 == $f3){

			return "on";

		}else{

			return NULL;
		}

	}

	// For mobile

	
	
	public static function 	repeat_three($num){
		$len = strlen($num);

		$n1 =  substr($num, 0,1);
		$n2 =  substr($num, 1,1);
		$n3 =  substr($num, 2,1);

		if(($n1 == $n2) && ($n1 == $n3)){

			return "on";

		}
	}

	public static function repeat_four($num){

		$len = strlen($num);

		$n1 =  substr($num, 0,1);
		$n2 =  substr($num, 1,1);
		$n3 =  substr($num, 2,1);
		$n4 =  substr($num, 3,1);

		if($n1==$n2 && $n1==$n3 && $n1==$n4){

			return 'on';

		}

	}

	public static function bothside($num){

		$n1 =  substr($num, 0,3);
		$n2 =  substr($num, 4,3);
		$nrv = strrev($n2);

		if($n1==$nrv){

			return 'on';
		}

	} 

	public static function getCanvasPath($city, $old = NULL){
		
				$img_path = "template/canvas/plate_cnv_dxb_blank.jpg";

				

			if($city == "Abu Dhabi"){

				$img_path = "template/canvas/plate_cnv_auh.jpg";

				if($old != NULL){

					$img_path = "template/canvas/plate_cnv_auh_old.jpg";
				}

			}elseif($city == "Dubai"){
				
				$img_path = "template/canvas/plate_cnv_dxb.jpg";

				if($old != NULL){

					$img_path = "template/canvas/plate_cnv_dxb_old.jpg";
				}

			}elseif($city == "Sharjah"){
				
				$img_path = "template/canvas/plate_cnv_shj.jpg";

			}elseif($city == "Ajman"){
				
				$img_path = "template/canvas/plate_cnv_ajm.jpg";

			}elseif($city == "Fujairah"){
				
				$img_path = "template/canvas/plate_cnv_fuj.jpg";

			}elseif($city == "Ras-Al-Khaimah"){
				
				$img_path = "template/canvas/plate_cnv_rak.jpg";

			}elseif($city == "Umm Al Quwain"){
				
				$img_path = "template/canvas/plate_cnv_umq.jpg";

			}

			return $img_path;
	}

	public static function checkPrice($prc = NULL){

		$price = 'Call For Price';

		if($prc > 0){

			$price = number_format($prc)." AED";

		}


		return $price;

	}

	public static function checkSold($sold){

		if(isset($sold) && !empty($sold) && $sold == "on"){

			return True;

		}else{

			return 0;
		}

	}

	public static function digit2($num){

		

		if(is_numeric($num) && strlen($num) == 1){

			$num = '0'.$num;
		}

		return $num;
	}

	public static function get_mobile_canvas_path($provider,$vip){

		$path = '';

		if($provider=="etisalat" && $vip=='on'){

			$path = "template/mobile/vip_etisalat.jpg";

		}elseif($provider=="etisalat"){

			$path = "template/mobile/mobile_etisalat_canvas.jpg";

		}elseif($provider=="du" && $vip=='on'){

			$path = "template/mobile/vip_du.jpg";

		}elseif($provider=="du"){

			$path = "template/mobile/mobile_du_canvas.jpg";
		}

		return $path;

	}

	// this is for view
	public static function imgpath(){
	    
	    //../emiratesnumber/public/uploads/

		return "/public/uploads/";
	}

	public static function mimgpath(){
	
		return "/public/mobiles/";
	}

	public static function getcar($car){

	

		switch ($car) {

			case 101:
				$w = 85;
				$x = 348;
				$y = 285;
				break;

			case 102:
				$w = 100;
				$x = 209;
				$y = 368;
				break;

			case 103:
				$w = 100;
				$x = 206;
				$y = 373;
				break;

			case 104:
				$w = 140;
				$x = 184;
				$y = 388;
				break;

			case 105:
				$w = 146;
				$x = 190;
				$y = 335;
				break;
				
			case 106:
				$w = 130;
				$x = 195;
				$y = 371;
				break;
				
			case 107:
				$w = 135;
				$x = 190;
				$y = 290;
				break;
			case 108:
				$w = 115;
				$x = 200;
				$y = 342;
				break;

			case 109:
				$w = 145;
				$x = 178;
				$y = 364;
				break;

			case 110:
				$w = 120;
				$x = 193;
				$y = 282;
				break;

			case 111:
				$w = 120;
				$x = 193;
				$y = 360;
				break;
			
			case 112:
				$w = 140;
				$x = 181;
				$y = 369;
				break;

			case 113:
				$w = 195;
				$x = 155;
				$y = 375;
				break;

			case 114:
				$w = 180;
				$x = 160;
				$y = 400;
				break;
			
			case 115:
				$w = 85;
				$x = 85;
				$y = 303;
				break;
			
			case 116:
				$w = 120;
				$x = 193;
				$y = 277;
				break;

			case 117:
				$w = 140;
				$x = 179;
				$y = 362;
				break;
			
			case 118:
				$w = 140;
				$x = 186;
				$y = 385;
				break;

			case 119:
				$w = 140;
				$x = 184;
				$y = 386;
				break;

			case 120:
				$w = 135;
				$x = 187;
				$y = 383;
				break;
			
			case 121:
				$w = 130;
				$x = 191;
				$y = 349;
				break;

			case 122:
				$w = 120;
				$x = 197;
				$y = 276;
				break;
			
			case 123:
				$w = 100;
				$x = 205;
				$y = 275;
				break;
			
			case 124:
				$w = 150;
				$x = 168;
				$y = 314;
				break;
			
			case 125:
				$w = 130;
				$x = 186;
				$y = 396;
				break;
			
			case 126:
				$w = 110;
				$x = 193;
				$y = 359;
				break;

			case 126:
				$w = 110;
				$x = 193;
				$y = 359;
				break;
			
			case 127:
				$w = 109;
				$x = 134;
				$y = 399;
				break;

			case 128:
				$w = 138;
				$x = 183;
				$y = 365;
				break;

			case 129:
				$w = 79;
				$x = 78;
				$y = 288;
				break;

			case 130:
				$w = 85;
				$x = 329;
				$y = 381;
				break;
			
			case 131:
				$w = 118;
				$x = 191;
				$y = 373;
				break;

			case 132:
				$w = 122;
				$x = 168;
				$y = 333;
				break;
			
			case 133:
				$w = 115;
				$x = 196;
				$y = 355;
				break;

			case 134:
				$w = 115;
				$x = 194;
				$y = 415;
				break;

			case 135:
				$w = 165;
				$x = 169;
				$y = 402;
				break;

			case 136:
				$w = 141;
				$x = 181;
				$y = 380;
				break;


			case 137:
				$w = 135;
				$x = 181;
				$y = 385;
				break;

			case 138:
				$w = 135;
				$x = 190;
				$y = 415;
				break;

			case 139:
				$w = 120;
				$x = 200;
				$y = 454;
				break;

			case 140:
				$w = 148;
				$x = 177;
				$y = 285;
				break;

			case 141:
				$w = 168;
				$x = 172;
				$y = 284;
				break;

			case 142:
				$w = 168;
				$x = 171;
				$y = 295;
				break;

			case 143:
				$w = 118;
				$x = 188;
				$y = 423;
				break;

			case 144:
				$w = 145;
				$x = 177;
				$y = 299;
				break;

			case 145:
				$w = 120;
				$x = 192;
				$y = 310;
				break;

			case 146:
				$w = 148;
				$x = 168;
				$y = 295;
				break;

			case 147:
				$w = 150;
				$x = 182;
				$y = 353;
				break;

			case 148:
				$w = 115;
				$x = 105;
				$y = 297;
				break;

			case 149:
				$w = 132;
				$x = 178;
				$y = 290;
				break;

			case 150:
				$w = 168;
				$x = 160;
				$y = 296;
				break;

			case 151:
				$w = 128;
				$x = 178;
				$y = 232;
				break;

			case 152:
				$w = 118;
				$x = 147;
				$y = 290;
				break;


			case 153:
				$w = 152;
				$x = 175;
				$y = 422;
				break;

			case 154:
				$w = 145;
				$x = 171;
				$y = 392;
				break;


			case 155:
				$w = 124;
				$x = 187;
				$y = 382;
				break;


			case 156:
				$w = 161;
				$x = 183;
				$y = 217;
				break;


			case 157:
				$w = 156;
				$x = 175;
				$y = 338;
				break;


			case 158:
				$w = 150;
				$x = 190;
				$y = 278;
				break;


			case 159:
				$w = 131;
				$x = 192;
				$y = 371;
				break;


			case 160:
				$w = 162;
				$x = 173;
				$y = 404;
				break;


			case 161:
				$w = 164;
				$x = 170;
				$y = 382;
				break;

			case 162:
				$w = 152;
				$x = 175;
				$y = 398;
				break;


			case 163:
				$w = 162;
				$x = 175;
				$y = 381;
				break;


			case 164:
				$w = 130;
				$x = 180;
				$y = 328;
				break;


			case 165:
				$w = 135;
				$x = 182;
				$y = 410;
				break;


			case 166:
				$w = 100;
				$x = 206;
				$y = 343;
				break;

			case 167:
				$w = 119;
				$x = 177;
				$y = 320;
				break;


			case 168:
				$w = 155;
				$x = 204;
				$y = 398;
				break;




			default:
				$w = 100;
				$x = 100;
				$y = 200;
				
				break;
		}

		 $car_array = array('w'=>$w ,'x' => $x,'y'=>$y );

		 return $car_array;

	}


}
