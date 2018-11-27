<link rel="stylesheet" href="{{ asset('css/KinoCSS.css') }}" >
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
@extends('layouts.app')

@section('content')

    <div class="my_container">
        <div class="container">
           <ul class="nav nav-pills mb-1">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('add.schedule.auto')}}">{{'Автоматическое добавление'}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('add.manually')}}">{{'Ручное добавление'}}</a>
                </li>
            </ul>
            <hr color="#ffffff" />

        </div>
    </div>
{{--Скрипты--}}
@endsection