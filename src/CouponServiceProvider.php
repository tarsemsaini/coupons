<?php

namespace Ashriya\coupon;

use Illuminate\Support\ServiceProvider;

class CouponServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'coupon');
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

        //$this->registerBladeExtensions();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {

//        $this->mergeConfigFrom(__DIR__ . '/../config/roles.php', 'roles');
    }

    /**
     * Register Blade extensions.
     *
     * @return void
     */
    protected function registerBladeExtensions() {
        /*
          $blade = $this->app['view']->getEngineResolver()->resolve('blade')->getCompiler();

          $blade->directive('role', function ($expression) {
          return "<?php if (Auth::check() && Auth::user()->hasRole({$expression})): ?>";
          });

          $blade->directive('endrole', function () {
          return '<?php endif; ?>';
          });

          $blade->directive('permission', function ($expression) {
          return "<?php if (Auth::check() && Auth::user()->hasPermission({$expression})): ?>";
          });

          $blade->directive('endpermission', function () {
          return '<?php endif; ?>';
          });

          $blade->directive('level', function ($expression) {
          $level = trim($expression, '()');

          return "<?php if (Auth::check() && Auth::user()->level() >= {$level}): ?>";
          });

          $blade->directive('endlevel', function () {
          return '<?php endif; ?>';
          });

          $blade->directive('allowed', function ($expression) {
          return "<?php if (Auth::check() && Auth::user()->allowed({$expression})): ?>";
          });

          $blade->directive('endallowed', function () {
          return '<?php endif; ?>';
          });

         */
    }

}
