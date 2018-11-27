<link rel="stylesheet" href="{{ asset('css/KinoCSS.css') }}" >
@extends('layouts.app')

@section('content')
    <div class="my_container">
    <div class="back pl " >
        <table>
            <tr> @php $i=0 @endphp
            @foreach($films as $film)
                @if($i%4==0)
                </tr><tr>
                @endif
                @php $i++ @endphp
                    <td>
                        <div>
                            <div class="icon_link" >
                                <img class= "img-thumbnail" src="{{$film->Icon}}"><br>
                                <label class="font-italic">{{$film->Name_Film}}</label>
                            </div>
                        </div>
                    </td>
            @endforeach
            </tr>
        </table>
    </div>
    </div>
@endsection