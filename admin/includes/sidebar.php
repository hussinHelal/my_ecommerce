<?php

include ("func/connect.php");
$id = $_SESSION["admin"]["id"];
$priv_select = "SELECT * FROM employee where id=$id";
$priv_query = mysqli_query($conn, $priv_select);
$priv_row = mysqli_fetch_assoc($priv_query);
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                    <?php
                      echo $priv_row["name"];
                    ?>
                </div>
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
               <a href="admins.php" class="nav-link">
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