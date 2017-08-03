<?php

$api = app('api.router');
$api->version('v1', ['namespace' => 'App\Http\Controllers'], function ($api) {

  /** @var \Dingo\Api\Routing\Router $api */
  $api->get('/', function () {
    //測試路由
    return app()->version();
  });

  $api->resource('users', 'UserController');
  $api->resource('roles', 'RoleController');
  $api->resource('permissions', 'PermissionController');
  $api->get('showAllrole', 'UserController@showAllrole');
  $api->get('showAllperm', 'RoleController@showAllperm');

});
