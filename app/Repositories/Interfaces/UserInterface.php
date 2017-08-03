<?php namespace App\Repositories\Interfaces;

interface UserInterface {

  public function getUser($params);

  public function showAllrole();

  public function updateUser($id, $data);

  public function deleteUser($data);

  public function addUser($data);

}
