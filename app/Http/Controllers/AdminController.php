<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

}
