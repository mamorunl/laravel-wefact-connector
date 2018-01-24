<?php
/**
 * Created by RAPIDE Internet.
 * Author: Bas Hepping <bashepping@rapide.nl>
 * Date: 19-1-2018
 * Time: 14:51
 */

namespace mamorunl\WeFact;

use Illuminate\Support\ServiceProvider;

class WeFactServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    /**
     * Perform post-registration booting of services
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/wefact.php' => config_path('wefact.php')
        ]);
    }
}