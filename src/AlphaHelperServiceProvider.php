<?php

namespace Sinarajabpour1998\AlphaHelper;

use Illuminate\Support\ServiceProvider;
use Sinarajabpour1998\AlphaHelper\Facades\CategoryHelperFacade;
use Sinarajabpour1998\AlphaHelper\Facades\AlphaHelper;
use Sinarajabpour1998\AlphaHelper\Helpers\CategoryHelper;
use Sinarajabpour1998\AlphaHelper\Helpers\Helper;
use Sinarajabpour1998\AlphaHelper\View\Components\CategoryCheckboxes;
use Sinarajabpour1998\AlphaHelper\View\Components\CategoryOptions;

class AlphaHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        AlphaHelper::shouldProxyTo(Helper::class);
        CategoryHelperFacade::shouldProxyTo(CategoryHelper::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        require_once(__DIR__ . '/Validations/helperValidation.php');
        $this->loadViewsFrom(__DIR__ . '/views','alpha_helper');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadViewComponentsAs('', [
            CategoryCheckboxes::class,
            CategoryOptions::class
        ]);
        $this->publishes([
            __DIR__ . '/config/alpha-helper.php' => config_path('alpha-helper.php'),
            __DIR__.'/views/' => resource_path('views/vendor/alpha-helper'),
        ], 'alpha-helper');
    }
}
