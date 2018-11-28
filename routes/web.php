<?php


Auth::routes();

// Общая страница
    Route::get('/', 'HomeController@index')->name('home');
//  Маршруты пользователя
        //  Фильмы
        Route::get('/films', 'FilmsController@index')->name('films.index');
        Route::get('/films/{id}', 'FilmsController@show')->name('films.show');
        //  Расписание
        Route::get('/schedule', 'ScheduleController@index')->name('schedule.index');
//    Route::get('/schedule/{id}/{date}', 'ScheduleController@')->name('schedule.show');
        Route::get('/schedule/{id}/{id_schedule}', 'ScheduleController@show')->name('schedule.show');
//  Маршруты админа
        //  Добавить фильм
        Route::get('/filmAdd', 'AddFilmsController@create')->name('add.films.create');
        Route::post('/filmAdd', 'AddFilmsController@store');
        //  Добавить расписание программно
        Route::get('/scheduleAutoAdd', 'ScheduleAutoController@create')->name('add.schedule.auto');
        Route::post('/scheduleAutoAdd', 'ScheduleAutoController@store');
        //  Добавить расписание вручную
        Route::get('/scheduleManAdd', 'ScheduleManuallyController@create')->name('add.manually');
        Route::post('/scheduleManAdd', 'ScheduleManuallyController@store')->name('add.manually');
        //Удалить фильм с проката
        Route::post('/scheduleManDelRent', 'ScheduleManuallyController@DelRent')->name('add.manually.outRent');
        //Удалить сеанс с проката
        Route::post('/scheduleManDelS', 'ScheduleManuallyController@DelS')->name('add.manually.outS');
        //  Регистрация админа
        Route::get('/regAdmin', 'AddAdminController@create')->name('add.regAdmin');
        Route::post('/regAdmin', 'AddAdminController@store');
