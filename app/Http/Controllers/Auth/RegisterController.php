<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255' ,'regex:/^[a-zA-Z-ก-ฮ\S]+$/'],
            'lname' => ['required', 'string', 'max:255','regex:/^[a-zA-Z-ก-ฮ\S]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','regex:/^([a-zA-Z0-9_.+-]+)@((kmutnb)\.(ac)\.(th))|([a-zA-Z0-9_.+-]+)@(([a-zA-Z]+)\.(kmutnb)\.(ac)\.(th))$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'images' => ['required','max:2048'],
            'phone' => ['required','regex:/^0[0-9]{8,9}$/'],
            'usertype' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = request();
        $image = $request->file('images');
            if(!is_null($image)){
            $path = $request->file('images')->store('avatar','public');
            $url = Storage::url($path);
            move_uploaded_file($url, $request->file('images'));
            }
            else{
                $url=-1;
            }
        return User::create([
            'usertype' => $data['usertype'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'picture'=> $url,
            'password' => Hash::make($data['password']),
        ]);
    }
}
