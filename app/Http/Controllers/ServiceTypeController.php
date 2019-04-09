<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bookIT;
use App\servicetype;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicetype = servicetype::get();
        return view('admin.itclinic.servicetype',compact('servicetype'));
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
        $this->validate($request,['servicetype_name' => 'required',
        'servicetype_price' => 'required|numeric',
        'usertype' => 'required',]);
        $servicetype = new servicetype([
            'servicetype_name' => $request->get('servicetype_name'),
            'servicetype_price' => $request->get('servicetype_price'),
            'usertype' => $request->get('usertype'),
        ]);
        $servicetype->save();
        return redirect()->route('service.index')->with('success','เรียบร้อยแล้ว');;
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
        if(!bookIT::where('servicetype_id','=',$id)->exists()){
        if(servicetype::count()>1){
        $servicetype = servicetype::find($id);
        $servicetype->delete();
      return redirect()->route('service.index')->with('success', 'ลบข้อมูลเรียบร้อย');
        }
        else{
            return redirect()->route('service.index')->with('error', 'ไม่สามารถลบได้');
        }
    }
    else{
        return redirect()->route('service.index')->with('error', 'ไม่สามารถลบได้');
    }
    }
    public function editService($id){
        if(servicetype::find($id)->exists()){
            $servicetype = servicetype::find($id);
            return view('admin.itclinic.edit',compact('servicetype'));
            }
        return redirect()->route('service.index')->with('error', 'ไม่พบข้อมูล');
    }

    public function editServicetype(Request $request){
        if(servicetype::find($request->get('servicetype_id'))->exists()){
            $servicetype = servicetype::find($request->get('servicetype_id'));
            $servicetype->servicetype_name = $request->get('servicetype_name');
            $servicetype->servicetype_price = $request->get('servicetype_price');
            $servicetype->usertype = $request->get('usertype');
            $servicetype->save();
            return redirect()->route('service.index')->with('success', 'แก้ไขข้อมูลเสร็จสิ้น');

        }
        return redirect()->route('service.index')->with('error', 'ไม่พบข้อมูล');
    }
}
