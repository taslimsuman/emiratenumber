<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Plate;
use App\Mobile;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::OrderBy('id','DESC')->paginate(30);
        
        return view('admin.user.users',compact('users'));
    }

    public function delete($id){

        $user = User::findOrFail($id);

        $plates = $user->plates()->count('id');
        $mobiles = $user->mobiles()->count('id');


        

        if($plates>0 || $mobiles>0){

            $msg = 'This member has '.$plates.' number plates and '.$mobiles.' mobile numbers. You must delete those plates and numbers then you can delete the member'; 

            return back()->with('message_red',$msg);

        }

        return '';

        if($user->delete()){

           
            return back()->with('message_green','Member has been deleted');
        }else{

            return back()->with('message_red','Member has been deleted');
        }


    }
}
