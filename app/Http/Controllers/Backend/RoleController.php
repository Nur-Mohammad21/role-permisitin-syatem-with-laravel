<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DB;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    private $users;
    private $user;
    private $role;
    private $roles;
    public function index()
    {
        return view('backend.role.create');
    }
    public function createRole(Request $request)
    {
        Role::create(['name' => $request->role_name]);
        return redirect()->back()->with('message','Role has been created');
    }
    public function usersRole()
    {
        $this->role = Role::all();
        $this->users = User::all();
        return view('backend.role.users',['users'=>$this->users,'role'=>$this->role]);
    }
    public function assignRole( Request $request)
    {
        $this->user = User::find($request->user_id);
        $checkRole = DB::table('model_has_roles')->where('model_id',$request->user_id)->count();
        if($checkRole!=null)
        {
            return redirect()->back()->with('message','Role already exists.');
        }
        $this->user->assignRole($request->role);
        return redirect()->back()->with('message','Assign Role successfully');

    }
    public function viewRole()
    {
        $users = User::all();
        $this->roles = DB::table('model_has_roles')
            ->select('users.id  as user_id','users.name  as user_name','users.email','roles.id as role_id','roles.name as role_name')
            ->join('users','users.id','=','model_id')
            ->leftJoin('roles','roles.id','=','role_id')->get();
        return view('backend.role.view',['roles'=> $this->roles]);
    }
    public function editRole($id,$roleId)
    {
        $currRoles = array();
        $user = User::find($id);
        $currRoles = Role::find($roleId);
        $roles = Role::all();
        return view('backend.role.edit',['user'=>$user,'currRoles'=>$currRoles,'roles'=>$roles]);
    }
    public function updateRole(Request $request, $id)
    {
        $this->user = User::find($id);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $this->user->assignRole($request->role);

        return redirect('/view-manage-role')->with('message','Role update successfully');
    }
    public function deleteRole($id)
    {
        DB::table("model_has_roles")->where('role_id',$id)->delete();
        return redirect()->back()->with('message','Role Delete successfully');
    }

}
