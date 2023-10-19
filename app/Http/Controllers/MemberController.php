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
            'members' => Member::orderBy('created_at', 'DESC')->get(),
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
            'payment_method' => $request->payment_method
        ]);


        return $this->index();
//        return redirect(route('members.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        return view('members.show', [
            'member' => Member::findOrFail($id) // will throw an exception if not found
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('members.edit', [
            'member' => Member::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, $id)
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
            'payment_method' => $request->payment_method
        ]);

        return redirect(route('members.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Member::destroy($id);

        return redirect(route('members.index'))->with('message', 'Teamlid is verwijderd');
    }

    private function storeImage($request){
        $newImageName = uniqid() . '_' . $request->name . '.' . $request->file('photograph')->extension();
            $request->photograph->extension();
        return $request->photograph->move("public/images/", $newImageName);
    }
}
