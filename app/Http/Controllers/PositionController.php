<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\position;
class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $position = category::with('getPosition')->where('category_id','!=',0)->get();
        return view('admin.position.index',compact('position'));

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
        $position = $request->get('position_name');
        $category = $request->get('category');
        $cout=0;
        if(count($position) > 0 ){
        foreach ($position as $row) {

            if($row != null){
            $position = new position(
                [
                  'position_name' => $row,
                  'category_id' => $category[$cout],
                  'priority_level' => 2,
                ]
                );
                $position->save();
            }
            $cout++;
        }

        } else {
                return redirect()->route('position.index')->with('Empty','กรุณากรอกข้อมูลให้เรียบร้อย');
            }
        return redirect()->route('position.index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
    public function editElement($id){
        if($position = position::with('getCategory')->where('category_id','=',$id)->exists()){
            $position = position::with('getCategory')->where('category_id','=',$id)->get();
            $category_name = $position[0]->getCategory->category_name;
            return view('admin.position.edit', ['position' => $position,
                                                'category_id' => $id,
                                                'category_name'=> $category_name]);
        }
        return redirect()->route('position.index');
    }
    public function editPosition(Request $request){
        $this->validate($request,['priority_level.*' => 'required',
                                    'position_id.*' => 'required']);
        $priority_level = $request->get('priority_level');
        $position_id = $request->get('position_id');
        $num = count($priority_level);
        if(count($priority_level)>0 && count($position_id) > 0){
            for($i=0;$i<$num;$i++){
                $position = position::find($position_id[$i]);
                $position->priority_level=$priority_level[$i];
                $position->save();
            }
        }
        return redirect()->route('position.index')->with('success', 'อัพเดทเรียบร้อย');
    }
}
