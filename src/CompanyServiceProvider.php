<?php

namespace Companies;

use Illuminate\Support\ServiceProvider;

use URL, Route;
use Illuminate\Http\Request;


class CompanyServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {
        /**
         * Publish
         */
         $this->publishes([
            __DIR__.'/config/location_admin.php' => config_path('location_admin.php'),
        ],'config');

        $this->loadViewsFrom(__DIR__ . '/views', 'company');


        /**
         * Translations
         */
         $this->loadTranslationsFrom(__DIR__.'/lang', 'company');


        /**
         * Load view composer
         */
        $this->CompanyViewComposer($request);

         $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations')
            ], 'migrations');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/routes.php';

        /**
         * Load controllers
         */
        $this->app->make('Companies\Controllers\Admin\LocationController');

         /**
         * Load Views
         */
        $this->loadViewsFrom(__DIR__ . '/views', 'company');
    }

    /**
     *
     */
    public function CompanyViewComposer(Request $request) {

        view()->composer('company::*', function ($view) {
            global $request;
            $location_id = $request->get('id');
            $is_action = empty($location_id)?'page_add':'page_edit';

            $view->with('sidebar_items', [

                trans('company::company_admin.page_list') => [
                    'url' => URL::route('admin_company'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
                
                trans('company::company_admin.'.$is_action) => [
                    'url' => URL::route('admin_company.edit'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
                trans('company::location_admin.page_list') => [
                    'url' => URL::route('admin_location'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
               
                trans('company::location_admin.'.$is_action) => [
                    'url' => URL::route('admin_location.edit'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
            ]);
            //
        });
    }

}
