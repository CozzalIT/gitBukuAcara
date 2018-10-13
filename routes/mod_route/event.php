<?php
    //GET PAGE <--
    Route::get('/event',[
        'uses' => 'EventController@index',
        'as'  => 'eventPage'
    ]);

    Route::get('/event/filter/{event_id}/{race_number_id}/{classification_id}/{gender}',[
        'uses' => 'EventController@filterAthlete',
        'as'  => 'filterAthlete'
    ]);

    Route::get('/event/relay/{event_id}/{race_number_id}/{gender}',[
        'uses' => 'EventController@filterRelay',
        'as'  => 'filterRelay'
    ]);

    Route::get('event/result/{event_id}/{race_number_id}/{classification_id}/{gender}',[
        'uses' => 'EventController@eventResult',
        'as' => 'eventResult'
    ]);
    //GET PAGE -->

    //AJAX <--
    Route::post('/event/is_relay',[
        'uses' => 'EventController@isRelay',
        'as'  => 'isRelay'
    ]);

    Route::post('/event/filter/selectTrack',[
        'uses' => 'EventController@selectTrack',
        'as'  => 'selectTrack'
    ]);
    //AJAX -->

    //CRUD <--
    Route::post('/event/add',[
        'uses' => 'EventController@addEvent',
        'as'  => 'addEvent'
    ]);

    Route::post('/event/delete',[
        'uses' => 'EventController@deleteEvent',
        'as'  => 'deleteEvent'
    ]);

    Route::post('/event/selectAthlete',[
        'uses' => 'EventController@selectAthlete',
        'as'  => 'selectAthlete'
    ]);

    Route::post('/event/selectRelay',[
        'uses' => 'EventController@selectRelay',
        'as'  => 'selectRelay'
    ]);

    Route::post('/event/result/add',[
        'uses' => 'EventController@addResult',
        'as'  => 'addResult'
    ]);
    //CRUD -->
