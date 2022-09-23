<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginform()
    {
        return view('auth.form-login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postlogin(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return redirect()->back()->with(['error'=>'Email không tồn tại']);
        }
        if(Auth::attempt(['password'=>$request->password])){
            return redirect()->back()->with(['error'=>'Mật khẩu không đúng']);
        }
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->route('home');
        }
        return redirect()->route('auth.loginform');
    }


    public function loginGG(){
        return Socialite::driver('google')->redirect();
    }

    public function postloginGG(Request $request)
    {
        // dd(Socialite::driver('google')->user());
        $ggUser = Socialite::driver('google')->user();
        if($ggUser){
            $user = User::where('email', $ggUser->email)->first();

            if($user){
                Auth::login($user); // khong can check password van cho dang nhap va luu thong tin
                // return redirect()->route('admin');
                return redirect()->route('home');
            }
            //neu khong co thi tao moi 1 ban ghi
            $newUser = new User();
            $newUser->fill($ggUser->user);
            $newUser->phone = ' ';
            $newUser->status = 1;
            $newUser->role_id = '2';
            // $newUser->status = '1';
            $newUser->avatar = $ggUser->user['picture'];
            $newUser->password = encrypt('123@123');
            $newUser->save();

            Auth::login($newUser);
           return redirect()->route('home');
        // return redirect()->route('admin');
        }
        return redirect()->back();
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
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.loginform');
    }
}
