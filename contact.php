<!DOCTYPE html>

<?php
ini_set('display_errors', 1);

$stat = "contact";
include("admin/func/connect.php");
include("design/topsite.php"); 



?>
<script src="js/jquery.js"></script>
<br><br>
<?php 
if(!isset($_SESSION["login"])){
   echo <<<msg
        <div class="container col-lg-6">
          <div class="row justify-content-center">
            <p class="alert alert-danger"> You Should Log-in </p>
         </div>
        </div>
        msg; 
}
?>
<br><br>
<div class="container col-9 ">

    <div class="row justify-content-center">

<form>

    <div class="container-fluid">

                <div class="mb-3">
                            <label for="name"><strong>name</strong></label><br>
                            <input type="text" id="in" class="name form-control">
                </div>

                <div class="mb-3">
                            <label for="name"><strong>email</strong></label><br>
                            <input type="email" id="in" class="email form-control">
                </div>

                <div class="mb-3">
                            <label for="name"><strong>phone</strong></label><br>
                            <input type="number" id="in" class="phone form-control">
                </div>

                <div class="form-floating ">
                            <label for="messageArea"><strong>message</strong></label><br>
                            <textarea class="message form-control" placeholder="Leave Your Message Here" id="messageArea in" style="height: 100px"></textarea>
                </div><br>

                <div class="mb-3 col-6">
                    <div class="row justify-content-center">
                            <button type="submit" class="btn btn-success submit" style="border:none; border-radius:10px;">submit</button>
                  </div>
                 </div>
                     
                </div> <br>

</form><br>

        </div>
         </div>
          </div>

        <div class="continer col-lg-9">
            <div class="row justify-content-center">
        <div class="info"></div>
        </div>
        </div>
<script>
 
 $("form").submit(function(event){
    
    event.preventDefault()
   
    var usrInput = $("in").val();
     

    let name = $(".name").val();
    let email = $(".email").val();
    let phone = $(".phone").val();
    let message = $(".message").val();
    
    
        $.post("function/do_contact.php", {
        username : name,
        mail: email,
        phone: phone,
        msg: message

    } , function(data){
        $("input").empty();
        $(".info").empty().append(data);
      })
      
    })


</script>






<?php include("design/tail.php"); ?>