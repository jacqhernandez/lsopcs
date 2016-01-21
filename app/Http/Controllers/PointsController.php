<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Point;
use App\Event;
use App\Member;
use Request;


class PointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        $events = Event::all();
        return view('points.index', compact('members','events'));
    }

    public function search()
    {
        $input = Request::all();
        $query = $input['query'];
        $events = Event::all();
        $members = Member::where('first_name','LIKE',"%$query%")->orWhere('last_name','LIKE',"%$query%")->get();
        if ($members == "[]")
        {
            return redirect()->action('PointsController@index');
        }
        return view('points.index',compact('members','events'));
    }

    public function filter()
    {
        $input = Request::all();
        $filter = $input['filter'];
        $events = Event::all();
        $members = Member::where('department',$filter)->get();
        if ($members == "[]")
        {
            return redirect()->action('PointsController@index');
        }
        return view('points.index',compact('members','events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $events = Event::all()->lists('name','id');
        return view('points.create', compact('id','events'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreatePointRequest $request,$id)
    {
        $input = Request::all();
        $point = new Point;
        $point->member_id = $id;
        $point->event_id = $input['event_id'];
        $point->point = $input['point'];
        $point->save();
        $member = Member::find($id);
        $member->update(['total_points' => $point->point + $member->total_points]);
        return redirect()->action('MembersController@show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($memberId,$pointId)
    {
        $point = Point::find($pointId);
        $member = Member::find($memberId);
        $member->update(['total_points' => $member->total_points - $point->point]);
        $point->Delete('set null');
        return redirect()->action('MembersController@show',$memberId);
    }
}
