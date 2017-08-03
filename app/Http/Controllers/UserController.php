<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserInterface;
use App\Transformers\UserTransformer;

class UserController extends ApiController {

  public function __construct(UserInterface $UserInterface)
  {
    $this->UserInterface = $UserInterface;
  }

  public function showAllrole()
  {
    $role = $this->UserInterface->showAllrole();

    return $this->respondWithCollection($role);
  }

  public function index(Request $request)
  {
    $params = [
      'perPage' => $request->input('per_page', 10),
      'filter'  => $request->input('filter', ''),
    ];
    $data = $this->UserInterface->getUser($params);

    return $this->paginator($data, new UserTransformer, ['key' => 'data']);
  }

  public function store(Request $request)
  {
    $this->validateUser($request);
    $params = $request->all();
    $this->UserInterface->addUser($params);

    return response(trans('success.create'));
  }

  public function update(Request $request, $id)
  {
    $this->validateUser($request);
    $params = $request->all();
    $this->UserInterface->updateUser($id, $params);

    return response(trans('success.update'));
  }

  public function destroy($id)
  {
    $this->UserInterface->deleteUser($id);

    return response(trans('success.delete'));
  }

  private function validateUser(Request $request)
  {
    $this->validate($request, [
      'name'         => 'required|string',
      'mobile'       => 'numeric',
      'email'        => '',
      'title'        => '',
    ]);
  }
}
