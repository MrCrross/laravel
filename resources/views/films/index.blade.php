<link rel="stylesheet" href="{{ asset('css/KinoCSS.css') }}" >
@extends('layouts.app')

@section('content')
    <ul class="nav nav-pills mb-1">
        <li class="nav-item">
            <a class="nav-link" href="/films">{{'Фильмы'}}</a>
        </li>
    </ul>
    <hr color="#ffffff" />
<div class="my_container">
    @foreach($films as $film)
    <div class="container-fluid" >
        <div class="float-left mt-1">
                        <a class="icon_link " href="{{ route('films.show',$film->id) }}}">
                            <img  class= "img-thumbnail" src="{{$film->Icon}}">
                        </a>
        </div>

        <div class="mt-2">
                    <ul>
                        <li class="row">
                            <label style="color:darkred">{{'Название: '}}</label>
                            <label class="font-italic">{{$film->Name_Film}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Продюсер: '}}</label>
                            <label class="font-italic" >{{$film->Producer}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Страна: '}}</label>
                            <label class="font-italic">{{$film->Country}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Длительность: '}}</label>
                            <label class="font-italic">{{$film->Duration}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Возрастное ограничение: '}}</label>
                            <label class="font-italic">{{$film->Age_Limit}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Рейтинг: '}}</label>
                            <label class="font-italic">{{$film->Rating}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Описание: '}}</label>
                            <label class="font-italic">{{$film->Description}}</label>
                        </li>
                    </ul>
        </div>
    </div>
        <hr color="#124656" />
    @endforeach
</div>
@endsection