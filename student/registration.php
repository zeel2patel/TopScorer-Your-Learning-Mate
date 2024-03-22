<?php
  require_once "../admin/function/session_check.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>TopScorer</title>
    <link rel="stylesheet" type="text/css" href="theme/dist/css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style type="text/css">
      .help-block{
        color: whitesmoke;
      }
      .green{
          padding: 2px;
          outline: none;
          border: none;
          box-shadow: inset 0 0 0 2px green;
      }
      .red{
          padding: 2px;
          outline: none;
          border: none;
          box-shadow: inset 0 0 0 2px red;
      }
      .red-text{
          padding: 2px;
          outline: none;
          border: none;
          color: red;
      }
    </style>
</head>
<body class="main-bg">
  <div class="login-container   animated flipInX">
    <div class="text-c " style="font-size: 40px;"> <p class="text-orange">Registration</p></div>
    <div class="container-content textcol">
      <form id="studentRegForm" name="studentRegForm" method="post" >
          <input type="hidden" id="student_page" name="student_page"  value="student">
          <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="0">
          <div class="form-group">
            <label for="inputName">Name <span class="warning">*</span></label>
            <input type="text" id="inputName" name="inputName" class="form-control" required>
            <span class="warning" id="inputNamewarn"></span>
          </div>
          <div class="form-group">
            <label for="inputMobile">Mobile <span class="warning">*</span></label>
            <input type="text" id="inputMobile" name="inputMobile" class="form-control" required>
            <span class="warning" id="inputMobilewarn"></span>
          </div>
          <div class="form-group">
            <label for="inputEmail">Email <span class="warning">*</span></label>
            <input type="text" id="inputEmail" name="inputEmail" class="form-control" required>
            <span class="warning" id="inputEmailwarn"></span>
          </div>
          <div class="form-group">
            <label for="inputPassword">Password <span class="warning">*</span></label>
            <input type="Password" id="inputPassword" name="inputPassword"  class="form-control" required>
            <span class="warning" id="inputPasswordwarn"></span>
          </div>
          <div class="form-group">
            <label for="inputCPassword">Confirm Password <span class="warning">*</span></label>
            <input type="Password" id="inputCPassword" name="inputCPassword"  class="form-control" required>
            <span class="warning" id="inputCPasswordwarn"></span>
          </div>
           <input type="hidden" id="inputUserType" name="inputUserType" class="form-control" value="student">
          <div style="display: flex;justify-content: center;align-items: center;">
            <input type="submit" name="submit" class="btn btn-success submitBtn " value="Register"/>
          </div>
        <br>
        <span class="statusMsg"></span>
      </form>
       <div class="text-c"> ◄ <a class="text-whitesmoke" style="" href="login.php"><big>Sign In</big></a> </div>
      <p class="margin-t text-whitesmoke text-c"><small> TopScorer &copy; 2024</small> </p>
    </div>
  </div>
  
  <script src="theme/dist/js/jquery.min.js"></script>
  <script src="theme/dist/js/jquery-ui.min.js"></script>
  <script src="../admin/function/js/function.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      
      $('#inputName').keyup(function(){
          var inputName =$('#inputName').val();
          if (inputName.length != "") { 
              $("#inputNamewarn").hide();
          }
      });
      $('#inputMobile').keyup(function(){
          var inputMobile =$('#inputMobile').val();
          if (inputMobile.length != "") { 
              $("#inputMobilewarn").hide();
          }
      });

      $('#inputEmail').keyup(function(){
          var inputEmail =$('#inputEmail').val();
          if (inputEmail.length != "") { 
              $("#inputEmailwarn").hide();
          }
      });
      $('#inputPassword').keyup(function(){
          var inputPassword =$('#inputPassword').val();
          if (inputPassword.length != "") { 
              $("#inputPasswordwarn").hide();
          }
      });
      $('#inputCPassword').keyup(function(){
          var pass =$('#inputPassword').val();
          var cpass =$('#inputCPassword').val();
          if(pass!=cpass){
              $('#inputCPassword').attr({class:'red form-control'});
              $('.submitBtn').attr({disabled:true});
          }else{
              $('#inputCPassword').attr({class:'green form-control'});
              $('.submitBtn').attr({disabled:false});
          }
      });


    

      $(".submitBtn").click(function () { 
          var inputName = $("#inputName").val();
          var inputMobile = $("#inputMobile").val();
          var inputEmail = $("#inputEmail").val();
          var inputPassword = $("#inputPassword").val();
          var inputCPassword = $("#inputCPassword").val();


          if (inputName.length == "") { 
            $("#inputNamewarn").show();
            $("#inputNamewarn").html("Please enter your name");
            $('#inputNamewarn').attr({class:'red-text'});
            return false; 
          }else if (inputMobile.length == "") { 
            $("#inputMobilewarn").show();
            $("#inputMobilewarn").html("Please enter your mobile");
            $('#inputMobilewarn').attr({class:'red-text'});
            return false; 
          }else if (inputEmail.length == "") { 
              $("#inputEmailwarn").show();
              $("#inputEmailwarn").html("Please enter your email");
              $('#inputEmailwarn').attr({class:'red-text'});
              return false; 
          }else if (inputPassword.length == "") { 
            $("#inputPasswordwarn").show();
            $("#inputPasswordwarn").html("Please enter password");
            $('#inputPasswordwarn').attr({class:'red-text'});
            return false; 
          }else if (inputCPassword.length == "") { 
            $("#inputCPasswordwarn").show();
            $("#inputCPasswordwarn").html("Please enter confirm password");
            $('#inputCPasswordwarn').attr({class:'red-text'});
            return false; 
          } else if(inputPassword!=inputCPassword){
              $("#inputCPasswordwarn").show();
              $("#inputCPasswordwarn").html("Please enter right confirm password");
              $('#inputCPasswordwarn').attr({class:'red-text'});
            return false; 
          }
      }); 
    });
  </script>
</body>
</html>