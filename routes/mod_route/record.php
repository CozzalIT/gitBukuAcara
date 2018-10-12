<?php
    Route::get('/record',[
        'uses' => 'RecordController@index',
        'as'  => 'recordPage'
    ]);

    Route::post('/record/add',[
        'uses' => 'RecordController@addRecord',
        'as'  => 'addRecord'
    ]);

    Route::post('/record/delete',[
        'uses' => 'RecordController@deleteRecord',
        'as'  => 'deleteRecord'
    ]);
