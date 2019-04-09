<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\sub_category;
use App\position;
use App\issue;
use App\User;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::with('getSubCategory')->where('category_id','!=',0)->get();
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['category_name' => 'required']);
        $value = $request->get('category_name');
        $color = $request->get('category_color');
            $category = new category(
                [
                  'category_name' => $value,
                  'category_color' => $color
                ]
                );
                $category->save();
                $position1 = new position([
                    'category_id' => $category->category_id,
                    'priority_level' => 2,
                    'position_name' => "ผู้ดูแลทั่วไป",
                ]);
                $position1->save();
                $position2 = new position([
                    'category_id' => $category->category_id,
                    'priority_level' => 1,
                    'position_name' => "หัวหน้า",
                ]);
                $position2->save();
        return redirect()->route('category.index')->with('success','บันทึกข้อมูลเรียบร้อย');

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
    }
    public function editCategory(Request $request){
        $this->validate($request,['category_name' => 'required',
        'category_id' => 'required',
        'sub_category_name.*' => 'required',
        'sub_category_id.*' => 'required']);
        $category = category::find($request->get('category_id'));
        $category->category_name = $request->get('category_name');
        $category->category_color = $request->get('category_color');
        $category->save();
        $subid = $request->get('sub_category_id');
        $subname = $request->get('sub_category_name');
        if(!is_null($subname)){
        $subnum = count($subid);
        }
        else{
            $subnum =0;
        }
        if($subnum>0){
            for($pos=0;$pos<$subnum;$pos++){
                $newSub = sub_category::find($subid[$pos]);
                $newSub->sub_category_name = $subname[$pos];
                $newSub->save();
            }
        }

        return redirect()->route('category.index')->with('success', 'อัพเดทเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        DB::table('sub_categories')->where('category_id', '=', $category->category_id)->delete();
        $category->delete();
        return redirect()->route('category.index')->with('success', 'ลบข้อมูลเรียบร้อย');

    }
    public function editElement($id){
        if($category = category::with('getSubCategory')->where('category_id','=',$id)->exists()){
            $category = category::with('getSubCategory')->where('category_id','=',$id)->get();
            return view('admin.category.edit', compact('category'));
            }
            return redirect()->route('category.index');
    }
    public function delCategory(Request $request){
        //del all
        if($request->ajax()){
            $id=$request->get('query');
            if(category::count()>1){
                if(issue::where('category_id','=',$id)->exists()){
                    $data=array('html_1'=>'ไม่สามารถทำได้เนื่องจากมีเรื่องร้องเรียนที่เกี่ยวข้อง');
                    echo json_encode($data);
                }else{
                    $position=DB::table('positions')->where('category_id','=',$id)->get();
                    if(count($position)>0){
                        foreach($position as $row){
                            $user = User::where('position_id','=',$row->position_id)->update(['position_id'=> -1]);
                        }
                    }
                    $category = category::find($id);
                    $subcategory = DB::table('sub_categories')->where('category_id', '=', $category->category_id)->delete();
                    $category->delete();
                    DB::table('positions')->where('category_id','=',$id)->delete();
                    $data=array('html_1'=>'ลบเรียบร้อยแล้ว');
                    echo json_encode($data);
                }
            }else{
                $data=array('html_1'=>'เนื่องจากเป็นหัวข้อสุดท้ายจึงไม่สามารถกระทำได้');
                echo json_encode($data);
            }
        }
    }
}
