<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use File;

class UserController extends Controller
{
    public function index()
    {
        $data['page_title'] = "User Management";
        $data['page_sub_title'] = "Users";
        $data['user'] = User::all();
        return view('user.index', $data);
    }
    public function create()
    {
        $data['page_title'] = "User Management";
        $data['page_sub_title'] = "Add New User";
        $data['outlet'] = Outlet::all();
        $data['level'] = Level::all();
        return view('user.add', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:20',
            'username' => 'required|min:2|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:20',
            'photo' => 'required',
            'outlet_id' => 'required',
            'level_id' => 'required',
            'status' => 'required',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->outlet_id = $request->outlet_id;
        $user->level_id = $request->level_id;
        $user->status = $request->status;
        $photo = $request->file('photo');
        $tujuan_upload = 'avatar';
        $photo_name = time() . "_" . $photo->getClientOriginalName();
        $photo->move($tujuan_upload, $photo_name);
        $user->photo = $photo_name;
        $user->save();
        if ($request->submit == "more") {
            return redirect()->route('admin.cms_users.create')->with(['success' => 'User has been saved !']);
        } else {
            return redirect()->route('admin.cms_users.index')->with(['success' => 'User has been saved']);
        };
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        File::delete('avatar/' . $user->photo);
        $user->delete();
        return redirect()->back()->with(['success' => 'User has been deleted']);
    }
}
