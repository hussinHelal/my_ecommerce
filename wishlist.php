<?php
ob_start();
$stat = "wishlist";
include("design/topsite.php"); 
include("admin/func/connect.php"); 
$id = $_GET["pro"];
if(isset($_GET["pro"])){  
  $wish_sel = "SELECT * FROM products WHERE id='$id'";
  $wish_res = $conn -> query($wish_sel);
  $row = $wish_res -> fetch_assoc();
} else {
  header("location:shop.php");
}
?>
  <section class="py-5 ml-5">
          <h2 class="h5 text-uppercase mb-4">wishlist</h2>
          <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <!-- CART TABLE-->
              <div class="table-responsive mb-4">
    
                <table class="table">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product</strong></th>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Price</strong></th>
                      <!-- <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Quantity</strong></th>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total</strong></th> -->
                      <th class="border-0" scope="col"> </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th class="pl-0 border-0" scope="row">
                        <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.php"><img src="admin/img/<?=$row["image"]?>" alt="..." width="70"/></a>
                          <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.php?pro=<?=$row["id"]?>"><?=$row["name"]?></a></strong></div>
                        </div>
                      </th>
                      <td class="align-middle border-0">
                        <p class="mb-0 small">&dollar;<?=$row["price"]?></p>
                      </td>
                      <!-- <td class="align-middle border-0">
                        <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                          <div class="quantity">
                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control form-control-sm border-0 shadow-0 p-0" type="text" value="<?=$row["count"]?>"/>
                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </td> -->

                  </tbody>
                </table>
              </div>
              <!-- CART NAV-->
              <div class="bg-light px-4 py-3">
                <div class="row align-items-center text-center">
                  <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm" href="shop.php"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Continue shopping</a></div>
                  <div class="col-md-6 text-md-right"><a class="btn btn-outline-dark btn-sm" href="checkout.php?pro=<?=$row["id"]?>">Procceed to checkout<i class="fas fa-long-arrow-alt-right ml-2"></i></a></div>
                </div>
              </div>
            </div>

<!--           
                </div>
              </div>
            </div> -->
          </div>
   
        </section>
      </div>
      <?php include("design/tail.php"); ?>