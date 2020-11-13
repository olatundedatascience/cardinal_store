<?php

namespace App\Http\Controllers;

use App\Models\PositionCandidate;
use App\Models\Shareholder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Home extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function CastVote(Request $request) {
        try {
                $current_user_id = $request->get('current_user_id');
                $number_of_shares_rem = $request->get('number_of_shares_rem');
                $votes = $request->get('selected_vote');
                $number_of_shares_rem = $number_of_shares_rem - 1;

            foreach($votes as $vote) {
                $votes_splitted = explode(":", $vote);
                $casted_postion = $votes_splitted[0];
                $casted_for = $votes_splitted[1];

                $Vote_before = DB::table('votes')->where([['casted_for', '=', $casted_for],
                            ['casted_position', '=', $casted_postion],
                            ['casted_by', '=', $current_user_id]])->first();


                if($Vote_before != null) {
                    $sumOfVotes = $Vote_before->sum_of_votes + 1;
                    DB::table('votes')->where('id', $Vote_before->id)->update(['sum_of_votes'=>$sumOfVotes]);
                }
                else {
                    DB::table('votes')->insert(['casted_for'=> $casted_for,
                    'casted_position'=>$casted_postion,'casted_by'=>$current_user_id, 'sum_of_votes'=>1]);
                }
            }

            return redirect(route('user_home'))->with('status', 'votes casted');
        }
        catch(Exception $e) {
            return redirect(route('user_home'))->with('error', $e->getMessage());
        }
        
        
    }

    public function userhome() {
        $current_user = Session::get('current_user');
        $getUser = Shareholder::where('username', $current_user)->first();
        // this is actually not a good approach but I am actually running against time...
        $eligibleVoters = $getUser->eligiblevoters;
        $isEligible = $eligibleVoters != null;
        $positions = DB::table('position_candidates')->get();
        //$candidates = [];
        

       // dd($positions);
        //$positionsCandidate = PositionCandidate::where('positions_id', $eligibleVoters->postions_id);

       // $positionsObject = DB::table('positions')->whereIn('id', collect($eligibleVoters->positions_id))->get();
        

        return view('shareholders.user_home', ['current_user'=>$current_user, 
                                                'user'=>$getUser,
                                                'positions'=>$positions,
                                                'canVote'=>$isEligible]);
    }

    public function Logout() {
        Session::remove('is_admin');
        Session::remove('current_user');

        return redirect(route('login'));
    }
}
