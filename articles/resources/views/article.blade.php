@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <input type="text" class="d-none" id="article_id" value="{{$article->id}}">
    <div class="px-4">
        <div class="mb-3">
            <img class="img-fluid" src="https://via.placeholder.com/1200x250">
        </div>
        <div>
            <div class="mb-5">
                <div>
                    {{$article->text}}
                </div>
                <div class="justify-content-between py-2 row pl-3 pr-5">
                    <div>
                        Теги:
                        @foreach($article->tags as $tag)
                            <a href="/tags/{{$tag->id}}">{{$tag->tag}} </a>
                        @endforeach
                    </div>
                    <div>Создано: {{$article->created_at}}</div>
                </div>
                <div class="py-2 row pl-3 pr-5 align-items-center">
                    <div class="mr-5">
                        Просмотры: <span id="view_counter">{{$article->views()->count()}}</span>
                    </div>
                    <div>
                       Понравилось: <button class="btn btn-primary" type="submit" id="like_button">{{$article->likes()->count()}}</button>
                    </div>
                </div>
            </div>
            <div>
                <h3>Комментарии:</h3>
                @if(count($article->comments))
                    @foreach($article->comments as $comment)
                        <div class="row border-dark border mb-3 p-4 mx-2">
                            <div>
                                <h4>От: {{$comment->subject}}</h4>
                                <h4>Сообщение:</h4>
                                <p>{{$comment->text}}</p>
                            </div>
                            <div class="ml-auto">
                                {{$comment->created_at}}
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted">Будьте первым, кто прокомментирует статью</p>
                @endif
            </div>
            <div class="mb-3">
                <h3>Ваш комментарий:</h3>
                <form action="" id="commentForm">
                    <div class="form-group">
                        <label for="subject">От кого</label>
                        <input type="text" class="form-control" id="subject" required>
                        <small id="subjectError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group" required>
                        <label for="text">Текст комментария</label>
                        <textarea class="form-control" id="text" rows="3"></textarea>
                        <small id="textError" class="form-text text-danger"></small>
                    </div>
                    <div>
                        <span id="commentError"></span>
                    </div>
                    <div>
                        <button type="button" class="btn btn-success" id="comment_send_button">Отправить!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/article.js') }}"></script>
@endpush