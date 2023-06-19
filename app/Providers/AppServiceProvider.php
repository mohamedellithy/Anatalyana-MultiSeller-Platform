<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Nwidart\Modules\Facades\Module;
class AppServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        Module::macro('isModuleEnabled', function ($moduleName) {
            if ($this->has($moduleName)) {
                $module = $this->find($moduleName);
                return $module->isStatus(1);
            }

            return false;
        });
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }
}
