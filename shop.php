<?php 
// session_start();
$stat = "shop"; 
include("admin/func/connect.php"); 
include("design/topsite.php");
$name = isset($_SESSION["login_id"]) ? $_SESSION["login_id"] : 0 ;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$num = ($page - 1) * 3;

if(isset($_GET["cat"])){
 
  $cat_id= $_GET["cat"];
  $select_pro = "SELECT * FROM products WHERE category='$cat_id' limit 3 offset $num";
  $result_pro = $conn -> query($select_pro);


} else {

  $select_pro = "SELECT * FROM products limit 3 offset $num";
  $result_pro = $conn -> query($select_pro);

  }
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
?>
      <!--  Modal -->
      <div class="modal fade" id="productView" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0"><a class="product-view d-block h-100 bg-cover bg-center" style="background: url(img/product-5.jpg)" href="img/product-5.jpg" data-lightbox="productview" title="Red digital smartwatch"></a><a class="d-none" href="img/product-5-alt-1.jpg" title="Red digital smartwatch" data-lightbox="productview"></a><a class="d-none" href="img/product-5-alt-2.jpg" title="Red digital smartwatch" data-lightbox="productview"></a></div>
                <div class="col-lg-6">
                  <button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="p-5 my-md-4">
                    <ul class="list-inline mb-2">
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                    </ul>
                    <h2 class="h4">Red digital smartwatch</h2>
                    <p class="text-muted">$250</p>
                    <p class="text-small mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                    <div class="row align-items-stretch mb-4">
                      <div class="col-sm-7 pr-sm-0">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                          <div class="quantity">
                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="cart.php">Add to cart</a></div>
                    </div><a class="btn btn-link text-dark p-0" href="wishlist.php"><i class="far fa-heart mr-2"></i>Add to wish list</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Shop</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <div class="container p-0">
            <div class="row">
              <!-- SHOP SIDEBAR-->
             <?php include("design/sidebar.php"); ?>
              <!-- SHOP LISTING-->
              <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-6 mb-2 mb-lg-0">
                    <p class="text-small text-muted mb-0">Showing 1–12 of 53 results</p>
                  </div>
                  <div class="col-lg-6">
                    <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                      <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th-large"></i></a></li>
                      <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th"></i></a></li>
                      <li class="list-inline-item">
                        <select class="selectpicker ml-auto" name="sorting" data-width="200" data-style="bs-select-form-control" data-title="Default sorting">
                          <option value="default">Default sorting</option>
                          <option value="popularity">Popularity</option>
                          <option value="low-high">Price: Low to High</option>
                          <option value="high-low">Price: High to Low</option>
                        </select>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <!-- PRODUCT-->
                  <?php
                  
                     while($row = $result_pro -> fetch_assoc())
                     { ?>
                    
                    <div class="col-lg-4 col-sm-6">
                      <div class="product text-center">
                        <div class="mb-3 position-relative">
                          <div class="badge text-white badge-"></div><a class="d-block p-3 mb-3" href="detail.php?pro=<?=$row["id"]?>"><img class="img-fluid w-100" src="admin/img/<?php
                           $images = explode(",",$row["image"]);
                           echo $images[0];
                          ?>" style="height:200px;width:200px;"></a>
                          <div class="product-overlay">
                            <ul class="mb-0 list-inline">
                              <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="wishlist.php?pro=<?=$row["id"]?>""><i class="far fa-heart"></i></a></li>
                              <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="function/add_to_cart.php?pro=<?=$row["id"]?>&user=<?=$name?>">Add to cart</a></li>
                              <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
                            </ul>
                          </div>
                        </div>
                        <h6> <a class="reset-anchor" href="detail.php?pro=<?=$row["id"]?>""> <?=$row["name"]?> </a></h6>
                        <p class="small text-muted"> &dollar;<?=$row["price"]?> </p>
                      </div>
                    </div>

                  <?php
                     }
                     ?>
                  <!-- PRODUCT-->

                <!-- PAGINATION-->
                <nav aria-label="Page navigation example mb-5">
                  <ul class="pagination justify-content-center justify-content-lg-end ">
                    <?php
                    if($page != 1){ ?>
                    <li class="page-item"><a class="page-link" href="?page=<?=($page - 1)?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                    <?php } ?>
                    <?php

                    $page_row = $result_pro -> num_rows;

                    $n = ($page_row -1) * 3;

                    
                    for($i=1 ; $i < $n; $i++){ ?>
                    
                    <li class="page-item <?php

                     if($i == $page){ 

                      echo "active";

                     }

                     ?>"> <a class="page-link" href="shop.php?page=<?=$i?>"> <?=$i?> </a> </li>
 
                       <?php 
                      }
                     if($page < $n){ ?>
                    <li class="page-item"><a class="page-link" href="?page=<?=($page + 1)?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    <?php } ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </section>
      </div>

<?php include("design/tail.php"); ?>