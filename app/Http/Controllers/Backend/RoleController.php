<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PermissionExport;
use App\Http\Controllers\Controller;
use App\Imports\PermissionImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;


class RoleController extends Controller
{
    public function AllPermission(){
        $permission = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permission'));
    }

    public function AddPermission(){
        return view('backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request){
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name
        ]);

        $notification = array(
            'message' => 'Permission Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id)
    {
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission', compact('permission'));
    }

    public function UpdatePermission(Request $request)
    {


        $per_id = $request->id;

        Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name
        ]);

        $notification = array(
            'message' => 'Permission  Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id)
    {
        Permission::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function ImportPermission(){
        return view('backend.pages.permission.import_permission');
    }

    public function Export(){
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }

    public function Import(Request $request){
        Excel::import(new PermissionImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Permission  Imported Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    /// Role All Method

    public function AllRoles(){
        $roles=Role::all();
        return view('backend.pages.roles.all_roles',compact('roles'));
    }

    public function Addroles(){
        return view('backend.pages.roles.add_roles');
    }

    public function StoreRoles(Request $request){
        $roles = Role::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }

    public function EditRoles($id){
        $roles = Role::findOrFail($id);
        return view('backend.pages.roles.edit_roles', compact('roles'));
    }

    public function UpdateRoles(Request $request){
        $rol_id = $request->id;

        Role::findOrFail($rol_id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role  Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }

    public function DeleteRoles($id){
        Role::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /// Add Role Permission All Method

    public function AddRolesPermission(){
        $roles = Role::all();
        $permission = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.rolesetup.add_roles_permission', compact
        (
            'roles',
        'permission',
        'permission_groups'
        ));
    }

    public function RolePermissionStore(Request $request){

        $data = array();
        $permissions = $request->permission;
        foreach($permissions as $key => $item){
                $data['role_id'] = $request->role_id;
                $data['permission_id'] = $item;
                DB::table('role_has_permissions')->insert($data);
        } // /end foreach

        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function AllRolesPermission(){
        $roles = Role::all();
        return view('backend.pages.rolesetup.all_roles_permission',compact('roles'));
    }

    public function AdminEditRoles($id){
        $role = Role::findOrFail($id);
        $permission = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.rolesetup.edit_roles_permission', compact
        (
            'role',
        'permission',
        'permission_groups'
        ));
    }

    public function AdminRolesUpdate(Request $request, $id){
        $role = Role::findOrFail($id);
        $permissions = $request->permission;


        if(!empty($permissions)){
            $role->syncPermissions($permissions);
            // dd($role);
        }

        $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function AdminRolesDelete($id){
        $role = Role::findOrFail($id);
        if(!is_null($role)){
            $role->delete();
        }
        $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);
    }
}
