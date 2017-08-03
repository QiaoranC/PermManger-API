<?php namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $table = 'roles',
            $hidden = ['pivot'];

  public function permissions()
  {
    return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id');
  }

  public function users()
  {
    return $this->belongsToMany(User::class,'role_user','role_id','user_id','user_id');
  }

  public function attachPermission($permission)
  {
    if (is_object($permission)) {
        $permission = $permission->getKey();
    }

    if (is_array($permission)) {
        $permission = $permission['id'];
    }

    $this->permissions()->attach($permission);
  }

  public function attachPermissions($permissions)
  {
    foreach ($permissions as $permission){
      $this->attachPermission($permission);
    }
  }
}
