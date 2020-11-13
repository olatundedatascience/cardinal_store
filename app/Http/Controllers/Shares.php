<?php

namespace App\Http\Controllers;

use App\Models\shares as ModelsShares;
use Exception;
use Illuminate\Http\Request;

class Shares extends Controller
{
    //

    public function CreateShare() {
        return view('shares.create');
    }

    public function PostCreateNewShare(Request $request) {
        $rule =  $request->validate([
                'share_name'=>'required|max:12']);

        $share = new ModelsShares();
        $share->name = $request->get('share_name');
            try {
                $share->save();
                return view('shares.create', ['msg'=>'shares created successsfully']);
                //code...
            } catch (Exception $e) {
                //throw $th;
               // $s = [];

                return view('shares.create', ['msg'=>$e->getMessage()]);
            }

    }

    public function SharesList() {
        $shares = ModelsShares::all();

        return view('shares.shares_list', ['shares'=>$shares]);
    }
}
