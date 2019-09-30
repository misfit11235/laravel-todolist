<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Laravel-ToDoList</title>
    </head>
    <body>
        <div class='container py-5' style='height:10vh;'>
            <div class='d-flex justify-content-center align-items-center'>
                <span class='display-1'>Laravel-ToDoList</span>
            </div>
            @guest
            <div class='d-flex flex-column justify-content-center text-center'>
                <a href='{{route("login")}}' class='btn-dark text-white py-3 my-2'>
                    <span class='h1'>Login</span>
                </a>
                <a href='#' class='btn-primary py-3 my-2'>
                    <span class='h1'>Login with Facebook</span>
                </a>
            </div>
            @endguest
            @auth
            <div class='d-flex flex-column justify-content-center text-center'>
                <a href='{{route("home")}}' class='btn-dark text-white py-3 my-2'>
                    <span class='h1'>Take me to the task list!</span>
                </a>
                <a href='{{route("logout")}}' class='btn-danger py-3 my-2'>
                    <span class='h1'>Logout</span>
                </a>
            </div>
            @endauth
        </div>
    </body>
</html>
