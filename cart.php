<?php
include("inc/header.php");
?>
<div id="content">
<div class="checkout">

<div class="container">

    <div class="check-anchor clearfix mb40">
        <div class="holder">
            <ul>
                <li class="active"><a href="#"><i class="fa fa-star"></i> Shopping Cart</a></li>
                <li><a href="#"><i class="fa fa-star"></i> Checkout</a></li>
                <li><a href="#"><i class="fa fa-star"></i> ORDER COMPLETE <i class="fa fa-star"></i></a></li>
            </ul>
            <div class="holder-border"></div>
        </div>
    </div>

    <div class="check-infos">
        <div class="row">
            <div class="col-md-8">
                <div class="check-details">
                    <table class="table">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Details</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Subtotal</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody class="check-body">
                        <tr>
                          <td><img src="upload/check1.png" alt=""></td>
                          <td><h6>Grey California Dress</h6>
                              <p>Size: <span>XL</span></p>
                              <p>Color: <span>Black</span></p></td>
                          <td>$ 3199.00</td>
                          <td><input type="text" placeholder="1"></td>
                          <td>$ 3199.00</td>
                          <td><a href="#"><img src="images/delete.png" alt=""></a></td>
                        <tr>
                          <td><img src="upload/check2.png" alt=""></td>
                          <td><h6>Brown Leather Hand Bag</h6>
                          <p>Size: <span>XL</span></p>
                            <p>Color: <span>White</span></p></td>
                          <td>$ 199.00</td>
                          <td><input type="text" placeholder="1"></td>
                          <td>$ 199.00</td>
                          <td><a href="#"><img src="images/delete.png" alt=""></a></td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="coupon">
                        <input type="text" placeholder="Enter Coupon">
                        <input type="submit" value="Apply">

                        <a href="#" class="update">Update Cart</a>
                        <a href="checkout.php" class="proceed">proceed to checkout</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="check-aside">
                    <div class="orders mb20">
                        <h6>Cart totals</h6>
                        <p>Cart Subtotal: <span>$ 4 122</span></p>
                        <p>Shipping and Handling: <span>$ 250</span></p>
                        <p class="bd0"><strong>Order Total: <span>$ 4 372</span></strong></p>
                    </div>
                    <div class="shipping">
                        <h6>CALCULATE sHIPPING</h6>
                        <select class="select">
                            <option value="Select Size">Select Country</option>
                            <option value="Albania">Albania</option>
                            <option value="Australia">Australia</option>
                            <option value="UK">Unitend Kingdom</option>
                            <option value="US">Unidend States</option>
                        </select>
                        <select class="select">
                            <option value="Select Size">Select State</option>
                            <option value="Albania">Albania</option>
                            <option value="Australia">Australia</option>
                            <option value="UK">Unitend Kingdom</option>
                            <option value="US">Unidend States</option>
                        </select>
                        <input type="text" placeholder="Zip/Postcode">
                        <input type="submit" value="UPDATE TOTAL">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
    
</div>

<?php
include("inc/footer.php");
?>
<script>
      var swiper = new Swiper(".mycardslider", {
        effect: "cards",
        grabCursor: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        }
      });
    </script>