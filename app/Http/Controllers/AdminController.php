<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function login(Request $request) 
    {
        if ($request->isMethod('post')) {
            $data = $request->input();
            
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'role_id' => '1'])) {
                // Session::put('adminSession', $data['email']);
                return redirect('admin/dashboard');
            } else {
                return back()->with('error_message', 'Invalid Username or Password');
            }
        }

        return view('admin.admin_login');
    }



    public function dashboard() 
    {
        // if (Session::has('adminSession')) {
        //     // Perform all dashboard task
        // } else {
        //     return redirect('/admin')->with('error_message', 'Please login to access');
        // }

        return view('admin.dashboard');
    }



    public function logout() 
    {
        Session::flush();

        return redirect('/admin')->with('success_message', 'Logged out Successfully');
    }


    public function settings() 
    {
        // if (Session::has('adminSession')) {
        //     // Perform all dashboard task
        // } else {
        //     return redirect('/admin')->with('error_message', 'Please login to access');
        // }

        return view('admin.settings');
    }


    public function chkPassword(Request $request) 
    {
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['role_id' => '1'])->first();
        
        if (Hash::check($current_password, $check_password->password)) {
            echo "true"; die;
        } else {
            echo "false"; die;
        }
    }


    public function updatePwd(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo print_r($data); die;
            $current_password = $data['current_pwd'];
            $check_password = User::where(['email' => auth()->user()->email])->first();
            
            if (Hash::check($current_password, $check_password->password)) {
                $password = bcrypt($data['new_pwd']);
                User::where(['id' => $check_password->id])->update(['password' => $password]);
                return back()->with('success_message', 'Password Updated Successfully!');
            } else {
                return back()->with('error_message', 'Incorrect Current Password!');
            }
        }

    }


}
