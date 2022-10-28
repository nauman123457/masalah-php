<?php
include("inc/header.php");
?>
<div id="content">


<div class="shop-main container">
    <div class="row">
        <div class="col-md-3">
            <aside class="left-shop">

                <div class="shop-categories mb30">
                    <h1 class="asidetitle">Categories</h1>

                    <ul>
                        <li><a href="#">Masalah	<span>(25)</span></a></li>

                    </ul>
                </div>

                <!-- <div class="shop-price mb30">
                    <h1 class="asidetitle">Price</h1>


                    <p>
                      <input type="text" id="amount">
                    </p>

                     
                    <div id="slider-range"></div>


                </div> -->

              <!--   <div class="brands mb30">
                    <h1 class="asidetitle">Colors</h1>
                    
                    <form action="#">
                    <ul>
                        <li><input type="checkbox" value="Brand">White <span>(15)</span></li>
                        <li><input type="checkbox" value="Brand">Black <span>(31)</span></li>
                        <li><input type="checkbox" value="Brand">Grey <span>(89)</span></li>
                        <li><input type="checkbox" value="Brand">Red <span>(95)</span></li>
                        <li><input type="checkbox" value="Brand">Blue <span>(26)</span></li>
                    </ul>
                    </form>
                    
                </div>
 -->
                <!-- <div class="brands mb30">
                    <h1 class="asidetitle">Sizes</h1>
                    
                    <form action="#">
                    <ul>
                        <li><input type="checkbox" value="Brand">S <span>(15)</span></li>
                        <li><input type="checkbox" value="Brand">M <span>(31)</span></li>
                        <li><input type="checkbox" value="Brand">L <span>(89)</span></li>
                        <li><input type="checkbox" value="Brand">XL <span>(95)</span></li>
                        <li><input type="checkbox" value="Brand">XXL <span>(26)</span></li>
                        <li><input type="checkbox" value="Brand">XXXL <span>(26)</span></li>
                        <li><input type="checkbox" value="Brand">4XL <span>(26)</span></li>
                    </ul>
                    </form>
                    
                </div>

                <div class="brands mb30">
                    <h1 class="asidetitle">Brands</h1>
                    
                    <form action="#">
                    <ul>
                        <li><input type="checkbox" value="Brand">Adidas <span>(15)</span></li>
                        <li><input type="checkbox" value="Brand">Nike <span>(31)</span></li>
                        <li><input type="checkbox" value="Brand">Puma <span>(89)</span></li>
                        <li><input type="checkbox" value="Brand">Armani <span>(95)</span></li>
                        <li><input type="checkbox" value="Brand">Calvin Klein <span>(26)</span></li>
                        <li><input type="checkbox" value="Brand">Raulph Lauren <span>(26)</span></li>
                        <li><input type="checkbox" value="Brand">Envato <span>(26)</span></li>
                    </ul>
                    </form>
                    
                </div> -->

                <div class="tags mb10">
                    <h1 class="asidetitle">Tags</h1>
                    
                    <ul>
                        <li><a href="#">E-commerce</a></li>
                        <li><a href="#">Elegant</a></li>
                        <li><a href="#">Store</a></li>
                        <li><a href="#">Clean</a></li>
                        <li><a href="#">Modern</a></li>
                    </ul>
                    <div class="clear"></div>
                    
                </div>

            </aside>
            <!-- End aside shop -->
        </div>

        <div class="col-md-9">
            <div class="shop-content">
                <div class="toolbar">
                    <div class="sort-select">
                      <label>Sort by</label>
                      <select class="selectBox">
                        <option>Default Sorting</option>
                        <option>High To Low</option>
                        <option>Low To High</option>
                      </select>
                    </div>
                    <div class="sort-select">
                      <label>Show</label>
                      <select name="show" id="show" class="selectBox" onchange="products_list();">
                        <option>5</option>
                        <option>10</option>
                        <option>20</option>
                        <option>30</option>
                        <option>40</option>
                        <option>50</option>
                      </select>
                    </div>
                    <div class="lg-panel htabs">
                         <span>View</span>
                      <a id="list" class="list-btn" href="shop-list.html" ><i class="fa fa-th-list"></i></a> 
                      <a href="shop-grid.html" id="grid" class="grid-btn active"><i class="fa fa-th"></i></a> 
                    </div>
                </div>

                <div class="row shop-grid" id="products">
                  
                </div>
                <!-- <div class="shop-pag">
                    <p class="pag-p">Items <span>1 to 12</span> of 78 Total</p>

                    <div class="right-pag">
                         <div class="sort-select">
                              <label>Show</label>
                              <select class="selectBox">
                                <option>12</option>
                                <option>24</option>
                                <option>36</option>
                              </select>
                        </div>

                        <div class="pagenation clearfix">
                            <ul>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&gt;</a></li>
                            </ul>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- End shopmain -->

</div>
<?php
include("inc/footer.php");
?>
<script type="text/javascript">
$(document).ready(function(){
    products_list();
});
function products_list(){
    var show = $("#show").val();
    $.ajax({
        url: "ajax/list_products.php",
        method: "POST",
        data: {show:show},
        beforeSend: function(){
            $('#products').text("Getting Record....");
        },
        success: function(data){
            $('#products').html(data);
        }
    });
}
</script>