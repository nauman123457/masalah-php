<?php 
    include("../classes/all_function.php"); 
$show = $_POST['show'];
$sql = "SELECT P.name, P.picture, P.id, P.discounted_price, P.original_price From products AS P WHERE P.status = 1 ORDER BY id DESC LIMIT ".$show;

$products = $fun->direct_query($sql);
foreach ($products as $value) {
?>
                    <div class="col-md-4 grid-item mb30">
                        <div class="arrival-overlay">
                            <img src="upload/products/<?php echo $value['picture']; ?>" alt="">
                            <!-- <img src="upload/sale.png" alt="" class="sale">  -->
                            <div class="arrival-mask">
                                <a href="#" class="medium-button button-red add-cart">Add to Cart</a>
                                <!-- <a href="#" class="wishlist"><i class="fa fa-heart"></i> Add to Wishlist</a>
                                <a href="#" class="compare"><i class="fa fa-retweet"></i>Add to Compare</a> -->
                            </div>
                        </div>
                        <div class="arr-content">
                            <p><?php echo $value['name']; ?></p>
                            <ul>
                                <?php
                                if ($value['discounted_price'] != 0) {
                                ?>
                                <li><span class="high-price"><?php echo $value['original_price']; ?> Rs.</span></li>
                                <li><span class="low-price"><?php echo $value['discounted_price']; ?> Rs.</span></li>
                            <?php }else{ ?>
                                <li><span class="low-price"><?php echo $value['original_price']; ?> Rs.</span></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
<?php } ?>
