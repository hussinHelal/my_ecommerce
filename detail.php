<?php 
ob_start();
$stat = "detail";
include("admin/func/connect.php"); 
include("design/topsite.php"); 

if(isset($_GET["pro"])){
$id= $_GET["pro"];
$select_pro = "SELECT * FROM products WHERE id='$id' ";
$result_pro = $conn -> query($select_pro);
$row_pro = $result_pro -> fetch_assoc();
$images = explode("," , $row_pro["image"]);
} else {
  header("location: shop.php");
}



?>

      <!--  Modal -->
      <!-- <div class="modal fade" id="productView" tabindex="-1" role="dialog" aria-hidden="true">
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
                      <div class="col-sm-5 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="cart.html">Add to cart</a></div>
                    </div><a class="btn btn-link text-dark p-0" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <section class="py-5 ml-5">
        <div class="container">
          <div class="row mb-5">
            <div class="col-lg-6">
              <!-- PRODUCT SLIDER-->
              <div class="row m-sm-0">
                <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0">
                  <div class="owl-thumbs d-flex flex-row flex-sm-column" data-slider-id="1">
                    <?php
                     for($i = 0; $i < count($images); $i++){ 
                       ?>
                    <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="admin/img/<?=$images[$i]?>" ></div>
                    <?php
                     }
                     ?>
                  </div>
                </div>
                <div class="col-sm-10 order-1 order-sm-2">
                  <div class="owl-carousel product-slider" data-slider-id="1">
                    <?php
                     for($i = 0; $i < count($images); $i++){ 
                       ?>
                  <a class="d-block" href="img/product-detail-2.jpg" data-lightbox="product" title="Product item 2"><img class="img-fluid" src="admin/img/<?=$images[$i]?>" ></a>
                  <?php
                     }
                     ?>
                </div>
                </div>
              </div>
            </div>
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">
              <!-- <ul class="list-inline mb-2">
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
              </ul> -->
              <h1><?=$row_pro["name"]?></h1>
              <p class="text-muted lead">&dollar;<?=$row_pro["price"]?></p>
              <p class="text-small mb-4"><?=$row_pro["description"]?></p>
              <div class="row align-items-stretch mb-4">
                <div class="col-sm-5 pr-sm-0">
                  <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                    <div class="quantity">
                      <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                      <input class="form-control border-0 shadow-0 p-0" type="text" value=
                      <?php
                      if($row_pro["count"] > 0){
                        echo $row_pro["count"];
                      } else {
                        echo "Out Of Stock";
                      }
                      
                      ?>
                      ">
                      <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="cart.php?pro=<?=$row_pro["id"]?>">Add to cart</a></div>
              </div>
              <a class="btn btn-link text-dark p-0 mb-4" href="#"><pre>Stock: <?php if($row_pro["count"] > 0){echo $row_pro["count"]; } else { echo "out of stock";} ?></pre></a><br>
              <a class="btn btn-link text-dark p-0 mb-4" href="wishlist.php?pro=<?=$row_pro["id"]?>"><i class="far fa-heart mr-2"></i>Add to wish list</a><br>
              <ul class="list-unstyled small d-inline-block">
                <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ml-2" href="#">
                  <?php
                  $cat_id=$row_pro["category"];
                  $cat_sel= "SELECT * FROM category WHERE id='$cat_id'";
                  $cat_res= $conn -> query($cat_sel);
                  $cat_row=$cat_res -> fetch_assoc();
                  echo $cat_row["name"];
                  ?>
                </a></li>
              </ul>
            </div>
          </div>
          <!-- DETAILS TABS-->
          <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
            <!-- <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li> -->
          </ul>
          <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <div class="p-4 p-lg-5 bg-white">
                <h6 class="text-uppercase">Product description </h6>
                <p class="text-muted text-small mb-0"><?=$row_pro["description"]?></p>
              </div>
            </div>
            
          </div>
          <!-- RELATED PRODUCTS-->
          <h2 class="h5 text-uppercase mb-4">Related products</h2>
          <div class="row">
            <!-- PRODUCT-->
            <?php
            $rel_cat=$row_pro["category"];
            $rel_sel= "SELECT * FROM products WHERE category='$rel_cat' LIMIT 4";
            $rel_res= $conn -> query($rel_sel);

            while($rel_row=$rel_res -> fetch_assoc()){
              $imgs = explode(",", $rel_row["image"])
            ?>
            <div class="col-lg-3 col-sm-6">
              <div class="product text-center skel-loader">
                <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.php?pro=<?=$rel_row["id"]?>"><img class="img-fluid " style="width:190px;height:170px;" src="admin/img/<?=$imgs[0]?>" ></a>
                  <div class="product-overlay">
                    <ul class="mb-0 list-inline">
                      <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="wishlist.php?pro=<?=$rel_row["id"]?>"><i class="far fa-heart"></i></a></li>
                      <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.php?pro=<?=$rel_row["id"]?>">Add to cart</a></li>
                      <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
                    </ul>
                  </div>
                </div>
                <h6> <a class="reset-anchor" href="detail.php?pro=<?=$rel_row["id"]?>"><?=$rel_row["name"]?></a></h6>
                <p class="small text-muted">&dollar;<?=$rel_row["price"]?></p>
              </div>
            </div>
            <?php
            }
          
            ?>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            <!-- PRODUCT-->
      </section>
     <?php include("design/tail.php"); ?>