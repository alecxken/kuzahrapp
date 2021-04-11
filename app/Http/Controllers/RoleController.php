<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    //
    public function viewroles()
    {
            //    $roles = Role::get();

               $roles = Role::all();//Get all roles

              $permissions = Permission::all();//Get all roles

            return view('admin.role',compact('roles','permissions'));
    }


     public function roles_store(Request $request)
    {
      //Get all users and pass it to the view
       $this->validate($request, [
            'name'=>'required|unique:roles|max:15',
            'permissions' =>'required',
            ]
        );

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;

        $permissions = $request['permissions'];

        $role->save();
    //Looping thru selected permissions
        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail();
         //Fetch the newly created role and assign permission
            $role = Role::where('name', '=', $name)->first();
            $role->givePermissionTo($p);
        }

        return back()
            ->with('flash_message',
             'Role'. $role->name.' added!');
    }


      public function permissions_store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) { //If one or more role is selected
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                $r->givePermissionTo($permission);
            }
        }

        return back()->with('status','Permission'. $permission->name.' added!');
    }
}
