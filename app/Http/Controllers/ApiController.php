<?php namespace App\Http\Controllers;

use App\Utils\ApiResponse;
use App\Utils\ApiValidatesRequests;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController {
  use ApiResponse;
  use ApiValidatesRequests;
}
