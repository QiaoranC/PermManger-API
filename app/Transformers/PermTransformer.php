<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class PermTransformer extends TransformerAbstract {

  /**
   * @param $item
   * @return array
   */
  public function transform($data)
  {

    return [
      'id'                           => $data->id,
      'name'                         => $data->name,
      'display_name'                 => $data->display_name,
      'description'                  => $data->description,
      'updated_at'                   => $data->updated_at ->toDateString(),
    ];
  }

}
