<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>Users</h2>
  @if ($users)
       <ul>
         <li>{{$users[0]->name}}</li>
         <li>{{$users[0]->viewer}}</li>
       </ul>
  @endif
 
</body>
</html>