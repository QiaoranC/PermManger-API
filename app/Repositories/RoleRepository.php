<?php namespace App\Repositories;

use App\Role;
use App\Permission;
use App\permission_role;
use App\Repositories\Interfaces\RoleInterface;

class RoleRepository implements RoleInterface {

  public function getRole($params)
  {
    $perPage = $params['perPage'];
    $filter  = $params['filter'];
    $role   = Role::orderBy('id');
    // $role = Role::with(['permissions' => function($query)
    // {
    //   $query->select('name', 'id');
    // }])->get();

    if ($filter) {
      $query = $query->where('id', 'like', "%{$filter}%");
    }
    // return  $role;
    return $role->paginate($perPage);
  }

  public function showAllperm()
  {
    $perm = Permission::select('display_name','id') ->get();

    return $perm;
  }

  public function addRole($data)
  {
    $role = new Role();
    $role->name         = $data['name'];
    $role->display_name = $data['display_name'];
    $role->description  = $data['description'];
    $role->save();

    $role->attachPermissions($data['id']);
  }

  public function updateRole($id, $data)
  {
    $role = Role::find($id);
    $role->name         = $data['name'];
    $role->display_name = $data['display_name'];
    $role->description  = $data['description'];
    $role->save();

    permission_role::where("permission_role.role_id",$id)
      ->delete();

    $role->attachPermissions($data['id']);
  }

  public function deleteRole($id)
  {
    $role = Role::find((int)$id);
    foreach ($role->users as $users){
      $role->users()->detach($users);
    }
    foreach ($role->permissions as $permissions){
      $role->permissions()->detach($permissions);
    }
    $role->delete();
  }

}
