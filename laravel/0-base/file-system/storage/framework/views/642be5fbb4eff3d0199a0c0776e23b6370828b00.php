<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>Upload</h2>
  <form action="/uploadimage" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="file" id="file" name="file">
    <input type="submit" value="Upload">
  </form>
</body>
</html><?php /**PATH C:\Users\Muhtar\Desktop\works\laravel-project\file-system\resources\views/upload.blade.php ENDPATH**/ ?>