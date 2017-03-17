<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 
Route::get('site', [
    'as' => 'site',
    'uses' => 'Sites\Controllers\Front\SampleFrontController@index'
]);*/


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

        Route::get('admin/company', [
            'as' => 'admin_company',
            'uses' => 'Companies\Controllers\Admin\CompanyController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/company/edit', [
            'as' => 'admin_company.edit',
            'uses' => 'Companies\Controllers\Admin\CompanyController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/company/edit', [
            'as' => 'admin_company.post',
            'uses' => 'Companies\Controllers\Admin\CompanyController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/company/delete', [
            'as' => 'admin_company.delete',
            'uses' => 'Companies\Controllers\Admin\CompanyController@delete'
        ]);
        
        Route::get('admin/location', [
            'as' => 'admin_location',
            'uses' => 'Companies\Controllers\Admin\LocationController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/location/edit', [
            'as' => 'admin_location.edit',
            'uses' => 'Companies\Controllers\Admin\LocationController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/location/edit', [
            'as' => 'admin_location.post',
            'uses' => 'Companies\Controllers\Admin\LocationController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/location/delete', [
            'as' => 'admin_location.delete',
            'uses' => 'Companies\Controllers\Admin\LocationController@delete'
        ]);
        
    });
});
