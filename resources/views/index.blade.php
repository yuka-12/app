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
  <script type="text/javascript">


       function test(){
         return $.ajax({
           url: './get',
           type: 'GET'
         })
       }
           test().done(function(result) {
             // console.log(result);
             // HTMLを初期化
             $(".posts").html("");

             //HTMLを生成
             // $.getJSON(result, function(data){
             //   console.log(data);
             // for(var index in result){
             $(result).each(function(){
             $(
             '<h6>'+ this.name + '</h6>'+
             '<span>' + this.text + '</span><br><br>'
           ).appendTo('.posts');
           });

             // $('.posts').html(result);
            }).fail(function(result) {
                console.log(result);
            });




       $(function(){
           $('#ajax').on('click',function(){
               $.ajax({
                   url:'./post',
                   type:'POST',
                   data:{
                       'name':$('#name').val(),
                       'text':$('#text').val()
                   }
               })
               // Ajaxリクエストが成功した時発動
               .done( (data) => {
                   location.reload();
               })
               // Ajaxリクエストが失敗した時発動
               .fail( (data) => {
                   $('.result').html(data);
                   console.log(data);
               })
           });
       });

   </script>
</head>
<body>
  <div class='title m-3 p-3 text-center'>
    <h1>NIJITTER</h1>
  </div>
  <div class="container center-block text-center">
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
    <input type="button" id="ajax" class="btn btn-primary" value="送信">
  </div>
  <br>
  <br>
  <div class="result"></div>
  <div class="posts"></div>

</div>
</body>
</html>
