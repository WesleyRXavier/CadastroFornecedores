<?php

//======================================================================================================================
Route::group(['namespace' => 'Home'], function () {
    //Rota de Home Externo
    Route::get('/', 'HomeController@Show')->name('Home.Principal.Show');
});

//======================================================================================================================
//Rotas de autentificação geradas automáticamente
Auth::routes();

//======================================================================================================================
Route::group(['namespace' => 'Painel'], function () {

    //Painel de Controle
    Route::get('/Painel', 'PainelController@Show')->name('Painel.Principal.Show');

    //Usuários Rota Index-----------------------------------------------------------------------------------------------

    Route::get('/Painel/Usuarios', 'Usuarios\UsuariosController@index')->name('Painel.Usuarios.index');
    Route::get('/Painel/Usuarios/create', 'Usuarios\UsuariosController@create')->name('Painel.Usuarios.create');
    Route::post('/Painel/Usuarios/store', 'Usuarios\UsuariosController@store')->name('Painel.Usuarios.store');

    //Fornecedores Rota ----------------------------------------------------------------------------------------------
    Route::get('/Painel/Fornecedores', 'Fornecedores\FonecedoresController@index')->name('Painel.Fornecedores.index');
    Route::get('/Painel/Fornecedores/create', 'Fornecedores\FonecedoresController@create')->name('Painel.Fornecedores.create');
    Route::post('/Painel/Fornecedores/store', 'Fornecedores\FonecedoresController@store')->name('Painel.Fornecedores.store');
    Route::delete('/Painel/Fornecedores/del/{id}', 'Fornecedores\FonecedoresController@destroy')->name('Painel.Fornecedores.destroy');
    Route::get('/Painel/Fornecedores/edit/{id}', 'Fornecedores\FonecedoresController@edit')->name('Painel.Fornecedores.edit');
    Route::put('/Painel/Fornecedores/update/{id}', 'Fornecedores\FonecedoresController@update')->name('Painel.Fornecedores.update');

    //Fornecedores categorias ----------------------------------------------------------------------------------------------
    Route::get('/Painel/Categorias', 'Categorias\CategoriasController@index')->name('Painel.Categorias.index');
    Route::get('/Painel/Categorias/create', 'Categorias\CategoriasController@create')->name('Painel.Categorias.create');
    Route::post('/Painel/Categorias/store', 'Categorias\CategoriasController@store')->name('Painel.Categorias.store');
    Route::delete('/Painel/Categorias/del/{id}', 'Categorias\CategoriasController@destroy')->name('Painel.Categorias.destroy');
    Route::get('/Painel/Categorias/edit/{id}', 'Categorias\CategoriasController@edit')->name('Painel.Categorias.edit');
    Route::put('/Painel/Categorias/update/{id}', 'Categorias\CategoriasController@update')->name('Painel.Categorias.update');

});
