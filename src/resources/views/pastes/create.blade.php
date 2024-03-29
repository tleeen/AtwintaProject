@extends('layouts.app')

@section('nav')
    @guest
        <a class="nav-link" href="{{ route('pastes.index') }}">Все Пасты</a>
        <a class="nav-link active" href="#">Создать Пасту</a>
    @else
        <a class="nav-link" href="{{ route('pastes.index') }}">Все Пасты</a>
        <a class="nav-link" href="{{ route('users.pastes', auth()->user()->id) }}">Мои Пасты</a>
        <a class="nav-link active" href="#">Создать Пасту</a>
    @endguest
@endsection

@section('content')
        <div class="d-flex justify-content-around align-items-center">
            <div class="col-md-5">
                <div class="d-flex flex-column h-100 justify-content-center">
                    <form class="border p-2 w-70" action="{{route('pastes.store')}}" method="post">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="title">Заголовок</label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="Введите заголовок">
                        </div>
                        <div class="form-group mb-4">
                            <label for="code">Текст:</label>
                            <textarea name="body" class="form-control" id="code" rows="10" style="font-family: monospace;"></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="time">Время:</label>
                                <select class="form-control" id="time" name="expirationTimeId">
                                    @foreach($expirationTimes as $index => $expirationTime)
                                        @if($index === 0)
                                            <option value="{{$expirationTime->id}}" style="text-align: center;" selected>{{$expirationTime->title}}</option>
                                        @else
                                            <option value="{{$expirationTime->id}}" style="text-align: center;">{{$expirationTime->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="type">Тип:</label>
                                <select class="form-control" id="type" name="typeId">
                                    @foreach($types as $index => $type)
                                        @if($index === 0)
                                            <option value="{{$type->id}}" style="text-align: center;" selected>{{$type->title}}</option>
                                        @else
                                            <option value="{{$type->id}}" style="text-align: center;">{{$type->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="restriction">Ограничение:</label>
                                <select class="form-control" id="restriction" name="accessModifierId">
                                    @foreach($accessModifiers as $index => $accessModifier)
                                        @if($index === 0)
                                            <option value="{{$accessModifier->id}}" style="text-align: center;" selected>{{$accessModifier->title}}</option>
                                        @else
                                            <option value="{{$accessModifier->id}}" style="text-align: center;">{{$accessModifier->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="container mb-2">
                    <h5 class="mb-2">Пасты</h5>
                    @guest
                        <div class="border p-2 overflow-auto dark-border" style="height: 65vh;">
                    @else
                        <div class="border p-2 overflow-auto dark-border" style="height: 35vh;">
                    @endguest
                            @foreach($lastPastes as $lastPaste)
                        <a href="{{ route('pastes.show', $lastPaste->hash_id) }}" class="list-group-item list-group-item-action border mb-1">
                            <h6 class="mb-0">{{$lastPaste->title}}</h6>
                            <p class="mb-0 small">Автор: {{(!$lastPaste->author) ? 'undefined' : $lastPaste->author->email}}, Дата публикации: {{$lastPaste->created_at->format('d-m-Y H:i')}}</p>
                        </a>
                            @endforeach
                    </div>
                </div>
                @guest
                @else
                    <div class="container">
                        <h5 class="mb-2">Мои пасты</h5>
                        <div class="border p-2 overflow-auto dark-border" style="height: 35vh;">
                            @foreach($lastPastesUser as $lastPasteUser)
                                <a href="{{ route('pastes.show', $lastPasteUser->hash_id) }}" class="list-group-item list-group-item-action border mb-1">
                                    <h6 class="mb-0">{{$lastPasteUser->title}}</h6>
                                    <p class="mb-0 small">Автор: {{(!$lastPasteUser->author) ? 'undefined' : $lastPasteUser->author->email}}, Дата публикации: {{$lastPasteUser->created_at->format('d-m-Y H:i')}}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endguest
            </div>
@endsection

