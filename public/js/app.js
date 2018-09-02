
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
