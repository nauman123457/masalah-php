<?php
include("inc/header.php");
?>
<div id="content">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <h1>Exports</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Imports</li>
                    
                </ol>
            </div>
        </div>
       
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <h4>FRESH FRUITS & VEGETABLES</h4>
                <p>BreedX Offer Farm Fresh Organic Vegetable and Processed Seasonal Fruit from Fertile Soil of Pakistan. BreedX Offer Fresh Vegetable including Potato, Onions, Chili, Processed Pease and Fruits like Mangoes, Orange, Guava and Cherries</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="my-card-slider">
                    <div class="swiper mycardslider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                            <img src="images/banner-1.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                            <img src="images/banner-2.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                            <img src="images/banner-3.jpg" alt="">
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <p>Swipe to view Images</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <h4>LIVESTOCK & DAIRY PRODUCTS</h4>
                <p>BreedX Offer Farm Fresh Organic Vegetable and Processed Seasonal Fruit from Fertile Soil of Pakistan. BreedX Offer Fresh Vegetable including Potato, Onions, Chili, Processed Pease and Fruits like Mangoes, Orange, Guava and Cherries</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="my-card-slider">
                    <div class="swiper mycardslider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                            <img src="images/banner-1.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                            <img src="images/banner-2.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                            <img src="images/banner-3.jpg" alt="">
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <p>Swipe to view Images</p>
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