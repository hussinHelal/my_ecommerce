<?php 

include ("func/connect.php");

$status = "products";

$sel = "SELECT * FROM complains";
$res = $conn -> query($sel);
$num = $res -> num_rows;
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
        
        <script src="js/jquery.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Products</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($status=="dashboard"){echo "active";}?>">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item <?php if($status=="products"){echo "active";}?>">
                <a class="nav-link" href="products.php">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Products</span>
                </a>
            </li>

            <li class="nav-item <?php if($status=="admins"){echo "active";}?>">
                <a class="nav-link" href="admins.php">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Admins</span>
                </a>
            </li>

            <li class="nav-item <?php if($status=="contact"){echo "active";}?>">
               <a href="contact_us.php" class="nav-link">
                <i class="fas fa-fw fa-phone"></i>
                <span>contact_us</span>
               </a>
            </li>

               <li class="nav-item ">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-fw fa-backspace"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               <?php include("includes/topbar.php");?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Products</h1>
                        
                    </div>
                   <?php 
                     
                        if(!isset($_GET["action"])) 
                        {

                       include ("design/all.php");

                        } else if($_GET["action"] == "add")
                        {

                       include ("design/add.php");

                        } else if($_GET["action"] == "edit")
                        {

                         include ("design/edit.php");

                        }
                   ?>
                </div>
                <!-- /.container-fluid -->

            </div>

            <script>

                $(".editbtn1").click(function(ev){

                    ev.preventDefault();
                    
                    // let id2 = $("#edit_id").val(); 
                    let edt_id= $(this).closest("form").find("[id^='edit_id_']").val();
                    console.log(edt_id);
                    let formData1 = new FormData();
                   

                    formData1.append("id", edt_id);
                    formData1.append("name", $("#edit_name_"+edt_id).val());
                    let images = $("#edit_images_"+edt_id)[0].files;
                    for (let i = 0; i < images.length; i++) {
                        formData1.append("images[]", images[i]);
                    }
                    formData1.append("count", $("#edit_count_"+edt_id).val());
                    formData1.append("price", $("#edit_price_"+edt_id).val());
                    formData1.append("brand", $("#edit_brand_"+edt_id+" option:selected").val());
                    formData1.append("category", $("#edit_category_"+edt_id+" option:selected").val());
                    formData1.append("dsc", $("textarea#edit_dsc_"+edt_id).val());

                    let e_name = $("#edit_name_"+edt_id).val();
                    let e_img = $("#edit_images_"+edt_id).val();
                    let e_count = $("#edit_count_"+edt_id).val();
                    let e_price = $("#edit_price_"+edt_id).val();
                    let e_cat = $("#edit_category_"+edt_id+" option:selected").val();
                    let e_brand = $("#edit_brand_"+edt_id+" option:selected").val();
                    let e_dsc = $("textarea#edit_dsc_"+edt_id).val();

                    console.log(e_name);

                    $.ajax({
                        url: 'func/do_edit.php',
                        type: 'POST',
                        data: formData1,
                        processData: false,
                        contentType: false,
                        success: function(data){
                            $("#name_"+edt_id).text(e_name);
                            $("#img_"+edt_id).text(e_img);
                            $("#count_"+edt_id).text(e_count);
                            $("#price_"+edt_id).text(e_price);
                            $("#cat_"+edt_id).text(e_cat);
                            $("#brand_"+edt_id).text(e_brand);
                        }
                    });
                    $(".close1").trigger("click");
                })

                $(".addbtn1").click(function(eve){
                    eve.preventDefault();
                    

                    // let name1 = $("#pro_name2").val(); 
                    // let image1 = $("#pro_images2").val(); 
                    // let stock1 = $("#pro_stock2").val(); 
                    // let price1 = $("#pro_price2").val(); 
                    // let brand1 = $("#pro_brand2 option:selected").val(); 
                    // let category1 = $("#pro_cat2 option:selected").val(); 
                    // let description1 = $("textarea#pro_dsc2").val();
                    
                    // $.post("func/do_add.php", {
                        
                    //     name: name1,
                    //     images: image1,
                    //     count: stock1,
                    //     price: price1,
                    //     brand: brand1,
                    //     category: category1,
                    //     dsc: description1

                    // } , function(data){
                    //      console.log(data);
                    // })
                       
                    let formData = new FormData();
    
                    formData.append("name", $("#pro_name2").val());
                    let images = $("#pro_images2")[0].files;
                    for (let i = 0; i < images.length; i++) {
                        formData.append("images[]", images[i]);
                    }
                    formData.append("count", $("#pro_stock2").val());
                    formData.append("price", $("#pro_price2").val());
                    formData.append("brand", $("#pro_brand2 option:selected").val());
                    formData.append("category", $("#pro_cat2 option:selected").val());
                    formData.append("dsc", $("textarea#pro_dsc2").val());

                    $.ajax({
                        url: 'func/do_add.php',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data){
                            $("tbody").append(data);
                        }
                    });

                    $("#close2").trigger("click");
                    
                })

                
                $(".delbtn").click(function(ed){

                    ed.preventDefault();

                    let tr_sel = $(this).parent().find("[class^='tr_'").val();
                    let tr_class = ".tr_" + tr_sel;
                    let del_id = $(this).data('id');

                    $.post("func/delete.php",{
                        id: del_id
                        },function(dt){
                            $(".tr_"+del_id).remove();
                        })
                });
            </script>
 

            <?php include("includes/tail.php");