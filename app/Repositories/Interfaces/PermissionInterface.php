<?php namespace App\Repositories\Interfaces;

interface PermissionInterface {

  public function getPerm($params);

  public function addPermission($params);

  public function updatePermission($id, $data);

  public function deletePermission($id);

}
