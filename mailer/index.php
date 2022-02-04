<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style type="text/css">
    input, textarea{
        margin-top:10px;
    }

    </style>
    <title>Contact Form</title>
  </head>
  <body>
    <div class="container" style="margin-top:200px">
        <div class="row justify-content center">
            <div class="col-md-6 col-md-offset-3" style="align=center">
            <input id="name" placeholder="Name" class="form-control">
            <input id="email" placeholder="Email" class="form-control">
            <input id="subject" placeholder="Subject" class="form-control">
            <textarea class="form-control" id="body" placeholder="Email Body"></textarea>
            <input type="button" onclick="sendEmail()" value="Send An Email" class="btn btn-primary">
</div>
</div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript">
      function sendEmail(){
          var name = $("#name");
          var email = $("#email");
          var subject = $("#subject");
          var body = $("#body");

          if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)){
              
              $.ajax({
                  url:'sendEmail.php',
                  method:'POST',
                  dataType:"json",
                  data:{
                      name: name.val(),
                      email: email.val(),
                      subject: subject.val(),
                      body: body.val()
                    }, success:function (response){
                        console.log(response);
                    }
              });
         
          }
      }

      function isNotEmpty(caller){
          if(caller.val() == "") {
              caller.css['border','1px solid red'];
              return false;
          }else
              caller.css('border', '');

          return true;
                 
      }
      </script>
</body>
</html>