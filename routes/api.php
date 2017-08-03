<?php

$api = app('api.router');
$api->version('v1', ['namespace' => 'App\Http\Controllers'], function ($api) {

  /** @var \Dingo\Api\Routing\Router $api */
  $api->get('/', function () {
    //測試路由
    return app()->version();
  });

  // $api->resource('areas', 'AreaController');
  // $api->resource('users', 'UserInfoController');
  // $api->resource('institutions', 'InstitutionController');
  // $api->get('roles/create', 'RoleController@showAllperm');
  // $api->resource('roles', 'RoleController');
  // $api->get('userRoles/create', 'UserRoleController@showAllrole');
  // $api->resource('userRoles', 'UserRoleController');
  // $api->resource('permissions', 'PermissionController');

});
