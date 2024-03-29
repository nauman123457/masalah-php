<?php
include("inc/header.php");
?>

<div id="content">

			<div class="checkout">

				<div class="container">

					<div class="check-anchor clearfix mb40">
						<div class="holder">
							<ul>
								<li><a href="#"><i class="fa fa-star"></i> Shopping Cart</a></li>
								<li class="active"><a href="#"><i class="fa fa-star"></i> Checkout</a></li>
								<li><a href="#"><i class="fa fa-star"></i> ORDER COMPLETE <i class="fa fa-star"></i></a></li>
							</ul>
							<div class="holder-border"></div>
						</div>
					</div>

					<div class="checkout-infos">
						<div class="row">
							<div class="col-md-8">

								<div id="accordion-container" class="checkout-accordion"> 

								     <h2 class="accordion-header">1. Checkout Options</h2> 
								     <div class="accordion-content"> 

										<div class="row fisrt-row">
											<div class="col-md-6">
												<h6>New Customer</h6>
												<form class="form-p">
													<input type="radio" name="sex" value="male" checked> <p>Register Account</p>
													<br>
													<input type="radio" name="sex" value="female"> <p>Checkout as Guest</p>

												</form> 
												<p>Register and save time! You will be able to shop faster, fast and easy checkout, easy access to your order history and status.</p>
												<a href="#" class="red-check">Continue</a>
											</div>
											<div class="col-md-6">
												<h6>Returning Customer</h6>
												<form>
													<label>Name<span>*</span></label>
													<input type="text">
													<label>Password<span>*</span></label>
													<input type="text">
												</form>
												<a href="#" class="red-check2">Login</a>
												<a href="#" class="forgot">Forgot your password?</a>
											</div>
										</div>

									</div>

									
									<h2 class="accordion-header">2. BILLING INFORMATION</h2>
									<div class="accordion-content second-row">

										<label>Country <span>*</span></label>
										<select class="select">
											<option value="Select Size">Select Country</option>
											<option value="Albania">Albania</option>
											<option value="Australia">Australia</option>
											<option value="UK">Unitend Kingdom</option>
											<option value="US">Unidend States</option>
										</select>

										<div class="row">
											<div class="col-md-6">
												<label>First Name <span>*</span></label>
												<input type="text">
											</div>
											<div class="col-md-6">
												<label>Last Name <span>*</span></label>
												<input type="text">
											</div>
										</div>

										<label>Company Name</label>
										<input type="text">

										<label>Address <span>*</span></label>
										<input type="text" placeholder="Street Address">
										<input type="text" placeholder="Apartment. Suite, Unit etc. (optional)">

										<label>Town / City <span>*</span></label>
										<select class="select">
											<option value="Select City">Select City</option>
											<option value="Albania">Albania</option>
											<option value="Australia">Australia</option>
											<option value="UK">Unitend Kingdom</option>
											<option value="US">Unidend States</option>
										</select>

										<div class="row">
											<div class="col-md-6">
												<label>Country / State</label>
												<input type="text">
											</div>
											<div class="col-md-6">
												<label>Postcode <span>*</span></label>
												<input type="text">
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<label>Email Address <span>*</span></label>
												<input type="text">
											</div>
											<div class="col-md-6">
												<label>phone <span>*</span></label>
												<input type="text">
											</div>
										</div>

									</div>

									<h2 class="accordion-header">3. shipping INFORMATION</h2>
									<div class="accordion-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur sunt, placeat quo nesciunt fugiat aspernatur magnam ipsam quos recusandae voluptatem deleniti asperiores eveniet. Quia, sint quibusdam. Officia, cupiditate. Nulla animi vero nisi expedita porro tempora eveniet odio suscipit omnis a, aliquam facilis esse, aliquid, in ipsa! Numquam corporis vero fugiat harum veritatis saepe placeat expedita doloribus nobis similique quasi ipsa, ex praesentium rerum, culpa eaque, voluptatem rem quam obcaecati reprehenderit odio autem! Incidunt delectus cum inventore hic provident porro veniam iusto quisquam possimus labore ipsum, consectetur atque dolorem aperiam ad explicabo a quae nam nesciunt mollitia quidem nostrum, eaque! Eaque.</p>
									</div>

									<h2 class="accordion-header">4. Shipping method</h2>
									<div class="accordion-content third-row">
										<ul>
											<li><a href="#"><p>FedEx</p> <span>100$</span></a></li>
											<li><a href="#"><p>DHL</p> <span>76$</span></a></li>
											<li><a href="#"><p>US Express</p> <span>120$</span></a></li>
										</ul>
									</div>

									<h2 class="accordion-header">5. complete order</h2>
									<div class="accordion-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur sunt, placeat quo nesciunt fugiat aspernatur magnam ipsam quos recusandae voluptatem deleniti asperiores eveniet. Quia, sint quibusdam. Officia, cupiditate. Nulla animi vero nisi expedita porro tempora eveniet odio suscipit omnis a, aliquam facilis esse, aliquid, in ipsa! Numquam corporis vero fugiat harum veritatis saepe placeat expedita doloribus nobis similique quasi ipsa, ex praesentium rerum, culpa eaque, voluptatem rem quam obcaecati reprehenderit odio autem! Incidunt delectus cum inventore hic provident porro veniam iusto quisquam possimus labore ipsum, consectetur atque dolorem aperiam ad explicabo a quae nam nesciunt mollitia quidem nostrum, eaque! Eaque.</p>
									</div>
								


								</div>
							</div>
							<div class="col-md-4">
								<div class="check-aside">
									<div class="orders second-order mb20">
										<h6>Your Orders</h6>

										<div class="order-box">
											<p>Grey California Dress <span>$ 3 199</span></p>
											<div class="quantity">Quantity: 1</div>
										</div>

										<div class="order-box">
											<p>Brown Leather Hand Bag <span>$ 999</span></p>
											<div class="quantity">Quantity: 1</div>
										</div>

										<div class="order-box">
											<p>Cart Subtotal: <span>$ 4 122</span></p>
										</div>

										<div class="order-box mb20">
											<p>Shipping and Handling: <span>$ 250</span></p>
										</div>

									
										<p><strong>Total: <span>$ 4 372</span></strong></p>

									</div>

									<div class="payment-method">
										<h6>Payment Method</h6>
										<form>
											<input type="radio" name="pay" value="direct" checked> <p>Direct Bank Transfer</p>
											<p class="mb10">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped until the funds have cleared in our account.</p>
											<br>
											<input type="radio" name="pay" value="cheque"><p class="mb10">Cheque payment</p>
											<br>
											<input type="radio" name="pay" value="paypal"><p>PayPal</p> <img src="upload/paypal.png" alt="">
											<input type="submit" value="Place Order">
										</form> 
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
			<!-- End Product Single -->
			
		</div>
<?php
include("inc/footer.php");
?>