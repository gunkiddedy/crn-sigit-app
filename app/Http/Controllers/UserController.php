<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request) {
        if (!empty($request->input('keyword'))) {
            $data = \App\Models\User::where('name', 'like', "%".$request->input('keyword')."%")
            ->orWhere('email', 'like', "%".$request->input('keyword')."%")
            ->orWhere('role', 'like', "%".$request->input('keyword')."%")
            ->paginate(1000);

            return view('user.index', [
                'data' => $data
            ]);
        } else {
            $data = \App\Models\User::orderBy('id', 'DESC')->paginate(10);
            if (count($data) > 0) {
                return view('user.index', [
                    'data' => $data
                ]);
            } else {
                return redirect('/users/new');
            }
        }
    }

    public function view($id) {
        $data = \App\Models\User::where('id', Crypt::decryptString($id))->first();
        return view('user.detail', [
            'data' => $data
        ]);
    }

    public function update(Request $request) {
        $role = $request->input('role');
        // $roles = array_unique($roles);
        // $roles = implode(',', $roles);

        // dd($roles);

        \App\Models\User::where('id', Crypt::decryptString($request->id))
          ->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $role,
        ]);

        return redirect()->back()->with(['alert' => 'Update User Success!']);
    }

    public function input() {
        return view('user.input');
    }

    public function inputpost(Request $request) { 
        $role = $request->input('role');
        // $roles = array_unique($roles);
        // $roles = implode(',', $roles);
        
        // dd($roles);

        $fields = \App\Models\User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $role,
        ]);
        
        if ($fields) {
            return redirect('/users')->with(['alert' => 'Insert User Success!']);
        } else {
            return redirect('/users')->with(['alert' => 'Error!']);
        }
    }

    public function delete(Request $request) {
        $act = \App\Models\User::where('id', Crypt::decryptString($request->id))->delete();
        if ($act) {
            return redirect('/users')->with(['alert' => 'Delete User Success!']);
        } else {
            return redirect('/users')->with(['alert' => 'Error!']);
        }
    }
}
