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

//validation-------------------------------------
$req->validate([
    'user'=>'required | min:3',
    'pass'=> 'required | max:5'
]);
return $req;
//or 
$rules = Validator::make($req->all(),[
    'user'=>'required | min:3',
    'pass'=> 'required | max:5'
]);
if($rules->fails()){
    return redirect()->back()->withErrors($rules)->withInput();
} else {
    return redirect()->route('/');
}
//customize error message--------------------------
$validationRules = Validator::make($req->all(),[
    'user'=>'required | min:3',
    'pass'=> 'required | max:5'
]);
$rules = Validator::make($req->all(),$validationRules,[
    'min'=>'Name must be:min charecters!'
]);
if($rules->fails()){
    return redirect()->back()->withErrors($rules)->withInput();
} else {
    return redirect()->route('/');
}
then in blade page----------------
@if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
//or set so
@if($errors->any()){
    <ul>
        @foreach($errors->all() as error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
}