<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('cheatsheets', 'CheatsheetController', ['except' => ['create', 'edit']]);
Route::get('cheatsheets/{cheatsheetId}/knowledgepieces/{knowledgePieceId?}', 'CheatsheetController@knowledgePieces')
    ->where(['cheatsheetId' => '[0-9]+', 'knowledgePieceId' => '[0-9]+']);

Route::resource('knowledgepieces', 'KnowledgePieceController', ['except' => ['create', 'edit']]);

