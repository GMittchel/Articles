@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    @if(!count($articles))
        Список статей пуст
    @else
        @foreach($articles as $article)
            <div>
                <div class="row mb-3 mx-3">
                    <div class="pl-3">
                        <a href="{{url("/articles/{$article->id}")}}"><img src="https://via.placeholder.com/150"></a>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <a href="{{url("/articles/{$article->id}")}}" class="text-dark"><h1>{{$article->title}}</h1></a>
                        </div>
                        <div>
                            <p>{{\Illuminate\Support\Str::limit($article->text, 190)}}</p>
                        </div>
                        <a href="{{url("/articles/{$article->id}")}}">читать дальше -></a>
                    </div>
                </div>
            </div>
        @endforeach
        {{$articles->links()}}
    @endif
@endsection