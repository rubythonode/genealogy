<?php

Route::namespace('Auth')
    ->group(function () {
        Route::post('login', 'LoginController@login')
            ->name('login');
        Route::post('logout', 'LoginController@logout')
            ->name('logout');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')
            ->name('password.email');
        Route::post('password/reset', 'ResetPasswordController@reset')
            ->name('password.reset');
    });

Route::middleware(['auth'])
    ->prefix('dashboard')->as('dashboard.')
    ->group(function () {
        Route::get('line', 'ChartController@line')
            ->name('line');
        Route::get('bar', 'ChartController@bar')
            ->name('bar');
        Route::get('pie', 'ChartController@pie')
            ->name('pie');
        Route::get('doughnut', 'ChartController@doughnut')
            ->name('doughnut');
        Route::get('radar', 'ChartController@radar')
            ->name('radar');
        Route::get('polar', 'ChartController@polar')
            ->name('polar');
        Route::get('bubble', 'ChartController@bubble')
            ->name('bubble');
    });

Route::middleware(['auth', 'core'])
    ->group(function () {
        Route::namespace('Administration')
            ->prefix('administration')->as('administration.')
            ->group(function () {
                Route::namespace('Owner')
                    ->prefix('owners')->as('owners.')
                    ->group(function () {
                        Route::get('initTable', 'OwnerTableController@init')
                            ->name('initTable');
                        Route::get('getTableData', 'OwnerTableController@data')
                            ->name('getTableData');
                        Route::get('exportExcel', 'OwnerTableController@excel')
                            ->name('exportExcel');

                        Route::get('selectOptions', 'OwnerSelectController@options')
                            ->name('selectOptions');
                    });

                Route::resource('owners', 'Owner\OwnerController', ['except' => ['show']]);

                Route::namespace('User')
                    ->prefix('users')->as('users.')
                    ->group(function () {
                        Route::get('initTable', 'UserTableController@init')
                            ->name('initTable');
                        Route::get('getTableData', 'UserTableController@data')
                            ->name('getTableData');
                        Route::get('exportExcel', 'UserTableController@excel')
                            ->name('exportExcel');
                        Route::get('selectOptions', 'UserSelectController@options')
                            ->name('selectOptions');
                    });

                Route::resource('users', 'User\UserController');
            });
    });

Route::middleware(['auth'])
    ->group(function () {
        Route::namespace('Event')
            ->prefix('events')->as('events.')
            ->group(function () {
                Route::get('initTable', 'EventTableController@init')
                    ->name('initTable');
                Route::get('getTableData', 'EventTableController@data')
                    ->name('getTableData');
                Route::get('exportExcel', 'EventTableController@excel')
                    ->name('exportExcel');
                Route::get('selectOptions', 'EventSelectController@options')
                    ->name('selectOptions');
            });

        Route::resource('events', 'Event\EventController');

        Route::namespace('Individual')
            ->prefix('individuals')->as('individuals.')
            ->group(function () {
                Route::get('initTable', 'IndividualTableController@init')
                    ->name('initTable');
                Route::get('getTableData', 'IndividualTableController@data')
                    ->name('getTableData');
                Route::get('exportExcel', 'IndividualTableController@excel')
                    ->name('exportExcel');
                Route::get('selectOptions', 'IndividualSelectController@options')
                    ->name('selectOptions');
            });

        Route::resource('individuals', 'Individual\IndividualController');

        Route::namespace('Family')
            ->prefix('families')->as('families.')
            ->group(function () {
                Route::get('initTable', 'FamilyTableController@init')
                    ->name('initTable');
                Route::get('getTableData', 'FamilyTableController@data')
                    ->name('getTableData');
                Route::get('exportExcel', 'FamilyTableController@excel')
                    ->name('exportExcel');
                Route::get('selectOptions', 'FamilySelectController@options')
                    ->name('selectOptions');
            });

        Route::resource('families', 'Family\FamilyController');
        Route::resource('trees', 'Tree\TreeController');
    });
