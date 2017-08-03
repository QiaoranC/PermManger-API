<?php namespace App;

use Zizaco\Entrust\EntrustPermission;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
  protected $table = 'permissions',
            $hidden = ['pivot'];

  public function roles()
  {
    return $this->belongsToMany(Role::class,'permission_role','permission_id','role_id');
  }
}
