<style>
    /* CSS to make the calendar smaller */
    #calendar {
        max-width: 650px; /* Adjust the maximum width as needed */
       
        margin: 0 auto; /* Center the calendar horizontally */

        
    }
    .fc-day.selected {
        background-color: #28a745 !important;
        color: #fff;
        position: relative; /* Ensure relative positioning for the selected box */
    }
    .fc-day.selected:hover {
        background-color: #218838 !important;
    }
    .fc-day.selected .fc-daygrid-day-top {
        text-align: center; /* Center the content horizontally */
        position: relative; /* Ensure relative positioning */
        color: #000; /* Set the color of the calendar number to black */
    }
    .fc-day.selected .fc-daygrid-day-number {
        color: #000; /* Set the color of the calendar number to black */
    }
    .fc-day.selected .fc-daygrid-day-top:after,
    .fc-day.selected .selected-time {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 12px;
        font-weight: bold;
        color: #fff;
        background-color: #007bff;
        padding: 5px 10px;
        border-radius: 5px;
        white-space: nowrap; /* Prevent line break */
        z-index: 1; /* Ensure the boxes are on top */
    }
    .fc-day.selected .selected-time {
        top: calc(50% + 20px); /* Adjust vertical position to be below "Booked" text */
    }
    .fc-day.selected .fc-daygrid-day-top:after {
        content: "Booked"; /* Add "Booked" text */
        z-index: 2; /* Ensure "Booked" text is above the selected time */
    }
    .gcash-logo {
        width: 100px;
        margin-bottom: 20px;
    }

    .step {
        text-align: center;
    }
       /* Update button styles */
       .btn-primary {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-primary:hover {
        background-color: #218838;
        border-color: #218838;
    }

    /* Update modal header */
    .modal-header {
        background-color: #28a745;
        color: #fff;
        border-bottom: none;
    }

    /* Update modal close button */
    .modal-header .close {
        color: #fff;
    }

    /* Update modal body background */
    .modal-body {
        background-color: #f8f9fa;
    }

    /* Update modal footer */
    .modal-footer {
        border-top: none;
    }

     /* Custom styling for the "Place Service" button */
     .place-service-btn {
        background-color: blue;
        color: white;
        border-color: blue;
        transition: background-color 0.3s ease;
    }

    /* Hover effect */
    .place-service-btn:hover {
        background-color: darkblue;
    }
    .terms-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  .radio-label {
    display: block;
    margin-bottom: 10px;
  }
  .radio-label input[type="radio"] {
    margin-right: 5px;
  }
</style>
<style>
   /* Update GCash button styles */
.gcash-button {
    background-color: #007bff; /* Blue color for GCash button */
    border-color: #007bff;
    color: #fff;
    margin-top: 20px;
    margin-bottom: 15px;
    display: inline-flex; /* Use inline-flex to center the button */
    align-items: center;
    justify-content: center;
    width: 250px; /* Limit the maximum width of the button */
    height: 38px; /* Limit the maximum width of the button */
}

.gcash-button:hover {
    background-color: #0056b3; /* Darker blue on hover */
    border-color: #0056b3;
}

/* Update GCash logo */
.gcash-logo {
    height: auto; /* Make the logo responsive */
    max-width: 40%; /* Limit the maximum width of the logo */
    margin-right: 10px; /* Add margin to separate the logo from text */
    margin-top: 20px;
}

    </style>
<style>
    /* Style for the container */
    .input-container {
        position: relative;
        margin-top: 10px;
    }

    /* Style for the input field */
    #gcash_number {
        border: none;
        border-bottom: 1px solid #000;
        outline: none;
        padding: 5px;
        box-sizing: border-box;
        background-color: transparent;
        text-align: center; /* Center align the text */
    }

    #auth_code {
    border: none;
    width: 12ch; /* Increase the width as needed */
    background: 
      repeating-linear-gradient(90deg, 
        dimgrey 0, 
        dimgrey 1.5ch, 
        transparent 0, 
        transparent 2ch) 
      0 100%/100% 2.5px no-repeat;
    color: dimgrey;
    font: 5ch consolas, monospace;
    letter-spacing: .8ch; /* Adjust the spacing between characters */
    text-align: center;
    margin-bottom: 10px; /* Adjust as needed */
    }

    #mpin::placeholder {
    font-size: 15px; /* Adjust the font size as needed */
    color: gray; /* Optional: change the color of the placeholder text */
    }

    #auth_code:focus {
        outline: none;
        color: dodgerblue;
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">





<!-- Gcash Modal -->

<div class="modal fade" id="newModelId" tabindex="-1" role="dialog" aria-labelledby="newModelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background: linear-gradient(to bottom, #054ce1 50%, #ffffff 50%);">
            <div class="modal-header" style="color:white;background-color:#022DB8;">
                <div class="row"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:#e8e9ee; max-height: 500px; overflow-y: auto; background: linear-gradient(to bottom, #054ce1 50%, #ffffff 50%);">
                <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                    <div style="text-align: center; margin-bottom:20px;">
                        <img src="img/gcashwhite.png" alt="GCash" style="height: 50px;">
                    </div>
                    <div class="card" style="width: 400px; margin-bottom:70px; padding: 20px; background-color: #ffffff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);">
                        <form class="col">
                            <div style="display: flex; align-items: center;">
                                <label for="merchant" style="color:#5A5A5A; flex: 1;">Merchant</label>
                                <span style="flex: 2;color: #141414;">AUB Sunzy</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <label for="amount" style="color:#5A5A5A; flex: 1;">Amount Due</label>
                                <span id="total_ticket_price1" style="flex: 2;color:#054ce1;" >
                                <?php 
                    if(isset($_settings)) {
                        $gtotal = 0;
                        $vendors = $conn->query("SELECT * FROM `vendor_list` where id in (SELECT vendor_id from product_list where id in (SELECT product_id FROM `cart_list` where client_id ='{$_settings->userdata('id')}')) order by `shop_name` asc");
                        while($vrow=$vendors->fetch_assoc()):    
                        $vtotal = $conn->query("SELECT sum(c.quantity * p.price) FROM `cart_list` c inner join product_list p on c.product_id = p.id where c.client_id = '{$_settings->userdata('id')}' and p.vendor_id = '{$vrow['id']}'")->fetch_array()[0];   
                        $vtotal = $vtotal > 0 ? $vtotal : 0;
                        $gtotal += $vtotal;

                    ?>
                  
                     
                    <?php endwhile; ?>
                    
                    <?php } ?>
                                ₱
                                <?= format_num($gtotal) ?>
                            </span>
                            </div>
                            <br><hr style="border-top: 1px solid #5A5A5A;">
                            <div style="text-align: center; margin-top: 20px; color: black;">
                                <strong>Login to pay with GCash</strong>
                            </div>
                            <br>
                            <div class="input-container" style="text-align: center; margin-top: 20px; color: black;">
                                <input type="text" id="gcash_number" name="gcash_number" placeholder="Enter Mobile Number" required pattern="[0-9]{11}" title="Please enter a valid 11-digit number" maxlength="11">
                            </div>
                        </form>
                        <center><button class="btn btn-primary" style="background-color:#054ce1; border-radius: 50px; padding: 10px 120px; font-size: 18px;" onclick="proceedToNextModal1()">Next</button></center>

                    </div>
                    
                    <div style="margin-top: 10px; text-align: center;">
                        <span style="color: #141414;">Don't have a GCash account? </span>
                        <a href="https://m.gcash.com/gcashapp/gcash-promotion-web/2.0.0/index.html#/" style="text-decoration: underline; color: #054ce1;">Register now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Gcash Modal 2 -->

<div class="modal fade" id="newModelId1" tabindex="-1" role="dialog" aria-labelledby="newModelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background: linear-gradient(to right, #054ce1 50%, #ffffff 50%);">
            <div class="modal-header" style="color:white;background-color:#022DB8;">
                <div class="row"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:#e8e9ee; max-height: 500px; overflow-y: auto; background: linear-gradient(to bottom, #054ce1 50%, #ffffff 50%);">
                <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                    <div style="text-align: center; margin-bottom:20px;">
                        <img src="img/gcashwhite.png" alt="GCash" style="height: 50px;">
                    </div>
                    <div class="card" style="width: 400px; margin-bottom:70px; padding: 20px; background-color: #ffffff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);">
            <form class="col">
              <div style="text-align: center; margin-top: 20px; color: black;">
                <strong>Login to pay with GCash</strong>
                <div style="color: #5A5A5A; font-size: 12px;"><strong>Enter the 6-digit authentication code sent to your registered mobile number.</strong></div>
              </div>
              <div class="input-container" style="text-align: center; margin-top: 10px;">
                <input type="text" id="auth_code" name="auth_code" pattern="[0-9]{6}" title="Please enter a 6-digit number" maxlength="6" required>
              </div>
                <div id="resend_text" style="text-align: center; margin-top: 5px; color: #5A5A5A;">Didn't get the code? Resend <span id="countdown" style="text-align: center; color: #5A5A5A;">300</span>s</div>
            </form>
            <br>
            <center><button class="btn btn-primary" style="background-color:#054ce1; border-radius: 50px; padding: 10px 120px; font-size: 18px;" onclick="proceedToNextModal2()">Next</button></center>
      
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Gcash Modal 3 -->

<div class="modal fade" id="newModelId2" tabindex="-1" role="dialog" aria-labelledby="newModelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background: linear-gradient(to bottom, #054ce1 50%, #ffffff 50%);">
            <div class="modal-header" style="color:white;background-color:#022DB8;">
                <div class="row"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:#e8e9ee; max-height: 500px; overflow-y: auto; background: linear-gradient(to bottom, #054ce1 50%, #ffffff 50%);">
                <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                    <div style="text-align: center; margin-bottom:20px;">
                        <img src="img/gcashwhite.png" alt="GCash" style="height: 50px;">
                    </div>
                    <div class="card" style="width: 400px; margin-bottom:70px; padding: 20px; background-color: #ffffff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);">
            <form class="col">
              <div style="text-align: center; margin-top: 20px; color: black;">
                <strong>Login to pay with GCash</strong>
                <div style="color: #5A5A5A; font-size: 12px;"><strong>Enter your 4-digit MPIN.</strong></div>
              </div>
              <div class="input-container" style="text-align: center; margin-top: 10px;">
                   <input type="password" id="mpin" name="mpin" pattern="[0-9]{4}" placeholder="Enter your MPIN." title="Please enter a 4-digit MPIN" maxlength="4" required 
                    style="background: transparent; border: none; outline: none; font-size: 35px; text-align: center; border-bottom: 1px solid black;">
              </div>
            </form>
            <br>
            
            <center><button class="btn btn-primary" style="background-color:#054ce1; border-radius: 50px; padding: 10px 120px; font-size: 18px;" onclick="proceedToNextModal3()">Next</button></center>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Gcash Modal 4-->


<div class="modal fade" id="newModelId3" tabindex="-1" role="dialog" aria-labelledby="newModelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background: linear-gradient(to bottom, #054ce1 50%, #ffffff 50%);">
            <div class="modal-header" style="color:white;background-color:#022DB8;">
                <div class="row"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:#e8e9ee; max-height: 500px; overflow-y: auto; background: linear-gradient(to bottom, #054ce1 50%, #ffffff 50%);">
                <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                    <div style="text-align: center; margin-bottom:20px;">
                        <img src="img/gcashwhite.png" alt="GCash" style="height: 50px;">
                    </div>
                    <div class="card" style="width: 400px; margin-bottom:70px; padding: 20px; background-color: #ffffff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);">
                        <form class="col">
                            <div style="display: flex; align-items: center; text-align: center;">
                                <label style="color:#00008B; flex: 1;"><strong>AUB Online 2</strong></label>
                            </div>
                            <br>
                            <div style="display: flex; align-items: center;">
                                <label style="color:#5A5A5A; font-size: 15px; flex: 1;"><strong>PAY WITH</strong></label>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <label for="merchant" style="color:#5A5A5A; flex: 1;">GCash</label>
                                <span style="flex: 2; color: #141414;">₱
                                    
                                    
                                <?= format_num($gtotal) ?>
                                    
                                </span>
                                <input type="radio" style="color:#054ce1; background-color:#054ce1;" name="payment_method" style="margin-left: 10px;" checked>
                            </div>
                            <br>
                            <div style="display: flex; align-items: center;">
                                <label style="color:#5A5A5A; font-size: 15px; flex: 1;"><strong>YOU ARE ABOUT TO PAY</strong></label>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <label for="merchant" style="color:#5A5A5A; flex: 1;">Amount</label>
                                
                                <span id="total_ticket_price2" style="flex: 2; color: #141414;">&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
                                ₱
                                <?= format_num($gtotal) ?>
                            </span>
                               
                                <span style="flex: 2; color: #141414;">
                            </div>
                            <div style="display: flex; align-items: center;">
                                <label for="merchant" style="color:#5A5A5A; flex: 1;">Discount</label>
                                <span style="flex: 2; color: #5A5A5A;">No available voucher</span>
                            </div>
                            <br>
                            <hr style="border-top: 1px solid #5A5A5A;">
                            <div style="display: flex; align-items: center;">
                                <label style="color:#5A5A5A; font-size: 15px; flex: 1;"><strong>Total</strong></label>
                                <span id="total_ticket_price3" style="flex: 2; color: #141414; font-size: 25px; font-weight: bold;"></span>
                            </div>
                            <br><br>
                            <div style="display: flex; align-items: center; text-align: center;">
                                <label style="color:#5A5A5A; font-size: 12px; flex: 1;"><strong>Please review to ensure that the details are correct before you proceed.</strong></label>
                            </div>
                        </form>
                      
                        <center><button class="btn btn-primary" style="background-color:#054ce1; border-radius: 50px; padding: 10px 120px; font-size: 18px;" onclick="closeModalAndShowCheckMark()">Pay Now</button></center>
                           
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="content py-3">
    <div class="card card-outline card-primary shadow rounded-0">
        <div class="card-header">
            <div class="h5 card-title">Checkout</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form action="" id="checkout-form">
                       
                        <div class="form-group">
                            <label for="delivery_address" class="control-label">House Address</label>
                            

                            <textarea name="delivery_address" id="delivery_address" rows="4" class="form-control rounded-0" required><?= isset($_settings) ? $_settings->userdata('address') : '' ?></textarea>

                        </div>

                      <!-- Calendar with integrated time picker -->
                      <div id="calendar"></div>
                        <!-- End Calendar with integrated time picker -->
                       
                        <!-- Hidden inputs to store selected date and time -->
                        <input type="hidden" id="booking_date" name="booking_date">
                        <input type="hidden" id="booking_time" name="booking_time">
                        <!-- End Hidden inputs -->

                       
                    
                </div>

                 
                <div class="col-md-4">
                    <div class="row" id="summary">
                    <div class="col-12 border">
                        <h2 class="text-center"><b>Summary</b></h2>
                    </div>
                    <?php 
                    if(isset($_settings)) {
                        $gtotal = 0;
                        $vendors = $conn->query("SELECT * FROM `vendor_list` where id in (SELECT vendor_id from product_list where id in (SELECT product_id FROM `cart_list` where client_id ='{$_settings->userdata('id')}')) order by `shop_name` asc");
                        while($vrow=$vendors->fetch_assoc()):    
                        $vtotal = $conn->query("SELECT sum(c.quantity * p.price) FROM `cart_list` c inner join product_list p on c.product_id = p.id where c.client_id = '{$_settings->userdata('id')}' and p.vendor_id = '{$vrow['id']}'")->fetch_array()[0];   
                        $vtotal = $vtotal > 0 ? $vtotal : 0;
                        $gtotal += $vtotal;

                    ?>
                    <div class="col-12 border item">
                        <b class="text-muted"><small><?= $vrow['code']." - ".$vrow['shop_name'] ?></small></b>
                        <div class="text-right"><b><?= format_num($vtotal) ?></b></div>
                    </div>
                     
                    <?php endwhile; ?>
                    <div class="col-12 border">
                        <b class="text-muted">Grand Total</b>
                        <div class="text-right h3" id="total"><b><?= format_num($gtotal) ?></b></div>
                    </div>
                    <?php } ?>
                    <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">
                    
                    <div class="widget-body">
                        
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <center><h5>Payment Method</h5></center> </div><br>
                                            <!-- Button to trigger the modal -->

                                            <!-- Button to trigger the modal gcash-->
<div class="text-center">
    <button type="button" class="btn btn-primary gcash-button" id="proceed_to_payment_btn" data-toggle="modal" data-target="#gcashModal">
        <img src="img/gcash.png" alt="GCash Logo" class="gcash-logo">
        
    </button>
    <span id="paypal-button" ></span>
    <p class="text-xs-center">
    <input type="submit" name="submit" class="btn btn-outline-success btn-block place-service-btn" value="Place Order">
</p>
    <span id="gcashCheckMark" style="display: none; font-size: 24px;">&#10004;</span></div>
    
</div>

                                        <!-- <div class="cart-totals-fields">
										
                                            <table class="table">
											<tbody>
                                          
												 
											   
                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td> <?php echo "₹".$item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Delivery Charges</td>
                                                        <td>Free</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Total</strong></td>
                                                        <td class="text-color"><strong> <?php echo "₹".$item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>
												
												
												
												
                                            </table>
                                        </div> -->
                                    </div>
                                    <div class="payment-option">
                                    <div class="form-group text-center">
                <span id="paypal-button" ></span>
            </div>
            <!-- <div class="terms-container">
  <p>1. Our cleaning services are available within the area of Caloocan City only.</p>
  <p>2. Our staff are bound by confidentiality agreements to ensure the privacy and security of our clients' homes or business premises. We respect your confidentiality and will not disclose any sensitive information obtained during the cleaning process to third parties without your consent, unless required by law.</p>



</div> -->
            <!-- <p class="text-xs-center">
    <input type="submit" name="submit" class="btn btn-outline-success btn-block place-service-btn" value="Place Order">
</p> -->

                                        <div class="form-group text-right">
                          
                        </div>
                                    </div>
									</form>

                                </div>
                            </div>
                       
                    </div>
                </div>
				 </form>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_settings)) {
    $gtotal = 0;
    $vendors = $conn->query("SELECT * FROM `vendor_list` where id in (SELECT vendor_id from product_list where id in (SELECT product_id FROM `cart_list` where client_id ='{$_settings->userdata('id')}')) order by `shop_name` asc");
    while($vrow=$vendors->fetch_assoc()):    
        $vtotal = $conn->query("SELECT sum(c.quantity * p.price) FROM `cart_list` c inner join product_list p on c.product_id = p.id where c.client_id = '{$_settings->userdata('id')}' and p.vendor_id = '{$vrow['id']}'")->fetch_array()[0];   
        $vtotal = $vtotal > 0 ? $vtotal : 0;
        $gtotal += $vtotal;
    endwhile;
}
?>

<!-- HTML for the receipt modal -->
<div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="receiptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="receiptModalLabel">Receipt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body receipt-body" id="receiptContent">
                <div class="receipt-header">
                    <h4>Sunzy</h4>
                    <p>123 Main Street, Caloocan City</p>
                    <p>Phone: 123-456-7890</p>
                    <p>Email: sparklecleaningservices@gmail.com</p>
                    <p>Date: <?php echo date("F j, Y"); ?></p>
                    <p>Order ID: #20240109</p>
                </div>
                <hr>
                <div class="receipt-items">
                    <h5>Service:</h5>
                    <?php
                    if(isset($_settings)) {
                        $vendors = $conn->query("SELECT * FROM `vendor_list` where id in (SELECT vendor_id from product_list where id in (SELECT product_id FROM `cart_list` where client_id ='{$_settings->userdata('id')}')) order by `shop_name` asc");
                        while($vrow=$vendors->fetch_assoc()):    
                            $items = $conn->query("SELECT p.name, c.quantity, p.price FROM `cart_list` c inner join product_list p on c.product_id = p.id where c.client_id = '{$_settings->userdata('id')}' and p.vendor_id = '{$vrow['id']}'");
                            while($item=$items->fetch_assoc()):
                    ?>
                        <div class="item">
                            <span class="item-name"><?php echo $item['name']; ?> </span>
                            <span class="item-price">₱<?php echo format_num($item['quantity'] * $item['price']); ?></span>
                        </div>
                    <?php endwhile; ?>
                        <div class="vendor-total">
                            <strong><?php echo $vrow['shop_name']; ?> Total:</strong>
                            <strong>₱<?php echo format_num($vtotal); ?></strong>
                        </div>
                        <hr>
                    <?php endwhile; } ?>
                </div>
                <div class="receipt-total">
                    <span><strong>Grand Total:</strong></span>
                    <span class="total-price"><strong>₱<?php echo format_num($gtotal); ?></strong></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="printReceiptBtn">Print Receipt</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- CSS for printing the receipt -->
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #receiptContent, #receiptContent * {
            visibility: visible;
        }
        #receiptContent {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            padding: 20px;
        }
    }

    /* Additional styling for better visual presentation */
    .modal-body.receipt-body {
        font-family: Arial, sans-serif;
        color: #333;
    }

    .receipt-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .receipt-header h4 {
        margin: 0;
        font-size: 24px;
        font-weight: bold;
    }

    .receipt-header p {
        margin: 2px 0;
        font-size: 14px;
    }

    .receipt-items {
        margin: 20px 0;
    }

    .receipt-items h5 {
        font-size: 18px;
        font-weight: bold;
    }

    .receipt-items .item {
        display: flex;
        justify-content: space-between;
        margin: 10px 0;
        font-size: 16px;
    }

    .vendor-total {
        display: flex;
        justify-content: space-between;
        font-size: 16px;
        margin-top: 10px;
        font-weight: bold;
    }

    .receipt-total {
        display: flex;
        justify-content: space-between;
        font-size: 18px;
        font-weight: bold;
        margin-top: 20px;
    }

    .modal-footer {
        display: flex;
        justify-content: space-between;
    }

    .btn {
        font-size: 14px;
        padding: 10px 20px;
    }
</style>

<!-- JavaScript for printing the receipt -->
<script>
    // Print receipt functionality
    $('#printReceiptBtn').click(function () {
        window.print();
    });
</script>




<?php require_once('./config.php') ?>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>
<script>
    // Function to close the modal and show the check mark
    function closeModalAndShowCheckMark() {
        // Close the modal
        $('#newModelId3').modal('hide');

        // Show the check mark
        document.getElementById('gcashCheckMark').style.display = 'inline-block';
    }
</script>
<script>
    document.getElementById('proceed_to_payment_btn').addEventListener('click', function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Show the GCash modal
        $('#newModelId').modal('show');
    });
</script>

<script>
    document.getElementById('gcash_number').addEventListener('input', function() {
        let input = this.value;

        input = input.replace(/\D/g, '');

        input = input.slice(0, 11);

        this.value = input;
    });
</script>

<script>

// Function to check if the radio button is checked before proceeding
function proceedToNextModal() {

    if (document.getElementById('payment_method_cash').checked) {

        $('#modelId5').modal('hide');
        $('#newModelId').modal('show');
    } else {

        alert('Please select a payment method.');
    }
}
</script>

<script>

function proceedToNextModal1() {
    // Retrieve the value of the input field
    var gcashNumber = document.getElementById('gcash_number').value;

    // Check if the value meets the required conditions (not empty)
    if (gcashNumber.trim() !== '') {
        // If the input field is not empty, proceed to the next modal
        $('#newModelId').modal('hide');
        $('#newModelId1').modal('show');
    } else {
        // If the input field is empty, display an alert to the user
        alert('Please enter a GCash number.');
    }
}

</script>

<script>

function proceedToNextModal2() {
    // Retrieve the value of the input field
    var gcashNumber = document.getElementById('auth_code').value;

    // Check if the value meets the required conditions (not empty)
    if (gcashNumber.trim() !== '') {
        // If the input field is not empty, proceed to the next modal
        $('#newModelId1').modal('hide');
        $('#newModelId2').modal('show');
    } else {
        // If the input field is empty, display an alert to the user
        alert('Please enter the Authentication number.');
    }
}

</script>

<script>

function proceedToNextModal3() {
    // Retrieve the value of the input field
    var gcashNumber = document.getElementById('auth_code').value;

    // Check if the value meets the required conditions (not empty)
    if (gcashNumber.trim() !== '') {
        // If the input field is not empty, proceed to the next modal
        $('#newModelId2').modal('hide');
        $('#newModelId3').modal('show');
    } else {
        // If the input field is empty, display an alert to the user
        alert('Please enter the Authentication number.');
    }
}

</script>

<script>
  document.getElementById('mpin').addEventListener('input', function() {
    var inputValue = this.value;
    var hiddenInput = '';

    for (var i = 0; i < inputValue.length; i++) {
      hiddenInput += '•'; // Replace each character with a black dot
    }

    this.value = hiddenInput; // Set the value of the input field to the black dots
  });
</script>


<script>
  var countdownElement = document.getElementById('countdown');

  // Set the initial time remaining
  var timeRemaining = 300;
  countdownElement.textContent = timeRemaining;

  // Start the countdown
  var countdownInterval = setInterval(function() {
    timeRemaining--;
    countdownElement.textContent = timeRemaining;
    
    // Check if the time has reached 0
    if (timeRemaining <= 0) {
      clearInterval(countdownInterval);
      // Optionally, you can handle the timer reaching 0 here, such as disabling the "Resend" button
    }
  }, 1000);
</script>
<script>
    $(document).ready(function () {
        // Function to show the next step
        $(".next-step").click(function () {
            var $currentStep = $(this).closest(".step");
            $currentStep.hide();
            $currentStep.next().show();
        });

        // Function to show the previous step
        $(".prev-step").click(function () {
            var $currentStep = $(this).closest(".step");
            $currentStep.hide();
            $currentStep.prev().show();
        });
    });
</script>
<style>
    #uni_modal .modal-footer{
        display:none
    }
</style>
<div class="form-group text-center">
                <span id="paypal-button" ></span>
            </div>
<script>
    paypal.Button.render({
    env: 'sandbox', // change for production if app is live,
 
        //app's client id's
	  client: {
        // for test only
        sandbox:    'AaLfPsQjmNDyOK1LRmj_9zyByuBlrSHxoxOdKW3ZfbODHawG11I8CAc0uKzdQ8wraEeKBfzhslLGkVUi',
        // for live only
        //production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
    },
 
    commit: true, // Show a 'Pay Now' button
 
    style: {
      layout:  'vertical',
      color:   'blue',
      shape:   'rect',
      label:   'paypal'
    },
 
    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                    	//total purchase
                        amount: { 
                        	total: $('fieldset#pay-field').find('[name="payable_amount"]').val(), 
                        	currency: 'PHP' 
                        }
                    }
                ]
            }
        });
    },
 
    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function(payment) {
    		// //sweetalert for successful transaction
    		// swal('Thank you!', 'Paypal purchase successful.', 'success');
           var tracking_code = data.paymentID;
           $('fieldset#pay-field').find('[name="payment_code"]').val(tracking_code)
           $('#transaction_form').submit();
        });
    },
    onError: (err) => {
    console.error('error from the onError callback', err);
    
  }
 
}, '#paypal-button');
$(function(){
    $('#uni_modal .select2').select2({
        placeholder:"Please Select Here",
        dropdownParent: $("#uni_modal")
    })
    $('#next').click(function(){
        var check = new Promise((resolve,reject)=>{
            $('fieldset#information').find('input,select').each(function(){
                if($(this).val() == ''){
                    alert_toast(" All fields are required.","warning")
                    reject();
                }
            })
            resolve()
        })
        check.then(function(){

            $('#next').addClass('d-none')
            $("#back").removeClass('d-none')
            $("fieldset#information").addClass('d-none')
            $("fieldset#pay-field").removeClass('d-none')
        })

    })
    $('#back').click(function(){
        $(this).addClass('d-none')
        $("#next").removeClass('d-none')
        $("fieldset#information").removeClass('d-none')
        $("fieldset#pay-field").addClass('d-none')
    })
    $('#amount_to_pay').on('input',function(){
        var amount = $(this).val() > 0 ? $(this).val() :0;
        $.ajax({
            url:_base_url_+"classes1/Master.php?f=get_fee",
            method:'POST',
            data:{amount : amount },
            dataType:'json',
            error:err=>{
                console.log(err)
                start_loader()
                alert("An error occured. Try to refresh the page");
            },
            success:function(resp){
                if(resp.status == 'success'){
                    $('#pay_amount').text(parseFloat(amount).toLocaleString('en-US'))
                    $('#fee').text(parseFloat(resp.fee).toLocaleString('en-US'))
                    $('[name="fee"]').val(parseFloat(resp.fee))
                    $('#payable_amount').text(parseFloat(resp.payable).toLocaleString('en-US'))
                    $('[name="payable_amount"]').val(parseFloat(resp.payable))
                }
            }
        })
    })
    $('#transaction_form').submit(function(e){
        e.preventDefault();
        var _this = $(this)
        $('.err-msg').remove();
        start_loader();
        $.ajax({
            url:_base_url_+"classes1/Master.php?f=save_transaction",
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            dataType: 'json',
            error:err=>{
                console.log(err)
                alert_toast("An error occured",'error');
                end_loader();
            },
            success:function(resp){
                if(typeof resp =='object' && resp.status == 'success'){
                    location.reload();
                }else if(resp.status == 'failed' && !!resp.msg){
                    var el = $('<div>')
                        el.addClass("alert alert-danger err-msg").text(resp.msg)
                        _this.prepend(el)
                        el.show('slow')
                        $("html, body,.modal").animate({ scrollTop: 0 }, "fast");
                        end_loader()
                }else{
                    alert_toast("An error occured",'error');
                    end_loader();
                    console.log(resp)
                }
            }
        })
    })
})
</script>
<!-- <script>
    $(document).ready(function() {
        // Initialize FullCalendar
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true, // Allow users to select dates
            select: function(info) {
                // Clear previously selected time and time picker
                $('#booking_time').val('');
                $('input#timepicker').remove();

                // Clear previously booked dates and times
                $('.selected').removeClass('selected').find('.selected-time').remove();
                $('#booking_date').val('');

                // Prompt user to select time
                $('#booking_date').val(info.startStr); // Set selected date in hidden input
                var selectedDateCell = $(info.jsEvent.target).closest('.fc-daygrid-day');
                var timeInput = $('<input>').attr('type', 'text').attr('id', 'timepicker').addClass('form-control');
                timeInput.timepicker({
                    'timeFormat': 'h:i A', // Set time format
                    'minTime': '8:00 AM', // Set minimum time
                    'maxTime': '8:00 PM', // Set maximum time
                    'step': 15 // Set time step to 15 minutes
                }).on('change', function() {
                    // Handle time selection
                    var selectedTime = $(this).val();
                    $('#booking_time').val(selectedTime); // Set selected time in hidden input
                    var timeDisplay = $('<div>').addClass('selected-time').text(selectedTime);
                    selectedDateCell.find('.fc-daygrid-day-top').append(timeDisplay); // Display selected time under the "Booked" text
                    timeInput.hide(); // Hide the time selector after selecting the time
                });
                selectedDateCell.addClass('selected');
                selectedDateCell.append(timeInput);
                timeInput.timepicker('show');
            }
        });
        calendar.render();
    });
</script> -->



<style>
    /* CSS to highlight selected date */
    .selected-date {
        background-color: #007bff;
        color: #fff;
    }

    /* CSS to highlight selected time */
    .selected-time {
        background-color: #007bff;
        color: #fff;
    }
</style>
<script>
function loadCheckoutForm() {
    $.ajax({
        url: 'checkout.php', // Adjust the path if needed
        method: 'GET',
        dataType: 'html',
        error: function (err) {
            console.error(err);
        },
        success: function (resp) {
            $('#checkoutContainer').html(resp);
        }
    });
}

// Add event listener for modal open event
$('#cartModal').on('shown.bs.modal', function (e) {
    loadCartList(); // Load cart list when modal is opened
    loadCheckoutForm(); // Load checkout form when modal is opened
});
    $('#checkout-form').submit(function(e){
        e.preventDefault()
        var _this = $(this)
        if(_this[0].checkValidity() == false){
            _this[0].reportValidity()
            return false;
        }
        if($('#summary .item').length <= 0){
            alert_toast("There is no service listed in the cart yet.",'error')
            return false;
        }
        $('.pop_msg').remove();
        var el = $('<div>')
            el.addClass("alert alert-danger pop_msg")
            el.hide()
        start_loader()
        $.ajax({
    url: _base_url_ + 'classes/Master.php?f=place_order',
    method: 'POST',
    data: _this.serialize(),
    dataType: 'json',
    error: err => {
        console.error(err);
        alert_toast("An error occurred.", 'error');
        end_loader();
    },
    success: function(resp) {
        if (resp.status == 'success') {
            // Show the receipt modal
            $('#receiptModal').modal('show');
        } else if (!!resp.msg) {
            el.text(resp.msg);
            _this.prepend(el);
            el.show('slow');
            $('html,body').scrollTop(0);
        } else {
            el.text("An error occurred.");
            _this.prepend(el);
            el.show('slow');
            $('html,body').scrollTop(0);
        }
        end_loader();
    }
});

// Event listener for modal close to redirect to services page
$('#receiptModal').on('hidden.bs.modal', function () {
    window.location.href = _base_url_ + '?products.php'; // Redirect to services page
});
    })
</script>
