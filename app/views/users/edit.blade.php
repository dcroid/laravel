@extends('GeneralTemplate.body')

@section('content')

    @if(isset($user))

        <h3>Пользователь: {{ $user['email'] }}</h3>
        {{ Form::open(['method'=> 'post', 'url'=> '/user/edit']) }}

        {{ Form::hidden('id', $user['id']) }}

        {{ Form::label('name', 'Email') }}
        {{ Form::text('email', $user['email']) }}

        <br>
        {{ Form::label('password', 'Password') }}
        {{ Form::text('password', '') }}
        <br>
        {{ Form::submit('Обновить', ['class'=>'btn btn-success']) }}
        {{ Form::close() }}

    @else
        <h3>Пользователь не существует</h3>

    @endif


@stop