<link rel="stylesheet" href="{{ asset('css/KinoCSS.css') }}" >
@extends('layouts.app')

@section('content')
    <ul class="nav nav-pills mb-1">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('schedule.index') }}">{{'Расписание'}}</a>
        </li>
    </ul>
    <hr color="#ffffff" />
    <div class="my_container">
        @foreach($films as $data)
        <div class="container-fluid" >
            <div class="float-left mt-1">
                <a class="icon_link " href="/films/{{$data->id}}">
                    <img  class= "img-thumbnail" src="{{$data->Icon}}">
                </a>
            </div>
            <div class="mt-2">
                <ul>
                    <li class="row">
                        <label >{{'Название:'}} </label>
                        <label class="font-italic text-light">{{$data->Name_Film}}</label>
                    </li>
                    <li class="row">
                        <label >{{'Продюсер:'}} </label>
                        <label class="font-italic text-light" >{{$data->Producer}}</label>
                    </li>
                    <li class="row">
                        <label >{{'Страна: '}} </label>
                        <label class="font-italic text-light">{{$data->Country}}</label>
                    </li>
                    <li class="row">
                        <label >{{'Жанр: '}} </label>
                        <label class="font-italic text-light">{{$data->Genres}}</label>
                    </li>
                    <li class="row">
                        <label >{{'Длительность: '}} </label>
                        <label class="font-italic text-light">{{$data->Duration}}</label>
                    </li>
                    <li class="row">
                        <label >{{'Возрастное ограничение: '}} </label>
                        <label class="font-italic text-light">{{$data->Age_Limit}}</label>
                    </li>
                    <li class="row">
                        <label >{{'Рейтинг: '}} </label>
                        <label class="font-italic text-light">{{$data->Rating}}</label>
                    </li>
                    <li class="row">
                        <label >{{'Описание: '}} </label>
                        <label class="font-italic text-light">{{$data->Description}}</label>
                    </li>
                    <li class="row">
                    <label >{{'Сеансы: '}}</label>
                    @foreach($schedule as $post)
                        @if($data->id == $post->ID_Film)
                            <a class="btn-group mb-1 pl-2 "  style="text-decoration:none;" href="/schedule/{{$data->id}}/{{$post->id_schedule}}">
                                <button type="button" class="btn">
                                    {{$post->TimeS}}
                                </button>
                            </a>
                        @endif
                    @endforeach
                    </li>
                </ul>
            </div>
            <hr color="#000000" />
        </div>

        @endforeach
    </div>
@endsection