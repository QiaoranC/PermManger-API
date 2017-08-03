<?php namespace App\Providers;

use App\Utils\ApiSerializer;
use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\UserInterface;
use App\Repositories\PermissionRepository;
use App\Repositories\Interfaces\PermissionInterface;
use App\Repositories\RoleRepository;
use App\Repositories\Interfaces\RoleInterface;

class AppServiceProvider extends ServiceProvider {

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    $this->app['api.transformer']
         ->getAdapter()
         ->getFractal()
         ->setSerializer(new ApiSerializer);
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind(UserInterface::class, UserRepository::class);
    $this->app->bind(PermissionInterface::class, PermissionRepository::class);
    $this->app->bind(RoleInterface::class, RoleRepository::class);

  }
}
