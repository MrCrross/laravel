<link rel="stylesheet" href="{{ asset('css/KinoCSS.css') }}" >
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
@extends('layouts.app')

@section('content')

    <div class="my_container">
        <div class="container ">
            <img id="poster" class= "img-thumbnail float-right mt-3 mr-2" style="width: 280px;height: 370px;" src="#"  alt="Загрузите постер" title="#"/>

            <form method="post" action="{{ route('add.films.create') }}" class="ml-5 mt-2 pt-2 bg-info " enctype="multipart/form-data">
                @csrf
                <div class="form-group row mx-sm-3 ">
                    <label for="imgLabel" class="col-sm-2 mr-5 col-form-label">Постер</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control {{ $errors->has('Img') ? ' is-invalid' : '' }}" id="Img" name="Img" accept="image/png,image/jpeg" />
                    </div>
                </div>

                <div class="form-group row mx-sm-3">
                    <label for="nameLabel" class=" col-sm-2 mr-5 col-form-label ">Название фильма</label>
                    <div class="col-sm-6 ">
                        <input type="text" class="form-control {{ $errors->has('Name') ? ' is-invalid' : '' }}" name="Name"  placeholder="Название фильма"/>
                    </div>
                </div>

                <div class="form-group row mx-sm-3">
                    <label for="prodLabel" class="col-sm-2 mr-5 col-form-label">Режиссер</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control {{ $errors->has('Prod') ? ' is-invalid' : '' }}" name="Prod"  placeholder="Режиссер"/>
                    </div>
                </div>

                <div class="form-group row mx-sm-3">
                    <label for="countryLabel" class="col-sm-2 mr-5 col-form-label">Страна</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control {{ $errors->has('Country') ? ' is-invalid' : '' }}" name="Country"  placeholder="Название стран(ы)"/>
                    </div>
                </div>

                <div class="form-group row mx-sm-3">
                    <label for="genreLabel" class="col-sm-2 mr-5 col-form-label">Жанр</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control {{ $errors->has('Genre') ? ' is-invalid' : '' }}" name="Genre" id="Genre" value="" placeholder="Выберите жанры или напишите их"/>
                    </div>
                </div>

                <div class="form-group row mx-sm-3">
                    <label class="col-sm-2 mr-5 col-form-label"></label>
                    <div class="col-sm-6">
                    <select class="form-control genres">
                        <option value="">Выберите фильм</option>
                        @foreach($genres as $genre)
                            <option value="{{$genre->Name_Genre}}">{{$genre->Name_Genre}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group row mx-sm-3">
                    <label for="durLabel" class="col-sm-2 mr-5 col-form-label">Длительность</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control {{ $errors->has('Dur') ? ' is-invalid' : '' }}" name="Dur"  placeholder="Длительность в минутах"/>
                    </div>
                </div>

                <div class="form-group row mx-sm-3">
                    <label for="ageLabel" class="col-sm-2 col-form-label">Возрастное ограничение</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control {{ $errors->has('Age') ? ' is-invalid' : '' }}" name="Age"  placeholder="16"/>
                    </div>
                </div>

                <div class="form-group row mx-sm-3">
                    <label for="ratLabel" class="col-sm-2 col-form-label">Рейтинг</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control {{ $errors->has('Rat') ? ' is-invalid' : '' }}" name="Rat"  placeholder="1-10"/>
                    </div>
                </div>

                <div class="form-group row mx-sm-3">
                    <label for="descLabel" class="col-sm-2 col-form-label">Описание</label>
                    <div class="col-sm-9">
                        <textarea rows="5" class="form-control {{ $errors->has('Desc') ? ' is-invalid' : '' }}" name="Desc"  placeholder="Краткое описание фильма" ></textarea>
                    </div>
                </div>

                <div class="form-group row mx-3">
                    <div class="col-md-6 offset-md-5">
                        <button type="submit" class="btn btn-primary ml-3 mt-1 mb-3" id="sub">Добавить</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
{{--Скрипты--}}
    {{--Обработка клика на "Загрузить файл"(загрузка постера)--}}
    <script src="{{asset('js/Click.js')}}"></script>
    {{--Обработка выбора жанра--}}
    <script>
        $('.genres').change(function () {
            var strOp = "", strIn = "";
                $(".genres option:selected").each(function() {
                    if ($( this ).val() != '') {
                        strOp += $( this ).val() + ", ";
                    }
                });
            strIn = $('#Genre').val()+strOp;
            $('#Genre').val( strIn );
        })
            .change();
    </script>
@endsection