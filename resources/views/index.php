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
             // HTMLを初期化
             $(".posts").html("");

             //HTMLを生成
             $(result).each(function(){
             $(
             '<h6>'+ this.name + '</h6>'+
             '<span>' + this.text + '</span><br>' +
             '<form method="post" action="" accept-charset="utf-8" return false>' +
             '<div class="rapper-form col-sm-5 center-block"><input type="button" class="update-button btn btn-dark" value="編集"> ' +
             '<input type="button" id="delete-' + this.id + '" class="delete btn btn-danger" name="' + this.id + '" value="削除"><br><br>' +
             '<div class="update-form">' +
             '<label for="name">Name:</label>' +
             '<input type="text" class="update-name form-control" name="name" value="' + this.name +'"><br>' +
             '<label for="text">Text:</label>' +
             '<textarea class="update-text form-control" name="text">' + this.text + '</textarea><br>' +
             '<input type="button" id="update-' + this.id + '" class="update btn btn-dark" name="' + this.id + '" value="保存">' +
             '</div></form><br></div>'

           ).appendTo('.posts');
           });

           $('.update-form').hide();

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
               .done( (data) => {
                   location.reload();
               })
               .fail( (data) => {
                   $('.result').html(data);
                   console.log(data);
               })
           });

           $(document).on('click', '.delete',function(){
             var deleteConfirm = confirm('削除してよろしいでしょうか？');

             if(deleteConfirm == true) {
            var deleteId =  $(this).attr("id");

              $.ajax({
                  url:'./delete',
                  type:'POST',
                  data:{
                      'id':$(this).attr("name")
                  }
              }).done( (data) => {
                location.reload();
              })
            } else {
              (function(e) {
        e.preventDefault()
      });
            }
          });

           $(document).on('click', '.update',function(){

               $.ajax({
                 url:'./update',
                 type:'POST',
                 data:{
                   'id':$(this).attr("name"),
                   'name':$(this).parent().find('.update-name').val(),
                   'text':$(this).parent().find('.update-text').val()
                 }
                   }).done( (data) => {
                       console.log(data);
                       location.reload();
                   })
           });

           $(document).on('click', '.update-button',function(){
             $(this).parent().find('.update-form').addClass('open');
             $('.open').slideToggle(300);
             $(this).parent().find('.update-form').removeClass('open');
           });


       });

   </script>
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
