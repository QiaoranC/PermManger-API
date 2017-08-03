<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract {
  /**
   * @param $item
   * @return array
   */
  public function transform($data)
  {
    $UserRole = $data->roles()->pluck('name');
    $role_ids = $data->roles()->pluck('id');

    return [
      'User_id'                      => $data->id,
      'name'                         => $data->name,
      'mobile'                       => $data->mobile,
      'email'                        => $data->email,
      'title'                        => $data->title,
      'created_at'                   => $data->created_at ->toDateString(),
      'updated_at'                   => $data->updated_at ->toDateString(),
      'id'                           => $role_ids,
      'UserRole'                     => $UserRole,
    ];
  }

}
