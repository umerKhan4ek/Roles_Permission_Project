<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('admin.dashboard');
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
        //
    }

    public function showAdminUsers()
    {
        // $user = null;
        // $admin = Role::where('name', 'staff')->first();
        // $adminUsers =  DB::table('role_user')->select('*')->where('role_id', $admin->id)->get();
        // return ['data' => $adminUsers];
        // return ['data' => User::all()];
        // return ['roles' => Role::where('name', 'admin')->get()];  
        $users = User::all();

        // foreach ($users as $user)
        // {
        //     $user = $user->roles()->where('id',$user->id)->get();
        // }
        return view('admin.adminusers',compact('users'));
    }

    public function showPermission($id)
    {
   
        $user = User::find($id);

        foreach($user->roles as $role)
        {
            $roles = $user->roles;

            $permission = Permission::all();
            if($role->name == 'developer')
            {
                

                return view('admin.developer.index')->with('users',$user)
                ->with('roles',$roles)->with('permissions',$permission);
            }
            else if($role->name == 'staff')
            {
                $permission = DB::table('permissions')->where('id' , 2 )->get();

            

                return view('admin.staff.index')->with('users',$user)
                ->with('roles',$roles)->with('permissions',$permission);

            }
        }

    }

       
   
        public function storepermissions(Request $request)
        {
            $role_id = $request->input('role_id');

            $role = Role::find($role_id);

            $permission = $request->input('permission');
            
            $role->permissions()->syncWithoutDetaching($permission);

            return redirect('admin/adminusers');
            

            // $role->permissions()->attach($permission);
            


        }

        public function storepermissionsStaff(Request $request)
        {
            $role_id = $request->input('role_id');

            $role = Role::find($role_id);

            $permission = $request->input('permission');
            
            $role->permissions()->syncWithoutDetaching($permission);

            return redirect('admin/adminusers'); 
        }
}
