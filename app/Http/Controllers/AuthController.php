<?php

namespace App\Http\Controllers;

use App\Models\Shareholder;
use Exception;
//use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function index() {
        return view('auth.login');
    }

    public function PostIndex(Request $request) {
        try {
            $username = $request->get('username');
            $password = $request->get('password');

            if($username == 'admin' && $password == '123456') 
            {
                
                Session::put('is_admin', true);
                //session('is_admin', true);
                Session::put('current_user', $username);
                //session('current_user', $username);
                return redirect(route('admin_home'));
            }
            else {
                $phash = md5($password);
                $found = Shareholder::where('username',$username)
                                ->where( 'password',$phash)->first() != null;
                //dd($found);
                if($found == true || $found == 1) {
                    Session::put('is_admin', false);
                    //session('is_admin', true);
                    Session::put('current_user', $username);
                    return redirect(route('user_home'));
                }
                else {
                    return redirect(route('login'))->with('status', 'invalid username or password combination');
                }
            }

            //code...
        } catch (Exception $e) {
            //throw $th;

            return redirect(route('login'))->with('error', $e->getMessage());
        }
    }
}
