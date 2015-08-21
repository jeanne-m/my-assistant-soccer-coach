<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Home page
Route::get(
    '/', function () {
        return Redirect::route('home');
    }
);
Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('home/{ageGroup}/{focus}/{principle}', ['as' => 'home.plan', 'uses' => 'HomeController@plan']);
Route::get('home/{ageGroup}/{focus}/', ['as' => 'home.principle', 'uses' => 'HomeController@principle']);
Route::get('home/{ageGroup}', ['as' => 'home.focus', 'uses' => 'HomeController@focus']);


// About page
Route::get(
    'about', array('as' => 'about', function () {
        return view('about');
    })
);


// Contact page
Route::get(
    'contact', array('as' => 'contact', function () {
        return view('contact');
    })
);


// Authentication
Route::controller(
    'auth', 'Auth\AuthController', [
        'getLogin' => 'auth.login',
        'getLogout' => 'auth.logout',
        'getRegister' => 'auth.register'
    ]
);
Route::controller(
    'password', 'Auth\PasswordController', [
        'getEmail' => 'password.email',
    ]
);






// // About page
// Route::get(
//     'about', array('as' => 'about', function () {
//         return view('about');
//     })
// );

// // Contact page
// Route::get(
//     'contact', array('as' => 'contact', function () {
//         return view('contact');
//     })
// );

// // Profile page
// Route::get(
//     'profile', [
//         'as' => 'profile.show',
//         'uses' => 'UserController@show'
//     ]
// );
// Route::get(
//     'profile/edit', [
//         'as' => 'profile.edit',
//         'uses' => 'UserController@edit'
//     ]
// );
// Route::post(
//     'profile/update', [
//         'as' => 'profile.update',
//         'uses' => 'UserController@update'
//     ]
// );
// Route::get(
//     'profile/delete', [
//         'as' => 'profile.delete',
//         'uses' => 'UserController@destroy'
//     ]
// );


// // Administration
// Route::resource('admin/age-group', 'AgeGroupController', ['only' => ['index', 'create', 'edit']]);
// Route::post('admin/age-group/store', ['as' => 'admin.age-group.store', 'uses' => 'AgeGroupController@store']);
// Route::post('admin/age-group/{age_group}/update', ['as' => 'admin.age-group.update', 'uses' => 'AgeGroupController@update']);
// Route::get('admin/age-group/{age_group}/destroy', ['as' => 'admin.age-group.destroy', 'uses' => 'AgeGroupController@destroy']);
// Route::resource('admin/focus', 'FocusController', ['only' => ['index', 'create', 'edit']]);
// Route::post('admin/focus/store', ['as' => 'admin.focus.store', 'uses' => 'FocusController@store']);
// Route::post('admin/focus/{focus}/update', ['as' => 'admin.focus.update', 'uses' => 'FocusController@update']);
// Route::get('admin/focus/{focus}/destroy', ['as' => 'admin.focus.destroy', 'uses' => 'FocusController@destroy']);
// Route::resource('admin/principle', 'PrincipleController', ['only' => ['index', 'create', 'edit']]);
// Route::post('admin/principle/store', ['as' => 'admin.principle.store', 'uses' => 'PrincipleController@store']);
// Route::post('admin/principle/{principle}/update', ['as' => 'admin.principle.update', 'uses' => 'PrincipleController@update']);
// Route::get('admin/principle/{principle}/destroy', ['as' => 'admin.principle.destroy', 'uses' => 'PrincipleController@destroy']);
// Route::resource('admin/stage', 'StageController', ['only' => ['index', 'create', 'edit']]);
// Route::post('admin/stage/store', ['as' => 'admin.stage.store', 'uses' => 'StageController@store']);
// Route::post('admin/stage/{stage}/update', ['as' => 'admin.stage.update', 'uses' => 'StageController@update']);
// Route::get('admin/stage/{stage}/destroy', ['as' => 'admin.stage.destroy', 'uses' => 'StageController@destroy']);
// Route::resource('admin/drill', 'DrillController', ['only' => ['index', 'create', 'edit']]);
// Route::post('admin/drill/store', ['as' => 'admin.drill.store', 'uses' => 'DrillController@store']);
// Route::post('admin/drill/{drill}/update', ['as' => 'admin.drill.update', 'uses' => 'DrillController@update']);
// Route::get('admin/drill/{drill}/destroy', ['as' => 'admin.drill.destroy', 'uses' => 'DrillController@destroy']);
// Route::resource('admin/user', 'UserController', ['only' => ['index']]);
// Route::get('admin/user/{user}/destroy', ['as' => 'admin.user.destroy', 'uses' => 'UserController@destroy']);
// Route::get('admin/user/{user}/grant', ['as' => 'admin.user.grant', 'uses' => 'UserController@grant']);
// Route::get('admin/user/{user}/revoke', ['as' => 'admin.user.revoke', 'uses' => 'UserController@revoke']);
