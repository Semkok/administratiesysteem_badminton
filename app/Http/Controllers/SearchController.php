<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) : object
    {
        $query = $request->input('query');

        $searchedMembers = Member::where('nickname', 'like', "%$query%")
            ->get();

        return view('search', compact('searchedMembers'));
    }
}
