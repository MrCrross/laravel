<link rel="stylesheet" href="{{ asset('css/KinoCSS.css') }}" >
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
@extends('layouts.app')

@section('content')
    @foreach($data as $post)
        <div class="my_container">
            <div class="container-fluid" >
{{--Навигация--}}
                <ul class="nav nav-pills mb-1">
                    <li class="nav-item">
                        <a class="nav-link" href="/films">{{'Фильмы'}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule">{{'Расписание'}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/films/{{$post->id}}">{{$post->Name_Film}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule/{{$post->id}}/{{$post->id_schedule}}">{{$post->Name_Hall}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule/{{$post->id}}/{{$post->id_schedule}}">{{$post->TimeS}}</a>
                    </li>
                </ul>
                <hr color="#ffffff" />
{{--Информация о фильме--}}
                <div class="float-left mt-1">
                    <a class="icon_link ">
                        <img  class= "img-thumbnail" src="{{$post->Icon}}">
                    </a>
                </div>
                <div class="mt-2">
                    <ul>
                        <li class="row">
                            <label style="color:darkred">{{'Название: '}}</label>
                            <label class="font-italic text-light">{{$post->Name_Film}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Продюсер: '}}</label>
                            <label class="font-italic text-light">{{$post->Producer}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Страна: '}}</label>
                            <label class="font-italic text-light">{{$post->Country}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Длительность: '}}</label>
                            <label class="font-italic text-light">{{$post->Duration}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Возрастное ограничение: '}}</label>
                            <label class="font-italic text-light">{{$post->Age_Limit}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Рейтинг: '}}</label>
                            <label class="font-italic text-light">{{$post->Rating}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Описание: '}}</label>
                            <label class="font-italic text-light">{{$post->Description}}</label>
                        </li>
                        <li class="row">
                        <label style="color:darkred;" >{{'День: '}}</label>
                            <a class="btn-group mb-1 pl-2 "  style="text-decoration:none;" href="/films/{{$post->id}}">
                                <button type="button" class="btn">
                                    {{$post->DateS}}
                                </button>
                            </a>
                        </li>
                        <li class="row">
                        <label style="color:darkred;" >{{'Сеансы: '}}</label>
                        @foreach($schedule as $time)
                            <a class="btn-group mb-1 pl-2 "  style="text-decoration:none;" href="/schedule/{{$post->id}}/{{$time->id_schedule}}">
                                <button type="button" class="btn">
                                    {{$time->TimeS}}
                                </button>
                            </a>
                        @endforeach
                        </li>
                    </ul>
                </div>
                <hr color="#000000" />
            </div>
{{--Зал--}}
            <div class="container_hall">
                <div class="display">{{'Экран'}}</div>
                @for( $j=1;$j<=$post->Num_Row;$j++)
                    <div class="hall" >
                        <ul class="row_hall">
                            <em class="num_left">{{$j}}</em>
                            <em class="num_right">{{$j}}</em>
                            <li id="row" class="row_column" data-col="{{$post->Num_Column}}">
                                @for( $i=1;$i<=$post->Num_Column;$i++)
                                    <div class="column" data-col="{{$i}}" data-row="{{$j}}" data-price="{{$post->Price}}" data-date="{{$post->DateS}}" data-time="{{$post->TimeS}}">
                                        {{$i}}
                                    </div>
                                @endfor
                            </li>
                        </ul>
                    </div>
                @endfor
                <button type="submit" class="btn buyBtn mt-4">Забронировать</button>
            </div>
            @endforeach
        </div>
{{--Модальное окно бронирования--}}
        <div class="modal fade" id="buy" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Бронирование билетов</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-info">
                        <form>
                            <div class="form-group">
                                <label for="emailLabel">Email address</label>
                                <input type="email" class="form-control" id="inputEmail"  placeholder="example@gmail.com">
                                <small id="emailHelp" class="form-text text-muted">Укажите почту, на которую придет чек. Его необходимо оплатить на кассе кинотеатра за час до начала сеанса.</small>
                            </div>
                            <div class="form-group">
                                <label for="colLabel">Ваши места</label>
                                <textarea rows="10" type="text" class="form-control" id="inputData" readonly></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Отправить чек</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
{{--Скрипты--}}
        {{--Выравнивание--}}
        <script src="{{asset('js/CorrectScript.js')}}"></script>
        {{--Вызов модального окна--}}
        <script src="{{asset('js/Click.js')}}"></script>
@endsection