<?php
// UserController generated placeholder with CRUD using Blade.

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller {
public function index(){ $users=User::paginate(10); return view('admin.users.index',compact('users')); }
public function create(){ return view('admin.users.create'); }
public function store(Request $request){ User::create(['fullname'=>$request->fullname,'username'=>$request->username,'email'=>$request->email,'password'=>bcrypt($request->password),'phone'=>$request->phone,'address'=>'','gender'=>1,'birthday'=>'2000-01-01','role'=>1,'status'=>1]); return redirect()->route('users.index');}
public function show(string $id){}
public function edit(string $id){ $user=User::findOrFail($id); return view('admin.users.edit',compact('user')); }
public function update(Request $request,string $id){ $user=User::findOrFail($id); $user->update(['fullname'=>$request->fullname,'email'=>$request->email]); return redirect()->route('users.index');}
public function destroy(string $id){ User::findOrFail($id)->delete(); return redirect()->route('users.index');}
}
