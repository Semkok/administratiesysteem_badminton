<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Tournament;
use App\Http\Requests\StoreTournamentRequest;
use App\Http\Requests\UpdateTournamentRequest;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        return view('tournaments.index', [
            'tournaments' => Tournament::orderBy("id")->paginate(20),
            'totalTournaments' => Tournament::count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : object
    {
        return view('tournaments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTournamentRequest $request) : object
    {

        Tournament::create([
            'name' => $request->name,
            'begin_date' => $request->begin_date,
            'end_date' => $request->end_date

        ]);
        return $this->index();


    }

    /**
     * Display the specified resource.
     */
    public function show($id) : object
    {

        return view('tournaments.show', [
            'tournament' => Tournament::findOrFail($id), // will throw an exception if not found
            'membersInTournament' => Member::where("tournament_id", "=", $id)->get()

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) : object
    {
        return view('tournaments.edit', [
            'tournament' => Tournament::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTournamentRequest $request, $id) : object
    {
        $request->validate([
            'name' => 'required|unique|string|max:20',

        ]);


        $request->except(['_token','_method']);

        Tournament::where('id', $id)->update([
            'name' => $request->name,
            'begin_date' => $request->begin_date,
            'end_Date' => $request->end_date,
        ]);

        return redirect(route('tournaments.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) : object
    {
        Tournament::destroy($id);

        // when tournament is deleted set the member tournament_id to zero as default
        Member::where("id", "=", $id)->update(['tournament_id' => 0]);


        return redirect(route('tournaments.index'))->with('message', 'Teamlid is verwijderd');
    }
}
