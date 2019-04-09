<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\campus;
use App\Issue;
use DB;
class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campus = campus::get();
        return view('admin.campus.index',compact('campus'));
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
        $this->validate($request,['campus_name' => 'required']);
        $campus_name = $request->get('campus_name');
            $campus = new campus(
                [
                  'campus_name' => $campus_name,
                ]
                );
                $campus->save();
        return redirect()->route('campus.index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
        //
    }
    public function delCampus(Request $request){
        if($request->ajax()){
            if(campus::count()>1){
            $id=$request->get('query');
            if(issue::where('campus_id','=',$id)->exists()){
                $data=array('html_1'=>'ไม่สามารถทำได้เนื่องจากมีเรื่องร้องเรียนที่เกี่ยวข้อง');
                echo json_encode($data);
            }
            else{
                DB::table('campuses')->where('campus_id','=',$id)->delete();
                $data=array('html_1'=>'ลบเสร็จสิ้น');
                echo json_encode($data);
            }
            }
            else{
                $data=array('html_1'=>'เนื่องจากเป็นวิทยาเขตสุดท้ายจึงไม่สามารถกระทำได้');
                echo json_encode($data);
            }
        }
    }
    public function editCampus(Request $request){
        if($request->ajax()){
            $campus_id=$request->get('campus_id');
            $campus_name=$request->get('campus_name');
            $campus = campus::find($campus_id);
            $campus->campus_name = $campus_name;
            $campus->save();
            $data=array('html_1'=>'แก้ไขชื่อวิทยาเขตจากเสร็จสิ้น');
            echo json_encode($data);
        }
    }
}
