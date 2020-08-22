@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <h1>Последние статьи</h1>
    @if(!count($articles))
        Список статей пуст
    @else
        <div class="row">
        @foreach($articles as $article)
            <div class="col-lg-6">
                <div class="row mb-3 mx-3">
                    <div class="pl-3">
                        <a href="{{url("/articles/{$article->id}")}}"><img src="https://via.placeholder.com/150"></a>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <a href="{{url("/articles/{$article->id}")}}" class="text-dark"><h1>{{$article->title}}</h1>
                            </a>
                        </div>
                        <div>
                            <p>{{\Illuminate\Support\Str::limit($article->text, 190)}}</p>
                        </div>
                        <a href="{{url("/articles/{$article->id}")}}">читать дальше -></a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    @endif
@endsection