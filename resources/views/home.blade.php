@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Кімнати

                </div>
                <div class="panel-body">
                    @foreach($rooms as $room)
                        <p>
                            <a href="/room/{{ $room->id }}" >{{ $room->name }}</a>
                        </p>
                    @endforeach
                    <a href="#myModal" class="btn btn-success" data-toggle="modal">
                        Створити
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading ">
                    <form action="/home" method="POST" name="homeForm">
                        <label for="message">Повідомлення:</label>
                        <textarea name="message" rows="3" class="form-control" id="generalMessage"></textarea>
                        <br>
                        <label for="file">Завантажити файл:</label>
                        <input type="file" class="">
                        <br>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <button type="button" class="btn btn-primary" id="sendToGeneral">
                            Відправити
                        </button>
                    </form>
                </div>

                <div class="panel-body general-body-messages" id="chatlogs">
                    @foreach($messages as $message)

                        <p>
                            {{ $message->user->name }}: {{ $message->message }}
                        </p>

                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Користувачі
                </div>
                <div class="panel-body">
                    @foreach($users as $user)
                       <p>{{ $user->name }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('storeRoom') }}" method="POST">
                <div class="modal-body">
                    <button class="close" data-dismiss="modal" area-label="Закрити">
                        x
                    </button>
                    <br>

                    <label for="name">
                        Назва кімнати
                    </label>
                    <input type="text" name="name" class="form-control">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <br>
                    <button type="submit" name="save"  class="btn btn-primary">Створити</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
