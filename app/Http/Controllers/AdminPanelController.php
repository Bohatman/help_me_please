<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\position;
use App\User;
use App\guest;
class AdminPanelController extends Controller
{
    public function index(){
        $category = category::with('getSubCategory')->where('category_id','!=',0)->get();
        $position = category::with('getPosition');
        $student = User::where('usertype','=',1)->count();
        $staff = User::where('usertype','=',2)->count();
        $guest = guest::count();
        return view('admin.setting',['category' => $category,'position' => $position,
        'student' => $student,
        'staff' => $staff,
        'guest' => $guest]);
    }
    public function indexAdmin(){
        return view('admin.index');
    }
}
