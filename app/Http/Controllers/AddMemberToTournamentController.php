<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Tournament;

class AddMemberToTournamentController extends Controller
{

    public function deleteFromTournament(){

    }

    public function displayPage(){
        return view('add_member_to_tournament', [
            'members' => Member::
        ]);
    }
    public function availableMember(){

    }
    public function addMember(){

    }
}
