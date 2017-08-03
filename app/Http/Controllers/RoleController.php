<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\RoleInterface;
use App\Transformers\RoleTransformer;

class RoleController extends ApiController {

  public function __construct(RoleInterface $RoleInterface)
  {
    $this->RoleInterface = $RoleInterface;
  }

  public function showAllperm()
  {
    $perm = $this->RoleInterface->showAllperm();

    return $this->respondWithCollection($perm);
  }

  public function index(Request $request)
  {
    $params = [
      'perPage' => $request->input('per_page', 10),
      'filter'  => $request->input('filter', ''),
    ];
    $data = $this->RoleInterface->getRole($params);
    // return $data;
    return $this->paginator($data, new RoleTransformer, ['key' => 'data']);
  }

  public function store(Request $request)
  {
    $this->validateRole($request);
    $params = $request->all();
    $this->RoleInterface->addRole($params);

    return response(trans('success.create'));
  }

  public function update(Request $request, $id)
  {
    $this->validateRole($request);
    $params = $request->all();
    $this->RoleInterface->updateRole($id, $params);

    return response(trans('success.update'));
  }

  public function destroy($id)
  {
    $this->RoleInterface->deleteRole($id);

    return response(trans('success.delete'));
  }

  private function validateRole(Request $request)
  {
    $this->validate($request, [
      'name'         => 'required|string',
      'display_name' => 'required|string',
      'description'  => '',
    ]);
  }
}
