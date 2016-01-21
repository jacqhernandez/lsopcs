<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Member;
use App\Point;
use App\TambayPoint;
use Request;
use Carbon\Carbon;


class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        $birthday = Carbon::parse($member->birthday)->toFormattedDateString();
        $points = Point::where('member_id',$id)->get();
        $tambay_points = TambayPoint::where('member_id',$id)->get();
        return view('members.show', compact('member','points','tambay_points','birthday'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    public function search()
    {
        $input = Request::all();
        $query = $input['query'];
        $members = Member::where('first_name','LIKE',"%$query%")->orWhere('last_name','LIKE',"%$query%")->get();
        if ($members == "[]")
        {
            return redirect()->action('MembersController@index');
        }
        return view('members.index',compact('members'));
    }

    public function filter()
    {
        $input = Request::all();
        $filter = $input['filter'];
        $members = Member::where('department',$filter)->get();
        if ($members == "[]")
        {
            return redirect()->action('MembersController@index');
        }
        return view('members.index',compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateMemberRequest $request)
    {
        $input = Request::all();
        $member = new Member;
        $member->id_number = $input['id_number'];
        $member->first_name = $input['first_name'];
        $member->last_name = $input['last_name'];
        $member->year = $input['year'];
        $member->course = $input['course'];
        $member->email = $input['email'];
        $member->birthday = $input['birthday'];
        $member->status = $input['status'];
        $member->department = $input['department'];
        $member->save();
        return redirect()->action('MembersController@show',$member->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        $input = Request::all();
        $member->update([
            'id_number' => $input['id_number'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'year' => $input['year'],
            'course' => $input['course'],
            'email' => $input['email'],
            'birthday' => $input['birthday'],
            'status' => $input['status'],
            'department' => $input['department'],
        ]);
        return redirect()->action('MembersController@show',$member->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->Delete('set null');
        return redirect()->action('MembersController@index');
    }
}
