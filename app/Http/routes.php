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

Route::get('/', function () {
    return redirect()->route('login.index');
});

Route::group(['prefix' => 'logar', 'as' => 'login.'], function () {

    Route::get('/', ['as' => 'index', 'uses' => 'LoginController@index']);
    Route::get('/criar', ['as' => 'register', 'uses' => 'LoginController@register']);
    Route::get('/deslogar', ['as' => 'logout', 'uses' => 'LoginController@logout']);
    Route::get('/reset', ['as' => 'reset', 'uses' => 'LoginController@reset']);
    Route::get('/resetPassword/{id}', ['as' => 'resetPassword', 'uses' => 'LoginController@resetPassword']);

    Route::post('/logar', ['as' => 'auth', 'uses' => 'LoginController@auth']);
    Route::post('/criar', ['as' => 'create', 'uses' => 'LoginController@create']);
    Route::post('/novaSenha', ['as' => 'newPassword', 'uses' => 'LoginController@newPassword']);
    Route::post('/newPasswordReset/{id}', ['as' => 'newPasswordReset', 'uses' => 'LoginController@newPasswordReset']);
});

Route::group(['prefix' => 'app', 'as' => 'app.', 'namespace' => 'App', 'middleware' => 'check'], function () {


    Route::get('/', ['as' => 'index', 'uses' => 'DashboardController@index']);

    Route::group(['prefix' => 'demandas', 'as' => 'demand.'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'DemandController@index']);
        Route::get('/criar', ['as' => 'create', 'uses' => 'DemandController@create']);
        Route::post('/responder', ['as' => 'responder', 'uses' => 'DemandController@responder']);
        Route::post('/pergunta', ['as' => 'ask', 'uses' => 'DemandController@askSalve']);
        Route::get('/encaminhar/{id}', ['as' => 'encaminhar', 'uses' => 'DemandController@encaminharMe']);
        Route::post('/salvar', ['as' => 'store', 'uses' => 'DemandController@store']);
        Route::post('/salve-me', ['as' => 'storeMe', 'uses' => 'DemandController@storeMe']);
        Route::get('/editar/{id}', ['as' => 'edit', 'uses' => 'DemandController@edit']);
        Route::get('/mostrar/{id}', ['as' => 'show', 'uses' => 'DemandController@show']);
        Route::get('/excluir/{id}', ['as' => 'destroy', 'uses' => 'DemandController@destroy']);
        Route::post('/atualizar/{id}', ['as' => 'update', 'uses' => 'DemandController@update']);
        Route::get('/declinar/{id}', ['as' => 'declinar', 'uses' => 'DemandController@declinar']);
    });

       /* Route::post('/store', ['as' => 'store', 'uses' => 'DemandController@store']);

        //Mudar verbo
        Route::post('/storeMe', ['as' => 'storeMe', 'uses' => 'DemandController@storeMe']);

        Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'DemandController@edit']);

        Route::get('/show/{id}', ['as' => 'show', 'uses' => 'DemandController@show']);

        Route::post('/update', ['as' => 'update', 'uses' => 'DemandController@update']);



    });*/

    Route::group(['prefix' => 'eventos', 'as' => 'eventos.'], function () {
//	    Inicio rotas crud eventos
        Route::get('/', ['as' => 'index', 'uses' => 'EventosController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'EventosController@create']);
        Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'EventosController@edit']);
        Route::get('/show/{id}', ['as' => 'show', 'uses' => 'EventosController@show']);
        Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'EventosController@delete']);
        Route::get('/preparativoEmail', ['as' => 'preparativoEmail', 'uses' => 'EventosController@preparativoEmail']);

        Route::post('/update', ['as' => 'update', 'uses' => 'EventosController@update']);
        Route::post('/store', ['as' => 'store', 'uses' => 'EventosController@store']);
        Route::post('/enviarEmail', ['as' => 'enviarEmail', 'uses' => 'EventosController@enviarEmail']);
//      Fim rotas crud eventos

//      Inicio rotas eventos pendentes
        Route::get('/pendentes', ['as' => 'pendentes', 'uses' => 'EventosController@pendentes']);
        Route::post('/aprovar', ['as' => 'aprovar', 'uses' => 'EventosController@aprovar']);
        Route::post('/rejeitar', ['as' => 'rejeitar', 'uses' => 'EventosController@rejeitar']);
//      Fim rotas eventos pendentes
    });

    Route::group(['prefix' => 'oportunidades', 'as' => 'oportunidades.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'OportunidadesController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'OportunidadesController@create']);
        Route::post('/store', ['as' => 'store', 'uses' => 'OportunidadesController@store']);

        Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'OportunidadesController@edit']);
        Route::get('/show/{id}', ['as' => 'show', 'uses' => 'OportunidadesController@show']);
        Route::post('/update', ['as' => 'update', 'uses' => 'OportunidadesController@update']);
        Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'OportunidadesController@delete']);
    });


    Route::group(['prefix' => 'mentores', 'as' => 'mentor.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'MentorController@index']);
        Route::get('/criar', ['as' => 'create', 'uses' => 'MentorController@create']);
        Route::post('/salvar', ['as' => 'store', 'uses' => 'MentorController@store']);
        Route::get('/mostrar/{id}', ['as' => 'show', 'uses' => 'MentorController@show']);
        Route::get('/conhecimento/{id}', ['as' => 'area', 'uses' => 'MentorController@area']);
        Route::post('/conhecimento/salvar', ['as' => 'area.store', 'uses' => 'MentorController@areaStore']);
        Route::get('/editar/{id}', ['as' => 'edit', 'uses' => 'MentorController@edit']);
        Route::post('/atualizar/{id}', ['as' => 'update', 'uses' => 'MentorController@update']);
        Route::get('/deletar/{id}', ['as' => 'delete', 'uses' => 'MentorController@delete']);
    });


    Route::group(['prefix' => 'perfil', 'as' => 'perfil.'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'PerfilController@index']);
        Route::post('/atualizarDados', ['as' => 'atualizarDados', 'uses' => 'PerfilController@atualizarDados']);
        Route::post('/atualizarSenha', ['as' => 'atualizarSenha', 'uses' => 'PerfilController@atualizarSenha']);

    });

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'DashboardController@index']);
    });

    Route::group(['prefix' => 'alunos', 'as' => 'alunos.'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'AlunosController@index']);
        Route::get('/show/{id}', ['as' => 'show', 'uses' => 'AlunosController@show']);

    });

});



