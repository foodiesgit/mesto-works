<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <button id="send">Send</button>


  <!-- script side -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $.ajax({
      url: "/users",
      headers:{'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>'},
      type: "GET",
      // data: users,
      dataType: "json",
      success: function (data) {
        console.log(data)
      }
    })
   document.getElementById('send').addEventListener('click', () => {
     const users = {
       name:'Mustafa',
       lastname: 'Kaya',
       age:50
     }
    $.ajax({
      url: "/users",
      headers:{'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>'},
      type: "POST",
      data: users,
      dataType: "json",
      success: function (data) {
        console.log(data)
      }
    })
   })
  </script>
</body>
</html><?php /**PATH C:\Users\Muhtar\Desktop\works\laravel-project\ajax\resources\views//users.blade.php ENDPATH**/ ?>