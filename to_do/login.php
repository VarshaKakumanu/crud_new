<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container pt-4">
<form action="post_login.php" method="post">
    <h1> LOGIN PAGE </h1>
  <div class="form-group">
    <label for="exampleInputEmail1"> Username </label>
    <input type="text" name="n_username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"> Password </label>
    <input type="password" name="n_password" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" name="n_submit" class="btn btn-primary"> Login </button>

  
</form>
</div>
</body>
</html>