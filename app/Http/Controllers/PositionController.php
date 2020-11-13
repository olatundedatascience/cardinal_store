<?php

namespace App\Http\Controllers;

use App\Models\PositionCandidate;
use App\Models\positions;
use App\Models\Shareholder;
use App\Rules\checkPosition;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Positions as GlobalPositions;

class PositionController extends Controller
{
    //
    private $positions;
    public function __construct()
    {
        $listOfPositions = positions::all()->map(function($value){
            return $value->name;
        });
        $this->positions = $listOfPositions;
    }

    public function CreateOpenPosition() {
        return view('positions.create_open_positions');
    }

    public function ListAllPositions() {
        $positions = positions::all();
        return view('positions.position_list',['positions'=>$positions]);
    }

    public function SelectEligibleVoters($id) {
        try {
            $positions = positions::where('id', $id)->first();
            $shareholders = Shareholder::all();

            return view('positions.select_voters', ['msg'=> null, 'positions'=>$positions, 'shareholders'=>$shareholders]);
        } catch (Exception $e) {
            return redirect(route('select_voters'))->with('error', $e->getMessage());
        }
    }

    public function PostSelectEligibleVoters(Request $req) {
        try {
            //code...
            $position_id = $req->get('position_id'); // get position id
            $shareholder_id = collect($req->get('shareholder_id')); // loop over list of select id
            $pos =new PositionCandidate();

            // DB::connection('sqlite')->table('position_candidates')
            //         ->insert(['positions_id'=>$position_id, 'shareholder_id'=>'hi']);
            foreach($shareholder_id as $current_id) {

                DB::table('eligible_voters')
                    ->insert(['positions_id'=>$position_id, 'shareholder_id'=>$current_id]);
                    
               
                // $pos->positions_id = $position_id;
                // $pos->shareholder_id = $current_id;
                // $pos->save();
            }

            return redirect(route('select_voters', ['id'=>$position_id]))->with('status', 'candidates added');
        } catch (Exception $e) {
            // redirect back adding candindate to post view and logg error message
            //throw $th;
            // exception details can be logged here
            return redirect(route('select_voters', ['id'=>$position_id]))->with('error', $e->getMessage());
        }
    }

    public function PostSelectCandidateForPosition(Request $req) {
        try {
            //code...
            $position_id = $req->get('position_id'); // get position id
            $position_name = $req->get('position_name');
            // $position_name ="";
            // if(Cache::has('position_name')) {
            //     $position_name = Cache::get('position_name');
            // }
            // else {
            //     $position_name = positions::where('id', $position_id)->first()->name;
            //     Cache::put('position_name', $position_name);
            // }
            
            //dd($postion_name);
            $shareholder_id = collect($req->get('shareholder_id')); // loop over list of select id
            $pos =new PositionCandidate();

            // DB::connection('sqlite')->table('position_candidates')
            //         ->insert(['positions_id'=>$position_id, 'shareholder_id'=>'hi']);
            foreach($shareholder_id as $current_id) {
                // $current_id is in form id:fullname, 
                // i need to split it to get appropriate id and fullname
              $current_id_explode =  explode(':',$current_id);
              //  dd($current_id_explode[1]);
                //$share_name = Shareholder::where('id', $current_id)->first();
                DB::table('position_candidates')
                    ->insert(['positions_id'=>$position_id, 
                            'shareholder_name'=>$current_id_explode[1],
                            'position_name'=>$position_name,
                            'shareholder_id'=>$current_id_explode[0]]);
                    
               
                // $pos->positions_id = $position_id;
                // $pos->shareholder_id = $current_id;
                // $pos->save();
            }

            return redirect(route('add_candidate', ['id'=>$position_id]))->with('status', 'candidates added');
        } catch (Exception $e) {
            // redirect back adding candindate to post view and logg error message
            //throw $th;
            // exception details can be logged here
            return redirect(route('add_candidate', ['id'=>$position_id]))->with('error', $e->getMessage());
        }
    }

    public function SelectCandidateForPosition($id) {
        try {
            //code...
            $positions = positions::where('id', $id)->first();
            $shareholders = Shareholder::all();

            return view('positions.add_candindate', ['msg'=> null, 
                'position_name'=>$positions->name,
                'positions'=>$positions, 'shareholders'=>$shareholders]);
        } catch (Exception $e) {
            //throw $th;
            // exception details can be logged here
            return redirect(route('add_candidate'))->with('error', $e->getMessage());
        }
    }

    public function OpenPosition($id) {
        try {
          positions::where('id',$id)->update(['status'=>1]);

            return redirect(route('position_all'));


        }
        catch(Exception $e) {
            return redirect(route('position_all'));
        }
        
    }

    public function ClosePosition($id) {
        try {
            positions::where('id',$id)->update(['status'=>0]);

            // if($positions != null) {
            //     $positions->status = 0;
            //     $positions->save();
            // }
            return redirect(route('position_all'));
        }
        catch(Exception $e) {
            return redirect(route('position_all'));
        }
        
    }
    public function CreateNewPosition(Request $request) {
        try{
            $request->validate(['name'=>['required', new checkPosition()]]);
            $position = new positions();

            $position->name =  $request->get('name');
            $position->description = $request->get('description');
            $position->save();
            $msg = "success";
            return view('positions.create_open_positions', ['msg'=>$msg]);
        }
        catch(Exception $e) {
            $msg = $e->getMessage();

            return view('positions.create_open_positions', ['msg'=>$msg]);
        }

    }
}
