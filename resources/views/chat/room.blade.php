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
                    <div class="">
                        <form action="{{ route('addUser') }}" method="POST">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                            <button type="submit" name="enter" class="btn btn-success">Увійти</button>
                        </form>
                    </div>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection()