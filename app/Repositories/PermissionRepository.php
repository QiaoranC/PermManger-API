<?php namespace App\Repositories;

use App\Permission;
use App\Repositories\Interfaces\PermissionInterface;

class PermissionRepository implements PermissionInterface {

  public function getPerm($params)
  {
    $perPage = $params['perPage'];
    $filter  = $params['filter'];
    $query   = Permission::orderBy('id');

    if ($filter) {
      $query = $query->where('display_name', 'like', "%{$filter}%");
    }

    return $query->paginate($perPage);
  }

  public function addPermission($data)
  {
    Permission::forceCreate([
      'name'          => $data['name'],
      'display_name'  => $data['display_name'],
      'description'   => $data['description'],
    ]);
  }

  public function updatePermission($id, $data)
  {
    Permission::where('id', $id)->update([
      'name'          => $data['name'],
      'display_name'  => $data['display_name'],
      'description'   => $data['description'],
    ]);
  }

  public function deletePermission($id)
  {
    $permission = Permission::find((int)$id);
    foreach ($permission->roles as $role) {
      $permission->roles()->detach($role);
    }

    $permission->delete();
  }
}
