<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');
Route::get('/category/{slug}', 'CategoryController@index')->name('category.single');
Route::get('/store/{slug}', 'StoreController@index')->name('store.single');

Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', 'CartController@index')->name('index');
    Route::post('add', 'CartController@add')->name('add');
    Route::get('remove/{slug}', 'CartController@remove')->name('remove');
    Route::get('cancel', 'CartController@cancel')->name('cancel');
});

Route::prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', 'CheckoutController@index')->name('index');
    Route::get('/thanks', 'CheckoutController@thanks')->name('thanks');
    Route::post('/proccess', 'CheckoutController@proccess')->name('proccess');
});


Route::group(['middleware' => ['auth']], function(){
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
        // Route::prefix('stores')->name('stores.')->group(function(){
        //     Route::get('/', 'StoreController@index')->name('index');
        //     Route::get('/create', 'StoreController@create')->name('create');
        //     Route::post('/store', 'StoreController@store')->name('store');
        //     Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
        //     Route::post('/update/{store}', 'StoreController@update')->name('update');
        //     Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
        // });

        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');

        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
    });
});


Auth::routes();

Route::get('/model', function() {
    //$products = \App\Product::all();

    //$products = \App\Product::find(3); //Buscar um único produto
    //return $products;
    //******************************** */

    //**********************Salvar Usuário */
    // $user = new \App\User();

    // $user->name = 'Usuário teste';
    // $user->email = 'email@teste.com';
    // $user->password = bcrypt('12345678');

    // return $user->save();
    //**********************Salvar Usuário */

    //return \App\User::where('name', 'Jude Kuphal')->get();

    //return \App\User::where('name', 'Jude Kuphal')->first(); //Trazer o primeiro registro

    //return \App\User::paginate(10); //Paginação do Laravel

    // $user = \App\User::create([
    //     'name' => 'Manoel Alves de Souza Neto',
    //     'email' => 'netto06@gmail.com',
    //     'password' => bcrypt('12345678')
    // ]);

    // dd($user);

    //********************************* */
    // $user = \App\User::find(83);

    // $user->update([
    //     'name' => 'Manoel Alves de Souza Neto Editado',
    //     'email' => 'netto062@gmail.com',
    //     'password' => bcrypt('123456789')
    // ]);

    // dd($user);

    // return \App\User::all();
    //********************************* */

    $user = \App\User::find(4);

    return $user->store;
});

//Route::get('/home', 'HomeController@index')->name('home');
