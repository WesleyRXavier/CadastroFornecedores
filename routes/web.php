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

    //Fornecedores Rota Index-----------------------------------------------------------------------------------------------
    Route::get('/Painel/fornecedores', 'Fornecedores\FonecedoresController@index')->name('Painel.Fornecedores.index');
    Route::get('/Painel/fornecedores/create', 'Fornecedores\FonecedoresController@create')->name('Painel.Fornecedores.create');
    Route::post('/Painel/fornecedores/store', 'Fornecedores\FonecedoresController@store')->name('Painel.Fornecedores.store');

});
