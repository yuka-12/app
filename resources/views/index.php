<!DOCTYPE HTML>
<html lang="ja">
<head>
  <title>nijitter</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/app.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/app.js"></script>
</head>
<body>
  <div clas="center-block">
  <div class='title m-3 p-3 text-center'>
    <h1>NIJITTER</h1>
  </div>
  <div class="container text-center">
  <div class='form col-sm-5 center-block'>
    <form id="form" method="post" accept-charset="utf-8" return false>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" class="form-control" name="name"><br>
    </div>
    <div class="form-group">
      <label for="text">Text:</label>
      <textarea id="text" class="form-control" name="text"></textarea>
    </div>
    </form>
    <input type="button" id="ajax" class="btn btn-dark" value="送信">
  </div>
  <br>
  <br>
  <div class="posts"></div>
</div>
</div>
</body>
</html>
