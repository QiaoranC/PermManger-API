<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\PermissionInterface;
use App\Transformers\PermTransformer;

class PermissionController extends ApiController {

  public function __construct(PermissionInterface $PermissionInterface)
  {
    $this->PermissionInterface = $PermissionInterface;
  }

  public function index (Request $request)
  {
    $params = [
      'perPage' => $request->input('per_page', 10),
      'filter'  => $request->input('filter', ''),
    ];
    $data = $this->PermissionInterface->getPerm($params);

    return $this->paginator($data, new PermTransformer, ['key' => 'data']);
  }

  public function store(Request $request)
  {
    $this->validatePerm($request);
    $params = $request->all();
    $this->PermissionInterface->addPermission($params);

    return response(trans('success.create'));
  }

  public function update(Request $request, $id)
  {
    $this->validatePerm($request);
    $params = $request->all();
    $this->PermissionInterface->updatePermission($id, $params);

    return response(trans('success.update'));
  }

  public function destroy($id)
  {
    $this->PermissionInterface->deletePermission($id);

    return response(trans('success.delete'));
  }

  private function validatePerm(Request $request)
  {
    $this->validate($request, [
      'name'           => 'required|string',
      'display_name'   => 'required|string',
      'description'    => '',
    ]);
  }

}
