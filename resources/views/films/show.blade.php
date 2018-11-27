<link rel="stylesheet" href="{{ asset('css/KinoCSS.css') }}" >
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
@extends('layouts.app')

@section('content')
    <ul class="nav nav-pills mb-1">
        <li class="nav-item">
            <a class="nav-link" href="/films">{{'Фильмы'}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/films/{{$data->id}}">{{$data->Name_Film}}</a>
        </li>
    </ul>
    <hr color="#000000" />
    <div class="my_container">
        <div class="container-fluid" >
                <div class="float-left mt-1">
                    <a class="icon_link ">
                        <img  class= "img-thumbnail" src="{{$data->Icon}}">
                    </a>
                </div>
                <div class="mt-2">
                    <ul>
                        <li class="row">
                            <label style="color:darkred">{{'Название: '}}</label>
                            <label class="font-italic">{{$data->Name_Film}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Продюсер: '}}</label>
                            <label class="font-italic">{{$data->Producer}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Страна: '}}</label>
                            <label class="font-italic">{{$data->Country}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Длительность: '}}</label>
                            <label class="font-italic">{{$data->Duration}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Возрастное ограничение: '}}</label>
                            <label class="font-italic">{{$data->Age_Limit}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Рейтинг: '}}</label>
                            <label class="font-italic">{{$data->Rating}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Описание: '}}</label>
                            <label class="font-italic">{{$data->Description}}</label>
                        </li>
                        <label style="color:darkred;" >{{'Сеансы: '}}</label>
                        @foreach($schedule as $post)
                            <a class="btn-group mb-1 pl-2 "  style="text-decoration:none;" href="/schedule/{{$data->id}}/{{$post->id_schedule}}">
                                <button type="button" class="btn">
                                    {{$post->TimeS}}
                                </button>
                            </a>
                        @endforeach
                    </ul>
                </div>
            <hr color="#000000" />
        </div>
    </div>
@endsection