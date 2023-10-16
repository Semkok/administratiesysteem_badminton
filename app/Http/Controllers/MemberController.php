<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('members.index', [
            'member' => Member::orderBy('created_at', 'DESC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        $member = new Member();
        $member->nickname = $request->nickname;
        $member->name = $request->name;
        $member->surname = $request->surname;
        $member->phonenumber = $request->phonenumber;
        $member->email = $request->email;
        $member->photograph = $request->photograph;
        $member->birthday = $request->birthday;
        $member->address = $request->address;
        $member->nickname = $request->nickname;
        $member->bank = $request->bank;
        $member->payment_method = $request->payment_method;


        $member->save();
        return $this->index();
//        return redirect(route('members.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
