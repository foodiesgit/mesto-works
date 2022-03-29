<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>

<body class="antialiased">
    <h2>Main Page</h2>
    {{-- errors come from request validate --}}
    @if ($errors->any)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger m-1" role="alert">{{ $error }}</div>
        @endforeach
    @endif
    {{-- or --}}
    {{-- @if ($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
       @endif --}}
</body>

</html>
