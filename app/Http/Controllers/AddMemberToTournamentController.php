<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Tournament;

class AddMemberToTournamentController extends Controller
{

    public function deleteFromTournament(){

    }

    public function displayPage($id){
        return view('add_member_to_tournament', [
            'members' => Member::where("tournament_id", "=", "0")->paginate(20),
            'tournament' => Tournament::where("id", "=", $id)->first()
        ]);

    }

    public function availableMember( ){

    }
    public function addMember(Request $request, $id){
        Member::where('id', '=', $request->member_id )->update([
            'tournament_id' => $id,

        ]);
        return redirect(route('addMembers.display', $id));
    }
}
