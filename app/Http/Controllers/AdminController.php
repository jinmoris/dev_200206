<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert; //경고창
use Session;

class AdminController extends Controller
{
    public function login(Request $request){
        
        if($request->isMethod('post')){
            $data = $request->input();
            
            $email = $data['email'];
            $password = $data['password'];

            if(Auth::attempt(['email' => $email, 'password' => $password, 'admin' => '1'])){
                //echo "Success"; die;
                //Session::put('adminSession',$email); 미들웨어로 하기위해 주석처리
               return redirect('/admin/dashboard');
            }else{
                //echo "Failed";die;
                //경고창1
                Alert::error('Error', '아이디 또는 패스워드가 잘 못 되었습니다.');
                return redirect('/admin');               
                //경고창2
                //return redirect('/admin')->with('flash_message_error','아이디 또는 패스워드가 잘 못 되었습니다.');

            }

        }
        return view('admin.admin_login');
    }

    public function dashboard(){

        //미들웨어로 하기위해 주석처리
        // if(Session::has('adminSession')){            
        //     return view('admin.dashboard');
        // }else{        
        //     //경고창1
        //     Alert::warning('Warning', '접속 권한이 없습니다.');
        //     return redirect('/admin');
        //     //경고창2
        //     //return redirect('/admin')->with('flash_message_success','접속 권한이 없습니다.');
        // }
       
        return view('admin.dashboard');
    }
    public function setting(){

        return view('admin.setting');
    }
    
    public function logout(){
        Session::flush();
        //경고창1
        Alert::Info('로그아웃', '정상적으로 로그아웃 되었습니다.');
        return redirect('/admin');
        //경고창2
        //return redirect('/admin')->with('flash_message_success','정상적으로 로그아웃 되었습니다.');
     }
     
}
