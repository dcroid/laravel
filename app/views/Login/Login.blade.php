@extends('GeneralTemplate.body')

@section('content')

    <div class="container">

        <form  method="post" action="/login" class="form-signin" style="margin: 0 auto; max-width: 330px; padding: 15px;">
            <h2 class="form-signin-heading">Авторизируйтесь</h2>
            <label for="inputEmail" class="sr-only">Email адрес</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
            <label for="inputPassword" class="sr-only">Пароль</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
        </form>

    </div> <!-- /container -->

@stop