<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UserCreate;
use App\Http\Requests\UserUpdate;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'phone', 'avatar', 'role_id')->where('id','!=', Auth::user()->id)->paginate(5);
        // $users = User::paginate(2);
        return view('admin.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name'=>'required'
        // ]);
        // dd($request->all());
        $user = new User();
        $user->fill($request->all());
        $user->status = 1;
        $user->password = Hash::make($request->password);
        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avtName = $avatar->hashName();
            $avtName = $request->id .'_'. $avtName;
            $user->avatar = $avatar->storeAs('images/users', $avtName);
        }else{
            $user->avatar = "";
        }
        $user->save();
        return redirect()->route('users.index')->with(['message' => 'Create User Success!']);
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
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
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
        $user = User::find($id);
        $data = $request->all();
        if($request->hasFile('avatar')){
            if(Storage::exists($user->avatar)){
                Storage::delete($user->avatar);
            }
            $avatar = $request->avatar;
            $avtName = $avatar->hashName();
            $avtName = $request->id .'_'. $avtName;
            $data['avatar'] = $avatar->storeAs('/images/users',$avtName);
        }else{
            $user->avatar = $user->avatar;
        }
        $user->update($data);
        return redirect()->route('users.index')->with(['message' => 'Update User Success!']);
    }

    public function changeRole(Request $request, $id){
        $change = User::select('role_id')->where('id', $id)->first();

        if($change->role_id == 1){
            $role_id = 2;
        }else{
            $role_id = 1;
        }

        $change->where('id', $id)->update(['role_id'=>$role_id]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $cmts = Comment::where('user_id', $id)->get();

        // foreach($cmts as $item){

        //     $replies = Reply::where('comment_id', $item->id)->get();

        //     foreach($replies as $i){
        //         Reply::destroy($i->id);
        //     }
        //     Comment::destroy($item->id);
        // }

        $user = User::find($id);
        if(Storage::exists($user->avatar)){
            Storage::delete($user->avatar);
        }
        $user->delete();
        return redirect()->route('users.index')->with(['message' => 'Delete User Success!']);
    }
}
