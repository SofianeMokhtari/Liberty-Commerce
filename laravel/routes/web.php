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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produit', function () {

        return redirect()->action('HomeController@index')->name('home');
});

Auth::routes();

Route::get('/delete/{id}', 'AdminController@suppdata')->name('admin');
Route::get('/catalogue', 'CatalogueController@addwebpage')->name('catalogue');
Route::get('/catalogue', 'CatalogueController@addwebpage2')->name('catalogue');


Route::get('/produit', 'ProduitController@produitweb')->name('produit');
Route::get('/update/{catalogue}/{id}', 'CatalogueController@modifdisp')->name('catalogue');
Route::get('/catalogue', 'CatalogueController@affd')->name('admin');

Route::get('/produit/{id}', 'ProduitController@productaff')->name('produit');

Route::post('/panier', 'PanierController@quantity')->name('panier');

Route::post('/produit', 'ProduitController@test')->name('produit');

Route::get('/update/{id}', 'ProduitController@modifvaleur')->name('produit');

Route::get('/isAdmin', 'AdminController@isAdmin')->name('admin');

Route::get('/update/{id}', 'AdminController@changeAdmin')->name('admin');

Route::get('/suppuser/{id}', 'AdminController@suppuser')->name('admin');

Route::get('/panier', 'PanierController@see')->name('panier');

Route::get('/panier/{id}', 'PanierController@index')->name('panier1');
Route::get('/panier2/{id}', 'PanierController@index2')->name('panier1');

Route::get('/changeuser', 'UserController@changeuser')->name('changeuser');

Route::get('/sup/{id}', 'PanierController@suppanier')->name('panier');

Route::get('/acheter/{id_produit}/{total}', 'PanierController@acheter')->name('panier');

Route::get('/catalogue/{categorie}', 'CatalogueController@categorienew')->name('catalogue');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/user', 'UserController@afficheruser')->name('user');

Route::get('/admin', 'AdminController@affdata')->name('admin');

Route::post('/admin', 'AdminController@ajout')->name('admin');

Route::get('/suppcommande/', 'CommandeController@suppcommande')->name('commande');

Route::get('/commande', 'CommandeController@index')->name('commande');
Route::get('/nocommande', 'CommandeController@index2')->name('commande1');
Route::get('/commande/{id}', 'CommandeController@index3')->name('commande');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
