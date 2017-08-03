<?php namespace App\Repositories\Interfaces;

interface RoleInterface {

  public function getRole($params);

  public function showAllperm();

  public function addRole($data);

  public function updateRole($id, $data);

  public function deleteRole($id);

}
