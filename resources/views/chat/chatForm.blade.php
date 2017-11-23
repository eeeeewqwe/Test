@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Користувачі
                    </div>
                    <div class="panel-body">
                        @foreach($room->users as $user)
                            <p>{{ $user->name }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>{{ $room->name }}</h3>

                    </div>
                    <div class="panel-body">
                        <form action="{{ route('storeChatRoom') }}" method="POST">
                            <label for="message">Повідомлення:</label>
                            <textarea name="message" rows="3" class="form-control" id="roomMessage"></textarea>
                            <br>
                            <label for="file">Завантажити файл:</label>
                            <input type="file" class="">
                            <br>
                            <input type="hidden" name="_token"  id="token" value="{{ csrf_token() }}">
                            <input type="hidden" name="room_id" id="room_id" value="{{ $room->id }}">
                            <button type="button" class="btn btn-primary" id="sendToRoom">Відправити</button>
                        </form>
                        <hr>
                        <div class="room-body-messages">
                            @foreach($messages as $message)
                                <p>{{ $message->user->name }}: {{ $message->message }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()