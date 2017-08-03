<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model
{
  protected $table = 'users';

  public function roles()
  {
    return $this->belongsToMany(Role::class,'role_user','user_id','role_id');
  }

  public function attachRole($role)
  {
    if(is_object($role)) {
        $role = $role->getKey();
    }

    if(is_array($role)) {
        $role = $role['id'];
    }

    $this->roles()->attach($role);
  }

  public function attachRoles($roles)
  {
    foreach ($roles as $role) {
      $this->attachRole($role);
    }
  }
}
