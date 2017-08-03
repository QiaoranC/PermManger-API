<?php namespace App\Repositories;

use App\User;
use App\Role;
use App\role_user;
use App\Repositories\Interfaces\UserInterface;

class UserRepository implements UserInterface {

  public function getUser($params)
  {
    $perPage = $params['perPage'];
    $filter  = $params['filter'];
    $query   = User::orderBy('id');

    if ($filter) {
      $query = $query->where('id', 'like', "%{$filter}%");
    }

    return $query->paginate($perPage);
  }

  public function showAllrole()
  {
    $role = Role::select('display_name', 'id') ->get();

    return $role;
  }

  public function updateUser($id, $data)
  {
    $User = User::find($id);
    $User->name         = $data['name'];
    $User->email        = $data['email'];
    $User->mobile       = $data['mobile'];
    $User->title        = $data['title'];
    $User->save();

    role_user::where("user_id",$id)
      ->delete();

    $User->attachRoles($data['id']);
  }

  public function addUser($data)
  {
    $User = new User();
    $User->name         = $data['name'];
    $User->email        = $data['email'];
    $User->mobile       = $data['mobile'];
    $User->title        = $data['title'];
    $User->save();

    $User->attachRoles($data['id']);
  }

  public function deleteUser($id)
  {
    $User = User::find((int)$id);
    foreach ($User->roles as $urole){
      $User->roles()->detach($urole);
    }

    $User->delete();
  }
}
