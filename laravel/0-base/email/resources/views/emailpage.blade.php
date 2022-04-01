<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    form {
      width: 500px;
      margin: auto;
    }

    form>input {
      margin: 10px 0;
      height: 34px;
      padding-left: 10px;
    }

    h2 {
      text-align: center;
    }
  </style>
</head>

<body>
  <h2>Email</h2>
  <form action="/email" method="post" style="display:flex;flex-direction:column;">
    @csrf
    <input type="text" id="subject" name="subject" placeholder="Subject">
    <textarea name="email" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="Send">
  </form>
</body>

</html>