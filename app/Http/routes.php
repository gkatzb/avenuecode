<?php
/**
 * Created by Gabriela Katz
 */

Route::group(['middleware' => ['web']], function () {
    // Crud Module Routes
    Route::group(['prefix' => '/'], function() {
        Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@logout'));
        Route::get('login', array('as' => 'login', 'uses' => 'LoginController@index'));
        Route::get('', array('as' => 'login', 'uses' => 'LoginController@index'));
        Route::post('login', array('as' => 'login', 'uses' => 'LoginController@login'));

        //Editors
        Route::group(['prefix' => 'editor'], function() {
            Route::get('', ['as' => 'editor', 'uses' => 'EditorController@index']);
            Route::get('{editor_id}', ['as' => 'get.editor', 'uses' => 'EditorController@getEditor']);
            Route::post('', ['as' => 'post.editor', 'uses' => 'EditorController@insertEditor']);
            Route::put('', ['as' => 'update.editor', 'uses' => 'EditorController@updateEditor']);
            Route::delete('', ['as' => 'delete.editor', 'uses' => 'EditorController@deleteEditor']);
        });

        //Books
        Route::group(['prefix' => 'book'], function() {
            Route::get('', ['as' => 'book', 'uses' => 'BookController@index']);
            Route::get('{book_id}', ['as' => 'get.book', 'uses' => 'BookController@getBook']);
            Route::post('', ['as' => 'post.book', 'uses' => 'BookController@insertBook']);
            Route::put('', ['as' => 'update.book', 'uses' => 'BookController@updateBook']);
            Route::delete('', ['as' => 'delete.book', 'uses' => 'BookController@deleteBook']);
        });

    });
});
