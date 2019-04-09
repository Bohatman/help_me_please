<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\servicetime;
use App\bookIT;
class ServiceTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicetime = servicetime::orderBy('time_start', 'ASC')->get();
        return view('admin.itclinic.servicetime',compact('servicetime'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time_start = strtotime($request->get('time_start'));
        $time_end = strtotime($request->get('time_end'));
        $servicetime = servicetime::get();
        foreach($servicetime as $time){
            if(($time_start > strtotime($time->time_start) && $time_start < strtotime($time->time_end) )|| ($time_end > strtotime($time->time_start) && $time_end < strtotime($time->time_end))){
                return redirect()->route('time.index')->with('error','เวลาที่กำหนดไม่สามารถใช้ได้');
           }
        }
        $servicetimenew = new servicetime([
            'time_start' => $request->get('time_start'),
            'time_end' => $request->get('time_end'),
        ]);
        $servicetimenew->save();
        return redirect()->route('time.index')->with('success','ทำการเพิ่มเวลาทำการเรียบร้อนแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!bookIT::where('available_id','=',$id)->exists() ){
        $servicetime = servicetime::find($id);
      $servicetime->delete();
      return redirect()->route('time.index')->with('success','ทำการลบเรียบร้อย');}
      else{
        return redirect()->route('time.index')->with('error','ไม่สามารถลบได้');
      }
    }
}
