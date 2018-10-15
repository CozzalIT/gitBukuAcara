<?php
    Route::get('/athlete',[
        'uses' => 'AthleteController@index',
        'as'  => 'athletePage'
    ]);

    #Add
    Route::post('/athlete/add',[
        'uses' => 'AthleteController@addAthlete',
        'as' => 'addAthlete'
    ]);

    Route::post('/athlete/updateRaceNumber',[
        'uses' => 'AthleteController@updateRaceNumber',
        'as' => 'updateRaceNumber'
    ]);

    Route::post('/athlete/updateAthlete',[
        'uses' => 'AthleteController@updateAthlete',
        'as' => 'updateAthlete'
    ]);

    #Delete
    Route::post('/athlete/delete',[
        'uses' => 'AthleteController@deleteAthlete',
        'as' => 'deleteAthlete'
    ]);

    #Ajax
    Route::post('/athlete/single1',[
        'uses' => 'AthleteController@single1Selected'
    ]);

    Route::post('/athlete/single2',[
        'uses' => 'AthleteController@single2Selected'
    ]);

    Route::post('/athlete/relay1',[
        'uses' => 'AthleteController@relay1Selected'
    ]);

    Route::post('/athlete/ajaxEdit',[
        'uses' => 'AthleteController@ajaxEdit'
    ]);

    Route::post('/athlete/ajaxEditRace',[
        'uses' => 'AthleteController@ajaxEditRace'
    ]);
