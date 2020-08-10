<?php

// Route::get('/', function () {
//     return redirect(config('adlara.admin_route') . '/app/login');
// });

Route::get('app', function () {
    return redirect(config('adlara.admin_route') . '/app/dashboard');
});

Route::get('/app/{url?}/{url2?}/{url3?}/{url4?}/{url5?}', function () {
    return view('dashboard');
});

Route::post('api/empresario/register', 'AdminUserController@initProcessRegister');
Route::post('api/empresario/login', 'AdminUserController@initProcessLogin');
Route::get('api/empresario/logout', 'AdminUserController@initProcessLogout');

Route::get('api/empresario/check/login', 'AdminUserController@initProcessCheckLogin');

Route::group(['prefix' => 'api', 'middleware' => 'admin_user'], function () {

    // Categorías de post
    Route::get('post/category/add', 'PostCategoryController@initContentCreate')->name('post_category.add');
    Route::post('post/category/add', 'PostCategoryController@initProcessCreate');
    Route::get('post/category/edit/{id}', 'PostCategoryController@initContentCreate')->name('post_category.edit');
    Route::post('post/category/edit/{id}', 'PostCategoryController@initProcessCreate');
    Route::get('post/category', 'PostCategoryController@initListing')->name('post_category.list');
    Route::get('post/category/delete/{id}', 'PostCategoryController@initProcessDelete')->name('post_category.delete');

    // Post
    Route::get('post/add', 'PostController@initContentCreate')->name('post.add');
    Route::post('post/add', 'PostController@initProcessCreate');
    Route::get('post/edit/{id}', 'PostController@initContentCreate')->name('post.edit');
    Route::post('post/edit/{id}', 'PostController@initProcessCreate');
    Route::get('post', 'PostController@initListing')->name('post.list');
    Route::get('post/delete/{id}', 'PostController@initProcessDelete')->name('post.delete');

    // Categorías de productos
    Route::get('product/category/add', 'ProductCategoryController@initContentCreate')->name('product_category.add');
    Route::post('product/category/add', 'ProductCategoryController@initProcessCreate');
    Route::get('product/category/edit/{id}', 'ProductCategoryController@initContentCreate')->name('product_category.edit');
    Route::post('product/category/edit/{id}', 'ProductCategoryController@initProcessCreate');
    Route::get('product/category', 'ProductCategoryController@initListing')->name('product_category.list');
    Route::get('product/category/delete/{id}', 'ProductCategoryController@initProcessDelete')->name('product_category.delete');

    // Productos
    Route::get('product/add', 'ProductController@initContentCreate')->name('product.add');
    Route::post('product/add', 'ProductController@initProcessCreate');
    Route::get('product/edit/{id}', 'ProductController@initContentCreate')->name('product.edit');
    Route::post('product/edit/{id}', 'ProductController@initProcessCreate');
    Route::get('product', 'ProductController@initListing')->name('product.list');
    Route::get('product/delete/{id}', 'ProductController@initProcessDelete')->name('product.delete');

    // Páginas
    Route::get('page/add', 'PageController@initContentCreate')->name('page.add');
    Route::post('page/add', 'PageController@initProcessCreate');
    Route::get('page/edit/{id}', 'PageController@initContentCreate')->name('page.edit');
    Route::post('page/edit/{id}', 'PageController@initProcessCreate');
    Route::get('page', 'PageController@initListing')->name('page.list');
    Route::get('page/delete/{id}', 'PageController@initProcessDelete')->name('page.delete');

    // Empresas
    Route::get('empresa/add', 'EmpresaController@initContentCreate')->name('empresa.add');
    Route::post('empresa/add', 'EmpresaController@initProcessCreate');
    Route::get('empresa/edit/{id}', 'EmpresaController@initContentCreate')->name('empresa.edit');
    Route::post('empresa/edit/{id}', 'EmpresaController@initProcessCreate');
    Route::get('empresa', 'EmpresaController@initListing')->name('empresa.list');

    Route::post('change/status', 'PageController@initProcessChangeStatus');
    Route::post('{component}/delete/{id}', 'PageController@initProcessDelete');

    Route::get('media', 'MediaController@initProcessListing');
    Route::post('media/upload', 'MediaController@initProcessUpload');

    Route::get('logout', function () {
        
        \Auth::guard('admin_user')->logout();

        return redirect('/' . config('adlara.admin_route') . '/app/login');

    });
});