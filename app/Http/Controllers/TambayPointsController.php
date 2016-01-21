<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TambayPoint;
use App\Event;
use App\Member;
use Request;
use Carbon\Carbon;

class TambayPointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('tambay_points.index', compact('members'));
    }

    public function show($memberId,$pointId)
    {
        $tambay_point = TambayPoint::find($pointId);
        $date = Carbon::parse($tambay_point->date)->toFormattedDateString();
        return view('tambay_points.show', compact('tambay_point','date'));
    }

    public function search()
    {
        $input = Request::all();
        $query = $input['query'];
        $members = Member::where('first_name','LIKE',"%$query%")->orWhere('last_name','LIKE',"%$query%")->get();
        if ($members == "[]")
        {
            return redirect()->action('TambayPointsController@index');
        }
        return view('tambay_points.index',compact('members'));
    }

    public function filter()
    {
        $input = Request::all();
        $filter = $input['filter'];
        $members = Member::where('department',$filter)->get();
        if ($members == "[]")
        {
            return redirect()->action('TambayPointsController@index');
        }
        return view('tambay_points.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('tambay_points.create', compact('id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateTambayPointRequest $request,$id)
    {
        $input = Request::all();
        $tambay_point = new TambayPoint;
        $tambay_point->member_id = $id;
        $tambay_point->date = $input['date'];
        $tambay_point->duration = $input['duration'];
        $tambay_point->point = $input['point'];
        $tambay_point->save();
        $member = Member::find($id);
        $member->update(['total_points' => $tambay_point->point + $member->total_points]);
        return redirect()->action('TambayPointsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($memberId,$pointId)
    {
        $tambay_point = TambayPoint::find($pointId);
        $member = Member::find($memberId);
        $member->update(['total_points' => $member->total_points - $tambay_point->point]);
        $tambay_point->Delete('set null');
        return redirect()->action('TambayPointsController@index');
    }
}
