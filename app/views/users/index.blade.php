@extends('GeneralTemplate.body')

@section('content')

    @if(isset($users))

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Дата Создания</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td></td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['created_at'] }}</td>
                    <td>{{ HTML::link('/user/'.$user['id'], 'Редактировать',['class'=>"btn btn-warning"] ) }}</td>
                    <td>{{ HTML::link('/user/delete/'.$user['id'], 'Удалить',['class'=>"btn btn-danger"] ) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3>Нет пользователей</h3>
    @endif



@stop