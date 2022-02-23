<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <style>
            form{
                display:flex;
                flex-direction:column;
                justify-content:space-around;
                width: 400px;
                margin: auto;
            }
            form input{
                height: 30px;
                margin: 5px 0;
            }
            form input[type='text']{
                border-radius:3px;
                border:1px solid #999;
                padding-left:10px;
                font-size:16px;
            }
        </style>
    </head>
    <body>
        <form action="#" method="post">
            @csrf
            <input type="text" name="user" placeholder="user">
            <input type="text" name="pass" placeholder="password">
            <input type="submit" value="Send">
        </form>
        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
    </body>
</html>
