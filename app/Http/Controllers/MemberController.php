<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Tournament;
use Carbon\Carbon;
use Illuminate\Http\Request;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : object
    {

        // deletes expired members first to keep the index page uptodate
        $this->deleteExpiredMembers();

        return view('members.index', [
            'members' => Member::orderBy('id', 'DESC')->paginate(20),
            'totalMembers' => Member::count(),
        ]);



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : object
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request) : object
    {
//        $members = new Member();
//        $members->name = $request->name;
//        $members->surname = $request->surname;
//        $members->phonenumber = $request->phonenumber;
//        $members->email = $request->email;
//        $members->photograph = $request->photograph;
//        $members->birthday = $request->birthday;
//        $members->address = $request->address;
//        $members->nickname = $request->nickname;
//        $members->bank = $request->bank;
//        $members->payment_method = $request->payment_method;
//        $members->save();
        Member::create([
            'nickname' => $request->nickname,
            'name' => $request->name,
            'surname' => $request->surname,
            'phonenumber' => $request->phonenumber,
            'email' => $request->email,
            'photograph' => $this->storeImage($request),
            'birthday' => $request->birthday,
            'address' => $request->address,
            'bank' => $request->bank,
            'payment_method' => $request->payment_method,
            'registration_date' => Carbon::now(),
//            'expiration_date' => Carbon::now()->addYear()
            'expiration_date' => $request->expiration_date,
//            'tournament_id' => 1

        ]);
        return $this->index();
//        return redirect(route('members.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show($id) : object
    {
        $member = Member::find($id);


        return view('members.show', [
            'member' => Member::findOrFail($id), // will throw an exception if not found
            'expired' => $this->daysUntilMemberExpiration($member),
            'tournament' => Tournament::where("id","=", $member->tournament_id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) : object
    {
        return view('members.edit', [
            'member' => Member::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, $id) : object
    {
        $request->validate([
            'nickname' => 'required|string|max:20',
            'name' => 'required|string|max:20',
            'surname' => 'required|string|max:20',
            'phonenumber' => 'required|string',
            'email' => 'required|email|unique:members,email,' . $id,
            'photograph' => 'required|file|mimes:jpeg,jpg,png', // Adjust validation rules as needed.
            'birthday' => 'required|date',
            'address' => 'required|string',
            'bank' => 'required|string',
            'payment_method' => 'required|string',
        ]);


        $request->except(['_token','_method']);

        Member::where('id', $id)->update([
            'nickname' => $request->nickname,
            'name' => $request->name,
            'surname' => $request->surname,
            'phonenumber' => $request->phonenumber,
            'email' => $request->email,
            'photograph' => $this->storeImage($request),
            'birthday' => $request->birthday,
            'address' => $request->address,
            'bank' => $request->bank,
            'payment_method' => $request->payment_method,
        ]);

        return redirect(route('members.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) : object
    {
        Member::destroy($id);

        return redirect(route('members.index'))->with('message', 'Teamlid is verwijderd');
    }

    private function storeImage($request) : object
    {
        $newImageName = uniqid() . '_' . $request->name . '.' . $request->file('photograph')->extension();
            $request->photograph->extension();
        return $request->photograph->move("public/images/", $newImageName);
    }

    private function deleteExpiredMembers() : void
    {
        Member::where('expiration_date', '<', now())->delete();
    }
    private function daysUntilMemberExpiration(Member $member) : int
    {
        $expirationDate = $member->expiration_date;

        // Calculate the difference in days
        $daysUntilExpiration = Carbon::now()->diffInDays($expirationDate, false);

        // If $daysUntilExpiration is negative, it means the expiration date has passed
        // In that case, return 0 to indicate that the membership has already expired.
        return $daysUntilExpiration < 0 ? 0 : $daysUntilExpiration;
    }


}
