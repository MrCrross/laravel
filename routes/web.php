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
        Route::get('/filmAdd', 'AddFilmsController@index')->name('add.films.create');
        Route::post('/filmAdd', 'AddFilmsController@store');
        //  Добавить расписание вручную
        Route::get('/scheduleAdd', 'AddScheduleController@index')->name('add.schedule');
        Route::post('/scheduleAdd', 'AddScheduleController@store')->name('add.schedule');
        //Удалить фильм с проката
        Route::post('/scheduleDelRent', 'AddScheduleController@DelRent')->name('add.schedule.outRent');
        //Удалить сеанс с проката
        Route::post('/scheduleDelS', 'AddScheduleController@DelS')->name('add.schedule.outS');
        // Регистрация админа
        Route::get('/regAdmin', 'AddAdminController@create')->name('add.regAdmin');
        Route::post('/regAdmin', 'AddAdminController@store');

        Route::post('/mail','MailController@mail')->name('tickets');