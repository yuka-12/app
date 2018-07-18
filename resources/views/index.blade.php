<!DOCTYPE HTML>
<html lang="ja">
<head>
  <title>nijitter</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript">

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
                   $('.result').html(data);
                   console.log(data);
               })
               // Ajaxリクエストが失敗した時発動
               .fail( (data) => {
                   $('.result').html(data);
                   console.log(data);
               })
               // Ajaxリクエストが成功・失敗どちらでも発動
               .always( (data) => {

               });
           });
       });

   </script>
</head>
<body>
  <div class='title'>
    <h1>NIJITTER</h1>
  </div>
  <div class='form'>
    <form id="form" method="post" accept-charset="utf-8" return false>
      <input type="text" id="name" name="name"><br>
      <textarea id="text" name="text"></textarea>
    </form>

    <input type="button" id="ajax" value="送信">
  </div>
    <div class="result"></div>
</body>
</html>
