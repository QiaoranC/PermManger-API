<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Permission;

class RoleTransformer extends TransformerAbstract {
  /**
   * @param $item
   * @return array
   */
  public function transform($data)
  {
    $rolePermissions = $data->permissions()->pluck('name');
    $permission_ids  = $data->permissions()->pluck('id');

    // $permission = $data::with(['permissions' => function($query)
    // {
    //   $query->select('id');
    //
    // }])->get();
    // $permission = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")
    //  ->where("permission_role.role_id")
    //  ->get();

    return [
      'Role_id'                      => $data->id,
      'name'                         => $data->name,
      'display_name'                 => $data->display_name,
      'description'                  => $data->description,
      'Role_created_at'              => $data->created_at ->toDateString(),
      'Role_updated_at'              => $data->updated_at ->toDateString(),
      'id'                           => $permission_ids,
      'rolePermissions'              => $rolePermissions,
      // 'rolePermissions'              => $permission,

    ];
  }

}
