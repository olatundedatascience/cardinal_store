<?php

namespace App\Http\Controllers;

use App\Models\Shareholder;
use App\Models\shares;
use App\Rules\checkForUsername;
use Exception;
use Illuminate\Http\Request;

class ShareholderController extends Controller
{
    //
    private $shares;

    public function __construct()
    {
        $listOfShares = shares::all()->map(function($value){
            return $value->name;
        });
        $this->shares = $listOfShares;
    }

    public function create() {
        
        return view('shareholders.create', ['shares'=>$this->shares]);
    }

    public function CreateNewShareHolder(Request $request) {
        $rule = $request->validate([
            'username'=>['required', new checkForUsername()],
            'email'=>['required', 'email'],
            'share_name'=>['required'],
            'share_unit'=>'required',
            'fullname'=>'required',
            'password'=>'required'
        ]);

        $pHash = md5($request->get('password'));
        try {
            $shareholder = new Shareholder();
            $shareholder->fullname = $request->get('fullname');
            $shareholder->sharename = $request->get('share_name');
            $shareholder->numberOfShares = $request->get('share_unit');
            $shareholder->password = $pHash;
            $shareholder->email = $request->get('email');
            $shareholder->username = $request->get('username');
            $shareholder->defaultpassword = $request->get('password');
            $msg = "Shareholder created";
            $shareholder->save();
            return view('shareholders.create', ['msg'=>$msg, 'shares'=>$this->shares]);
            //code...
        } catch (Exception $e) {
            //throw $th;

            return view('shareholders.create', ['msg'=>$e->getMessage(), 'shares'=>$this->shares]);
        }
        

    }

    public function ShareHolderList() {
        $shareholders = Shareholder::all();
       // $listOfShareHodlers = $shareholder->whe
        return view('shareholders.shareholder_list', ['shareholders'=>$shareholders]);
    }
}
