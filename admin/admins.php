<?php
session_start();
include ("func/connect.php");
$status="admins";
// $id= $_SESSION["admin"]["name"]
$id = $_SESSION["admin"]["id"];
$priv_select = "SELECT * FROM permissions where id='$id'";
$priv_query = mysqli_query($conn, $priv_select);
$priv_row = mysqli_fetch_assoc($priv_query);

$sel = "SELECT * FROM complains";
$res = $conn -> query($sel);
$num= $res -> num_rows;

// $i_g =  "<script>  let gend_i= $("#i").val() </script>";

// $gend_sel = "SELECT * FROM gender ";
// $gend_res = $conn -> query($gend_sel);
// $gend_row = $gend_res -> fetch_assoc();


// $priv_sel = "SELECT * FROM privilages WHERE id='$priv_id";
// $priv_res = $conn -> query($priv_sel);
// $priv_row = $priv_res -> fetch_assoc();
// echo $priv_row["name"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="vendor/fontawesome-free/svgs/solid/star-of-life.svg"/>
    <title>Hussein - Admins</title>

    <!-- Custom fonts for this template-->
    <link rel="icon" type="image/x-icon" href="vendor/fontawesome-free/svgs/solid/star-of-life.svg">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
<!-- <script src="js/jquery.js"></script> -->
    <!-- Page Wrapper -->
    <script src="js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("includes/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               <?php include("includes/topbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Admins</h1>
                        
                    </div>
                  <?php

                   if(!isset($_GET["admin"]))
                   {

                     include("design/admin_all.php");

                   } else if($_GET["admin"] == "add_admin")
                   {

                     include("design/admin_add.php");

                   } else if($_GET["admin"] == "edit_admin"){

                     include("design/admin_edit.php");

                   }
                                
                   
                   ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- <script src="func/edit_post.js"></script> -->
                   <script>
                                   //    $("#editForm").click(function(event){event.preventDefault();})
                                   
       
                                      $(".addbtn").click(function(event){
                                       //    $("#editForm").submit(function(event){
                                          event.preventDefault();
                               
                                          let name = $("#name").val();
                                          let priv = $("#priv option:selected").val();
                                          let gend = $("#gend option:selected").val();
                                          let id1 = $("#id_td").val();
                                          
                                             
                                          $.post("func/admin_do_add.php" ,{
                                              name: name,
                                              gender: gend,
                                              privilage: priv  
                                          }, function(data){
                                                 //  console.log("HELLO");
                                                 //  console.log(data);
                                                 // console.log(JSON.parse(data))
                                                 $("tbody").append(data);
                                             // $("#id_td").append(data);
                                             // $("tbody").closest("tr").find("#name_td").text(name);
                                             // $("tbody").closest("tr").find("#priv_td").text(priv);
                                             // $("tbody").closest("tr").find("#gend_td").text(gend);
                               
                                          });
                                        $("#close1").trigger("click");
                                          
                                      })
       
                                   
       
                                      $(".editbtn1").click(function(e1){
                                       
                                       e1.preventDefault();
       
                                       let id2 = $(this).closest("form").find("[id^='i_']").val();
                                      //  console.log(id1);
                                       let namesel = "#name1_" + id2;
                                       
                                       let name1 = $(namesel).val();
                                      //  console.log(name1);
       
                                       let privsel = "#priv1_" + id2 + " option:selected";
                                       let priv1 = $(privsel).val();

                                       let priv2 = $(privsel).text();
                                       console.log(priv2);
       
                                       let gendsel = "#gend1_" + id2 + " option:selected";
                                       let gend1 = $(gendsel).val();
                                       let gend2 = $(gendsel).text();
                                      //  console.log(gend1);
                                      
       
                                      //  const formData = new FormData();
                                      //  formData.append('user',name1);
                                      //  formData.append('privil',priv1);
                                      //  formData.append('gend',gend1);
                                      //  formData.append('id',id1);
       
                                      //  $.ajax({
                                      //    url:"func/admin_do_edit.php",
                                      //    data:formData,
                                      //    type:"POST",
                                      //    processData: false,
                                      //    contentType: false,
                                      //    success:function(dat){
                                      //      console.log(dat);
                                      //    },
                                      //    error:function(error){
                                      //      console.log(error);
                                      //    }
                                      //  })
                                       $.post("func/admin_do_edit.php" ,{
       
                                           user: name1,
                                           gend: gend1,
                                           privil: priv1,  
                                           id: id2
       
                                       }, function(dat){
                                              //  console.log(dat);
                                              // console.log(JSON.parse(data))
                                          $("#id_td").text(id2);
                                          $("#name_td_"+id2).text(name1);
                                          // $("#priv_td_"+id1).text(priv1);
                                          // $("#gend_td_"+id1).text(gend1);
                                          $("#priv_td_"+id2).text(priv2);
                                          $("#gend_td_"+id2).text(gend2);
                                          
                                          
                                          // console.log(dat);
                                          // w = [];
                                          // w.push(dat);
                                          // console.log(w);
                                          // g = w[0];
                                          // p = w[1];
                                          // console.log(g +  " : " +p);
                                       });
                                     $(".editclose").trigger("click");
                                    // $("#" + id1).modal('hide');
                                   });
       
                                //    $.ajax({
                                //     url: 'func/admin_do_edit.php', // Replace with your PHP script URL
                                //     type: 'GET',
                                //     data: $(this).serialize(),
                                //     dataType: 'json',
                                //     success: function(response) {
                                //         // Access each value in the array
                                //         var gender = response[0];
                                //         var role = response[1];

                                //         // Print each value to the result div
                                //         console.log(gender + " : " +role);
                                //         console.log(response);
                                        
                                //     },
                                //     error: function(xhr, status, error) {
                                //         console.error('Error:', error);
                                //     }
                                // });
                                 $(".deletebtn").click(function(ev){
                                  
                                  ev.preventDefault();

                                  let tr_sel = $(this).parent().find("[class^='tr_'").val();
                                  let tr_class = ".tr_" + tr_sel;
                                  // let tr_class = $(this).data('id');

                                  let del_id = $(this).data('id');
                                  // console.log(del_id);
                                  $.post("func/admin_delete.php",{
                                    id: del_id
                                  },function(dt){
                                     $(".tr_"+del_id).remove();
                                  })
                                 })
                                 </script>

            <?php include("includes/tail.php");?>