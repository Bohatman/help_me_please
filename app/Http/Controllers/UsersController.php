<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\category;
use App\position;
use App\guest;
use App\complaint;
use App\bookIT;
use Illuminate\Support\Facades\Storage;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('getPosition','getPosition.getCategory')->paginate(15);
        $guest = guest::paginate(15);
        return view('admin.user.manage',['user'=> $user,'guest'=>$guest]);
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
        //
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
        if(complaint::where('guest_id','=',$id)->exists()){
            return redirect()->route('user.index')->with('error', 'เกิดข้อผิดพลาด');
        }
        else{
            $guest = guest::find($id);
            $guest->delete();
            return redirect()->route('user.index')->with('success', 'ลบข้อมูลเรียบร้อย');
        }
    }
    public function editElement($id){
        if($user = User::with('getPosition')->where('UID','=',$id)->exists()){
        $category = category::get();
        $user = User::with('getPosition')->where('UID','=',$id)->get();
        return view('admin.user.edit',['user'=>$user,'category'=>$category]);
        }
        return redirect()->route('user.index');
    }
    public function editUser(Request $request){
        $this->validate($request,['UID' => 'required',
                                'usertype' => 'required',
                                'fname' => 'required',
                                'lname' => 'required',
                                'email' => 'required',
                                'position'=> 'required',]);

        $user = User::find($request->get('UID'));
        $image = $request->file('images');
            if(!is_null($image)){
            $path = $request->file('images')->store('avatar','public');
            $url = Storage::url($path);
            move_uploaded_file($url, $request->file('images'));
            }
            else{
                $url = $user->picture;
            }
        $user->usertype = $request->get('usertype');
        $user->picture = $url;
        $user->fname = $request->get('fname');
        $user->lname = $request->get('lname');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->position_id = $request->get('position');
        $user->save();
        return redirect()->route('user.index')->with('success', 'อัพเดทเรียบร้อย');
    }
    public function getPosition(Request $request){
        if($request->ajax()){
            $output='';
            $category_id=$request->get('query');
            $position = position::where('category_id','=',$category_id)->get();
            if(count($position)>0){
                foreach($position as $row){
                    $output .= '<option value="'.$row->position_id.'">'.$row->position_name." (".$row->priority_level.')'.'</option>';
                }
            }
            else{
                $output = '<option value="-1">ไม่พบตำแหน่ง</option>';
            }
            $data=array('html_1'=>$output);
            echo json_encode($data);
        }
    }
    public function profileLoader(){
        if(!Auth::check()){
            return redirect()->to(url('/login'));
        }
        $user = User::with('getPosition')->find(Auth::user()->UID);
        $complaint = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where('UID','=',Auth::user()->UID)->get();
        $book = bookIT::with('getTime','getType')->where('date','>=',date('Y-m-d'))->where('UID','=',Auth::user()->UID)->orderBy('date', 'asc')->get();
        return view('front.userprofile',[
            'user' => $user,
            'complaint' => $complaint,
            'book' => $book
        ]);
    }
}
