<?php

session_start();
$status = "contact";
include("func/connect.php");
$sel_message = "SELECT * FROM complains";
$res_message = $conn ->query($sel_message);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hussein - Dashboard</title>

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

    <!-- Page Wrapper -->
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
                        <h1 class="h3 mb-0 text-gray-800">Contact-Us</h1>
                        
                    </div>
                    <script src="js/jquery.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
                    <table class="table table-hover table-striped table-bordered table-light col-lg-10">
    <thead class="table-dark text-light">

        <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>phone</th>
                <th class="col-2">message</th>
                <th>status</th>
        </tr>
    </thead>
    <tbody>
        <?php 
                while($row=$res_message->fetch_assoc())
                {
                    
                    ?>
                 
                    <tr class="<?=$row["id"]?>">
                            <td id="id_<?=$row["id"]?>"><?= $row["id"]?></td>
                            <td id="name_<?=$row["id"]?>"><?= $row["name"]?></td>
                            <td id="email_<?=$row["id"]?>" class="col-3"><?= $row["email"]?></td>
                            <td id="phone_<?=$row["id"]?>"><?= $row["phone"]?></td>
                            <td id="message_<?=$row["id"]?>" class="col-2">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success messagebtn" style="border:none; border-radius:20px;" data-bs-toggle="modal" data-bs-target="#<?= $row['id'] ?>">
                                    Show_Message
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$row["name"]?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <?= $row['message'] ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" style="border:none; border-radius:20px;" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                   
                            </td>
                            
                            <td class="messagestat">
                                <?= $row["status"] == 1 ? "read" :  "unread" ?>
                            </td> 
                </tr>
                            <?php
                            }
                            ?>
                                <script>
                                            $(".messagebtn").click(function(){
                                                
                                                
                                                var button = $(this);
                                                
                                                let element = button.closest('tr').find('td:first').text();
                                                
                                                $.post("func/do_message.php", { el: element }, function(data){
                                        
                                                    if(data == 1) {
                                                        button.closest('tr').find('.messagestat').empty().text("read");              
                                                    } else {
                                                        button.closest('tr').find('.messagestat').empty().text("unread");
                                                    }
                
                                                });
                                            });    
                                </script>  
                            </tbody>
                        </table>
                </div>
                <!-- /.container-fluid -->

            </div>

            <?php include("includes/tail.php"); ?>