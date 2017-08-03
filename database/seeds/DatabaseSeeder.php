<?php

use App\User;
use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
    * Run the database seeds.
    *
    * @return void
    */
  public function run()
  {
    factory(User::class, 30)->create();
    $permission = [
          [
            'name' => 'role-list',
            'display_name' => 'Display Role Listing',
            'description' => 'See only Listing Of Role'
          ],
          [
            'name' => 'role-create',
            'display_name' => 'Create Role',
            'description' => 'Create New Role'
          ],
          [
            'name' => 'role-edit',
            'display_name' => 'Edit Role',
            'description' => 'Edit Role'
          ],
          [
            'name' => 'role-delete',
            'display_name' => 'Delete Role',
            'description' => 'Delete Role'
          ],
          [
            'name' => 'item-list',
            'display_name' => 'Display Item Listing',
            'description' => 'See only Listing Of Item'
          ],
          [
            'name' => 'item-create',
            'display_name' => 'Create Item',
            'description' => 'Create New Item'
          ],
          [
            'name' => 'item-edit',
            'display_name' => 'Edit Item',
            'description' => 'Edit Item'
          ],
          [
            'name' => 'item-delete',
            'display_name' => 'Delete Item',
            'description' => 'Delete Item'
          ]
        ];

        foreach ($permission as $key => $value) {
          Permission::create($value);
        }

        $roles = [
          [
            'name' => 'admin_top',
            'display_name' => 'Top Admin',
            'description' => 'none'
          ],
          [
            'name' => 'admin_middle',
            'display_name' => 'Middel Admin',
            'description' => 'none'
          ],
          [
            'name' => 'admin_entry',
            'display_name' => 'Entry Admin',
            'description' => 'none'
          ],
          [
            'name' => 'user_top',
            'display_name' => 'Top User',
            'description' => 'none'
          ],
          [
            'name' => 'user_middle',
            'display_name' => 'Middle User',
            'description' => 'none'
          ]
        ];

        foreach ($roles as $key => $value) {
          Role::create($value);
        }

  \DB::select(
            <<<SQL
                INSERT INTO `role_user` (`user_id`, `role_id`)
VALUES
  (1, 1),
  (2, 2),
  (2, 3),
  (4, 2),
  (4, 4),
  (5, 5);
SQL
        );

  \DB::select(
            <<<SQL
                INSERT INTO `permission_role` (`permission_id`, `role_id`)
VALUES
  (1, 1),
  (2, 1),
  (2, 2),
  (3, 2),
  (1, 3),
  (2, 3),
  (6, 4),
  (7, 5);
SQL
        );
  }
}
