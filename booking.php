<?php
session_start();


if(empty($_SESSION["username"]))
{
    header("Location:index.php");
}
else
{
    include("header.php");
}

$con=new connec();
$result=$con->select_show_dt();
// $result1=$con->select_show_dt();

$checked_value=0;

if(isset($_POST["btn_booking"])) {
    $con = new connec();

    $cust_id = $_POST["cust_id"];
    $show_id = $_POST["show_id"];
    $no_tikt = $_POST["no_ticket"];
    $ticket_price = $_POST["ticket_price"];
    $bkng_date = $_POST["booking_date"];
    $total_amnt = intval($ticket_price) * intval($no_tikt);

    $seat_number = $_POST["seat_dt"];
    $seat_arr = explode(", ", $seat_number);


    $sql = "INSERT INTO seat_detail VALUES (0, $cust_id, $show_id, $no_tikt)";
    $seat_dt_id = $con->insert_lastid($sql);

    $sql = "INSERT INTO booking VALUES (0, $cust_id, $show_id, $no_tikt, $seat_dt_id, '$bkng_date', $total_amnt)";
    $booking_id = $con->insert_lastid1($sql, "Your ticket has been booked.");

    foreach($seat_arr as $item) {
        $sql = "INSERT INTO seat_reserved VALUES (0, $show_id, $cust_id, $booking_id, '$item', 'true')";
        $abc = $con->insert_lastid($sql);
    }
    echo "<script>window.open('invoice.php?booking_id=$booking_id', '_blank');</script>";
}



?>

<style>
  /* Style for movie chair checkbox */
  .movie-chair {
    display: inline-block;
    width: 30px;
    height: 30px;
    background-color: #ddd;
    border: 1px solid #777;
    border-radius: 4px;
    position: relative;
  }
  .movie-chair input[type="checkbox"] {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
  }
  .movie-chair input[type="checkbox"]:checked + span {
    background-color: green;
  }
  .movie-chair span {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 14px;
    height: 14px;
    background-color: #fff;
    border: 1px solid #777;
    border-radius: 50%;
  }
  input[type=checkbox] {
    position: relative;
    cursor: pointer;
  }
  input[type=checkbox]:before {
    content: "";
    display: block;
    position: absolute;
    width: 20px;
    height: 20px;
    top: 0;
    left: 0;
    background-color:#e9e9e9;
  }
  input[type=checkbox]:checked:before {
  content: "";
   display: block;
   position: absolute;
   width: 20px;
   height: 20px;
   top: 0;
   left: 0;
   background-color:rgb(28, 156, 67);
   }
   input[type=checkbox]:checked:after {
   content: "";
   display: block;
   width: 5px;
   height: 10px;
   border: solid white;
   border-width: 0 2px 2px 0;
   -webkit-transform: rotate(45deg);
   -ms-transform: rotate(45deg);
   transform: rotate(45deg);
   position: absolute;
   top: 2px;
   left: 6px;
  }
  input[type=checkbox]:disabled:after{
  content: "";
  display: block;
  position: absolute;
  width: 20px;
  height: 20px;
  top: 0;
  left: 0;
  background-color: #B31B1B;
  border: 2px solid #fff;
        }
</style>

<script>

    
function change_option(mvalue) {
    // Set the value of the hidden input field
    document.getElementById('show_id').value = mvalue.value;
    
    // Store the selected show_id in localStorage
    localStorage.setItem('selectedShowId', mvalue.value);

    // Submit the form
    document.getElementById('booking_form').submit(); 
}

window.onload = function() {
    var selectedShowId = localStorage.getItem('selectedShowId');
    if (selectedShowId) {
        // Set the selected show_id in the form select element
        document.getElementById('show_id').value = selectedShowId;
    }
}

    // Function to handle checkbox change event
$('input[name="seats[]"]').change(function() {
    checkboxtotal();
});

function checkboxtotal() {
    var seat = [];
    $('input[name="seats[]"]:checked').each(function() {
        seat.push($(this).val());
    });

    var st = seat.length;
    document.getElementById('no_ticket').value = st;

    $('#no_tickets').text(st);

    // Extracting ticket price from the HTML element
    var ticketPrice = parseFloat($('#ticket_price span').text().replace('₱ ', ''));

    // Setting the ticket price value to the hidden input field
    $('#ticket_price_hidden').val(ticketPrice);

    // Calculating total price
    var total = "₱ " + (st * ticketPrice);
    $('#price_details').text(total);
    $('#total_ticket_price').text(total);
    $('#total_ticket_price1').text(total);
    $('#total_ticket_price2').text(total);
    $('#total_ticket_price3').text(total);
    $('#total_ticket_price4').text(total);
    $('#seat_dt').val(seat.join(", "));
}




</script>

<?php


if (isset($_POST['show_id'])) {
    $show_id = $_POST['show_id'];
} else {
    $show_id = 1; // Default value if no option is selected
}

$sql1 = "SELECT seat_number
        FROM seat_reserved
        WHERE `show_id` = $show_id";


// $sql1 = "SELECT seat_number
//         FROM seat_reserved
//         INNER JOIN `show` ON seat_reserved.show_id = `show`.id
//         WHERE `show`.movie_id = $movie_id";


$result1 = $con->select_by_query($sql1);
$seatid = mysqli_fetch_all($result1);

$seat_number = array();
    foreach($seatid as $id){
        
        $seat_number[] = $id[0];
               
    }
    
    $seat1='';
    for($i=0;$i<count($seat_number);$i++){
        $seat1 = $seat1 . $seat_number[$i] . ",";
        }

    $seattocollect = explode(",",$seat1);
    
        
    function checkme($seatidd,$seattocollect){
        $disabled='';
        
          foreach($seattocollect as $seattocollect1){
              
            if($seatidd == $seattocollect1)
            {
                $disabled = $disabled . "disabled";
            }
          }

         echo $disabled;

    }
?>

<?php
if (isset($_POST['show_id'])) {
    $show_id = $_POST['show_id'];
} else {
    $show_id = 1; // Default value if no option is selected
}

// $sql3 = "SELECT cinemas FROM show_movie_cinema where show_id = $show_id";
// $result3=$con->select_by_query($sql3);

$sql4 = "SELECT * FROM show_movie_cinema where show_id = $show_id";
$result4=$con->select_by_query($sql4);

$sql5 = "SELECT ticket_price FROM show_movie_cinema where show_id = $show_id";
$result5=$con->select_by_query($sql5);
?>


<br>

<section class="mt-5">
    <h1 class="text-center"  style="color:white;">Book Your Ticket Now</h1>
   <div class="container">
       <div class="row">
           <div class="col-md-7">
                <div id="seat-map" id="seatCharts">
                    <h3 class="text-center mt-5"  style="color:white;">Select Seat</h3>
                    <hr>
                    <label class="text-center" style="width:100%;background-color:white;color:red;padding:2%"> 
                        MOVIE SCREEN
                    </label>
                    
                    <div class="text-center" style="color: white;">
                        <form method="POST">
                        <table style="width:100%">
                        
                           <tr>
                               <td>&#x2798;</td>
                               <td>1</td>
                               <td>2</td>
                               <td>3</td>
                               <td>4</td>
                               <td>5</td>
                               <td>6</td>
                               <td>7</td>
                               <td>8</td>
                               <td>9</td>
                               <td>10</td>
                           </tr>

                           <tr>
                               <td>A</td>
                               <td><input type="checkbox" name="seats[]" value="A-01" onclick="checkboxtotal();" <?php checkme("A-01",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="A-02" onclick="checkboxtotal();" <?php checkme("A-02",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="A-03" onclick="checkboxtotal();" <?php checkme("A-03",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="A-04" onclick="checkboxtotal();" <?php checkme("A-04",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="A-05" onclick="checkboxtotal();" <?php checkme("A-05",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="A-06" onclick="checkboxtotal();" <?php checkme("A-06",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="A-07" onclick="checkboxtotal();" <?php checkme("A-07",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="A-08" onclick="checkboxtotal();" <?php checkme("A-08",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="A-09" onclick="checkboxtotal();" <?php checkme("A-09",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="A-10" onclick="checkboxtotal();" <?php checkme("A-10",$seattocollect); ?>></td>
                               
                              
                           </tr>
                           <tr>
                               <td>B</td>
                               <td><input type="checkbox" name="seats[]" value="B-01" onclick="checkboxtotal();" <?php checkme("B-01",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="B-02" onclick="checkboxtotal();" <?php checkme("B-02",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="B-03" onclick="checkboxtotal();" <?php checkme("B-03",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="B-04" onclick="checkboxtotal();" <?php checkme("B-04",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="B-05" onclick="checkboxtotal();" <?php checkme("B-05",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="B-06" onclick="checkboxtotal();" <?php checkme("B-06",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="B-07" onclick="checkboxtotal();" <?php checkme("B-07",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="B-08" onclick="checkboxtotal();" <?php checkme("B-08",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="B-09" onclick="checkboxtotal();" <?php checkme("B-09",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="B-10" onclick="checkboxtotal();" <?php checkme("B-10",$seattocollect); ?>></td>
                           </tr>
                           <tr>
                               <td>C</td>
                               <td><input type="checkbox" name="seats[]" value="C-01" onclick="checkboxtotal();" <?php checkme("C-01",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="C-02" onclick="checkboxtotal();" <?php checkme("C-02",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="C-03" onclick="checkboxtotal();" <?php checkme("C-03",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="C-04" onclick="checkboxtotal();" <?php checkme("C-04",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="C-05" onclick="checkboxtotal();" <?php checkme("C-05",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="C-06" onclick="checkboxtotal();" <?php checkme("C-06",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="C-07" onclick="checkboxtotal();" <?php checkme("C-07",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="C-08" onclick="checkboxtotal();" <?php checkme("C-08",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="C-09" onclick="checkboxtotal();" <?php checkme("C-09",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="C-10" onclick="checkboxtotal();" <?php checkme("C-10",$seattocollect); ?>></td>
                           </tr>
                           <tr>
                               <td>D</td>
                               <td><input type="checkbox" name="seats[]" value="D-01" onclick="checkboxtotal();" <?php checkme("D-01",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="D-02" onclick="checkboxtotal();" <?php checkme("D-02",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="D-03" onclick="checkboxtotal();" <?php checkme("D-03",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="D-04" onclick="checkboxtotal();" <?php checkme("D-04",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="D-05" onclick="checkboxtotal();" <?php checkme("D-05",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="D-06" onclick="checkboxtotal();" <?php checkme("D-06",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="D-07" onclick="checkboxtotal();" <?php checkme("D-07",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="D-08" onclick="checkboxtotal();" <?php checkme("D-08",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="D-09" onclick="checkboxtotal();" <?php checkme("D-09",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="D-10" onclick="checkboxtotal();" <?php checkme("D-10",$seattocollect); ?>></td>
                           </tr>
                           <tr>
                               <td>E</td>
                               <td><input type="checkbox" name="seats[]" value="E-01" onclick="checkboxtotal();" <?php checkme("E-01",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="E-02" onclick="checkboxtotal();" <?php checkme("E-02",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="E-03" onclick="checkboxtotal();" <?php checkme("E-03",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="E-04" onclick="checkboxtotal();" <?php checkme("E-04",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="E-05" onclick="checkboxtotal();" <?php checkme("E-05",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="E-06" onclick="checkboxtotal();" <?php checkme("E-06",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="E-07" onclick="checkboxtotal();" <?php checkme("E-07",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="E-08" onclick="checkboxtotal();" <?php checkme("E-08",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="E-09" onclick="checkboxtotal();" <?php checkme("E-09",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="E-10" onclick="checkboxtotal();" <?php checkme("E-10",$seattocollect); ?>></td>
                           </tr>
                           <tr>
                               <td>F</td>
                               <td><input type="checkbox" name="seats[]" value="F-01" onclick="checkboxtotal();" <?php checkme("F-01",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="F-02" onclick="checkboxtotal();" <?php checkme("F-02",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="F-03" onclick="checkboxtotal();" <?php checkme("F-03",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="F-04" onclick="checkboxtotal();" <?php checkme("F-04",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="F-05" onclick="checkboxtotal();" <?php checkme("F-05",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="F-06" onclick="checkboxtotal();" <?php checkme("F-06",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="F-07" onclick="checkboxtotal();" <?php checkme("F-07",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="F-08" onclick="checkboxtotal();" <?php checkme("F-08",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="F-09" onclick="checkboxtotal();" <?php checkme("F-09",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="F-10" onclick="checkboxtotal();" <?php checkme("F-10",$seattocollect); ?>></td>
                           </tr>
                           <tr>
                               <td>G</td>
                               <td><input type="checkbox" name="seats[]" value="G-01" onclick="checkboxtotal();" <?php checkme("G-01",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="G-02" onclick="checkboxtotal();" <?php checkme("G-02",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="G-03" onclick="checkboxtotal();" <?php checkme("G-03",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="G-04" onclick="checkboxtotal();" <?php checkme("G-04",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="G-05" onclick="checkboxtotal();" <?php checkme("G-05",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="G-06" onclick="checkboxtotal();" <?php checkme("G-06",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="G-07" onclick="checkboxtotal();" <?php checkme("G-07",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="G-08" onclick="checkboxtotal();" <?php checkme("G-08",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="G-09" onclick="checkboxtotal();" <?php checkme("G-09",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="G-10" onclick="checkboxtotal();" <?php checkme("G-10",$seattocollect); ?>></td>
                           </tr>
                           <tr>
                               <td>H</td>
                               <td><input type="checkbox" name="seats[]" value="H-01" onclick="checkboxtotal();" <?php checkme("H-01",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="H-02" onclick="checkboxtotal();" <?php checkme("H-02",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="H-03" onclick="checkboxtotal();" <?php checkme("H-03",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="H-04" onclick="checkboxtotal();" <?php checkme("H-04",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="H-05" onclick="checkboxtotal();" <?php checkme("H-05",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="H-06" onclick="checkboxtotal();" <?php checkme("H-06",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="H-07" onclick="checkboxtotal();" <?php checkme("H-07",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="H-08" onclick="checkboxtotal();" <?php checkme("H-08",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="H-09" onclick="checkboxtotal();" <?php checkme("H-09",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="H-10" onclick="checkboxtotal();" <?php checkme("H-10",$seattocollect); ?>></td>
                           </tr>
                           <tr>
                               <td>I</td>
                               <td><input type="checkbox" name="seats[]" value="I-01" onclick="checkboxtotal();" <?php checkme("I-01",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="I-02" onclick="checkboxtotal();" <?php checkme("I-02",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="I-03" onclick="checkboxtotal();" <?php checkme("I-03",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="I-04" onclick="checkboxtotal();" <?php checkme("I-04",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="I-05" onclick="checkboxtotal();" <?php checkme("I-05",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="I-06" onclick="checkboxtotal();" <?php checkme("I-06",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="I-07" onclick="checkboxtotal();" <?php checkme("I-07",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="I-08" onclick="checkboxtotal();" <?php checkme("I-08",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="I-09" onclick="checkboxtotal();" <?php checkme("I-09",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="I-10" onclick="checkboxtotal();" <?php checkme("I-10",$seattocollect); ?>></td>
                           </tr>
                           <tr>
                               <td>J</td>
                               <td><input type="checkbox" name="seats[]" value="J-01" onclick="checkboxtotal();" <?php checkme("J-01",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="J-02" onclick="checkboxtotal();" <?php checkme("J-02",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="J-03" onclick="checkboxtotal();" <?php checkme("J-03",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="J-04" onclick="checkboxtotal();" <?php checkme("J-04",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="J-05" onclick="checkboxtotal();" <?php checkme("J-05",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="J-06" onclick="checkboxtotal();" <?php checkme("J-06",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="J-07" onclick="checkboxtotal();" <?php checkme("J-07",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="J-08" onclick="checkboxtotal();" <?php checkme("J-08",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="J-09" onclick="checkboxtotal();" <?php checkme("J-09",$seattocollect); ?>></td>
                               <td><input type="checkbox" name="seats[]" value="J-10" onclick="checkboxtotal();" <?php checkme("J-10",$seattocollect); ?>></td>
                           </tr>
                       </table>
                       <!-- <input class="btn btn-success" type="submit" name="submit" style="margin:10px;"> -->
                       <!-- <input type="hidden" value="1" name="screencheckbox"> -->

                        </form>
                       

                    </div>
                    <!-- <div class="row" id="seat_chart"> -->


                </div>
                <?php
                $sql3 = "SELECT cinemas FROM show_movie_cinema WHERE show_id = $show_id";
                $result3 = $con->select_by_query($sql3);

                // Check if there are rows returned
                if ($result3->num_rows > 0) {
                    
                    $row = $result3->fetch_assoc();
                    
                    
                    $cinemas = $row["cinemas"];

                    
                    $cinema_array = explode(',', $cinemas);

                    
                    echo '<h6 class="mt-5" id="cinema_name" style="color:white;">Cinema Name: <span style="color: white;">' . $cinema_array[0] . '</span></h6>';
                }
                ?>

                <h6 class="mt-3"  id="show_date_time" style="color:white;">Movie Show (Date and Time): 
                <?php
                if ($result4->num_rows > 0) {
                    while ($row = $result4->fetch_assoc()) {
                    echo '<span style="color: white;">' . $row["show_date"] . ', ' . $row["time"] . '</span>';
                    }
                }
                ?>
                </h6>
                
                <hr>
                <h6 class="mt-3" style="color:white;">
                    Payment Method: 
                    <select name="payment_method" id="payment_method" style="vertical-align: middle; width: 200px;">
                        <option value="gcash" style="background-image: url('images/gcash.png'); background-size: 20px 20px; background-repeat: no-repeat; padding-left: 130px;">GCash</option>
                    </select>
                    <!-- Add onclick event to call the JavaScript function -->
                    <button type="submit" id="proceed_to_payment_btn" name="btn_pay" style="width:10%;" class="btn btn-primary">Pay</button>
                    <!-- Add the green checkmark icon -->
                    <img src="images/green_checkmark.png" id="payment_success_icon" style="display: none; height: 30px; margin-left: 10px;">
                </h6>

                <h6 class="mt-3"  style="color:white;">Total of Seats Selected: <span id="no_tickets"></span></h6>

                <h6 class="mt-3" id="ticket_price" style="color:white;">Ticket Price: 
                <?php
                if ($result5->num_rows > 0) {
                    while ($row = $result5->fetch_assoc()) {
                    echo '<span name="ticket_price" style="color: white;">₱ ' . $row["ticket_price"] . '</span>';
                    }
                }
                ?>
                </h6>

                <h6 class="mt-3"  style="color:white;">Total Ticket Price: <span id="price_details"></span></h6>

           </div>
           <div class="col-md-5">
           <form method="post" class="mt-5" id="booking_form">
                <div class="container" style="color:white;">
                    <center>
                        <p>Please fill this form to book your ticket.</p>
                    </center>
                    <hr>
                    <label for="username"><b>Customer Id</b></label>
                    <input type="number" style="border-radius:30px;" name="cust_id" required value="<?php echo $_SESSION["cust_id"]; ?>" readonly>

                    <label for="email"><b>Show Id</b></label>
                    <div class="form-group">
                        <select class="form-control" name="show_id" id="show_id" style="border-radius:30px;" onchange="change_option(this)">
                            <option>Select Show</option>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["id"] . '">' . $row["movie_name"] . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <input type="hidden" name="movie_id_of_option" id="movie_id_of_option_input">
                    </div>

                    <label for="psw"><b>No. of Tickets</b></label>
                    <input type="number" style="border-radius:30px;" id="no_ticket" name="no_ticket" required>

                    <label for="psw-repeat"><b>Seat Deatils</b></label>
                    <input type="text" style="border-radius:30px;" name="seat_dt" id="seat_dt" required>

                    <label for="number"><b>Booking Date</b></label>
                    <input type="date" style="border-radius:30px;" name="booking_date" required>

                    <input type="hidden" id="ticket_price_hidden" name="ticket_price" value="">

                    <center>
                        <button type="submit" id="btn_booking" name="btn_booking" class="registerbtn" style="background-color:#B31B1B;color:white;border-radius:30px;background-color: #808080;" disabled>Book Ticket</button>
                    </center>
                    <!--  tpye="submit" name="btn_booking"  -->
                    <hr>
                </div>
            </form>

           </div>
       </div>


       <!-- Payment Modal -->

<?php
if (isset($_POST['show_id'])) {
    $show_id = $_POST['show_id'];
} else {
    $show_id = 1; // Default value if no option is selected
}

$cust_id = $_SESSION["cust_id"];

$sql6 = "SELECT * FROM show_movie_cinema where show_id = $show_id";
$result6=$con->select_by_query($sql6);

$sql8 = "SELECT * FROM show_movie_cinema where show_id = $show_id";
$result8=$con->select_by_query($sql8);

$sql9 = "SELECT * FROM show_movie_cinema where show_id = $show_id";
$result9=$con->select_by_query($sql9);

$sql10 = "SELECT * FROM show_movie_cinema where show_id = $show_id";
$result10=$con->select_by_query($sql10);

$sql11 = "SELECT * FROM show_movie_cinema where show_id = $show_id";
$result11=$con->select_by_query($sql11);

$sql12 = "SELECT credits FROM customer WHERE id = $cust_id";
$result12 = $con->select_by_query($sql12);

$sql7 = "SELECT ticket_price FROM show_movie_cinema where show_id = $show_id";
$result7=$con->select_by_query($sql7);
?>


<div class="modal fade" id="modelId5" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color: white;">
            <div class="modal-header" style="color:white;background-color:#B31B1B;">
                <div class="row"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <h1 style="color:#B31B1B;">Booking Summary</h1>
                </center>
                <br>
                <!-- Display Movie Details -->
                <div>
                    <p style="float: left;">
                        <?php
                        if ($result11->num_rows > 0) {
                            while ($row = $result11->fetch_assoc()) {
                                echo '<img src="' . $row["movie_banner"] . '" style="height: 400px;width:280px;" alt="Movie Banner">';
                            }
                        }
                        ?>
                    </p>
                    <div style="margin-left: 300px;">
                    <p><strong>Movie Name:</strong>
                    <?php
                    if ($result9->num_rows > 0) {
                        while ($row = $result9->fetch_assoc()) {
                        echo '<span style="color: black;">' . $row["movie_name"] . '</span>';
                        }
                    }
                    ?>
                    </p>
                    <p><strong>Show ID:</strong>
                    <?php
                    if ($result10->num_rows > 0) {
                        while ($row = $result10->fetch_assoc()) {
                        echo '<span style="color: black;">' . $row["show_id"] . '</span>';
                        }
                    }
                    ?>
                    </p>
                    <p><strong>Show Date:</strong>
                    <?php
                    if ($result6->num_rows > 0) {
                        while ($row = $result6->fetch_assoc()) {
                        echo '<span style="color: black;">' . $row["show_date"] . '</span>';
                        }
                    }
                    ?>
                    </p>
                    <p><strong>Show Time:</strong>
                    <?php
                    if ($result8->num_rows > 0) {
                        while ($row = $result8->fetch_assoc()) {
                        echo '<span style="color: black;">' . $row["time"] . '</span>';
                        }
                    }
                    ?>
                    </p>
                    <hr style="border-top: 1px solid #5A5A5A;"><br>
                    <p><strong>Total Seats Selected:</strong> <span id="no_tickets"></span></p>

                    <p><strong>Ticket Price:</strong>
                    <?php
                    if ($result7->num_rows > 0) {
                        while ($row = $result7->fetch_assoc()) {
                        echo '<span style="color: black;">₱ ' . $row["ticket_price"] . '</span>';
                        }
                    }
                    ?>
                    </p>
                    <p><strong>Total Ticket Price:</strong> <span id="total_ticket_price"></span></p>

                    <p><strong>Payment Method:</strong></p>
                        <div style="border: 2px solid #5A5A5A; padding: 10px;">
                            <input type="radio" id="payment_method_cash" name="payment_method" value="cash" required>
                            <label for="payment_method_cash">
                                <img src="images/gcash.png" alt="GCash" style="height: 50px;">
                            </label><br>
                            <!-- Add more payment method options here -->
                        </div>
                        <center><button name="proceed_fssadfsbtn" id="proceed_fssadfsbtn" class="registerbtn" style="background-color:#B31B1B;color:white;border-radius:30px;" onclick="proceedToNextModal()">Proceed</button></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

<!-- Gcash Modal -->

<div class="modal fade" id="newModelId" tabindex="-1" role="dialog" aria-labelledby="newModelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background: linear-gradient(to bottom, #054ce1 50%, #ffffff 50%);">
            <div class="modal-header" style="color:white;background-color:#B31B1B;">
                <div class="row"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:#e8e9ee; max-height: 500px; overflow-y: auto;">
                <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                    <div style="text-align: center; margin-bottom:20px;">
                        <img src="images/gcashwhite.png" alt="GCash" style="height: 50px;">
                    </div>
                    <div class="card" style="width: 400px; margin-bottom:70px; padding: 20px; background-color: #ffffff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);">
                        <form class="col">
                            <div style="display: flex; align-items: center;">
                                <label for="merchant" style="color:#5A5A5A; flex: 1;">Merchant</label>
                                <span style="flex: 2;color: #141414;">AUB Online 2</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <label for="amount" style="color:#5A5A5A; flex: 1;">Amount Due</label>
                                <span id="total_ticket_price1" style="flex: 2;color:#054ce1;" ></span>
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
                        <center><button class="btn btn-primary" style="background-color:#054ce1;" onclick="proceedToNextModal1()">Next</button></center>
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
        <div class="modal-content" style="background: linear-gradient(to bottom, #054ce1 50%, #ffffff 50%);">
            <div class="modal-header" style="color:white;background-color:#B31B1B;">
                <div class="row"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:#e8e9ee; max-height: 500px; overflow-y: auto;">
                <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                    <div style="text-align: center; margin-bottom:20px;">
                        <img src="images/gcashwhite.png" alt="GCash" style="height: 50px;">
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
            <center><button class="btn btn-primary" style="background-color:#054ce1;" onclick="proceedToNextModal2()">Next</button></center>
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
            <div class="modal-header" style="color:white;background-color:#B31B1B;">
                <div class="row"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:#e8e9ee; max-height: 500px; overflow-y: auto;">
                <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                    <div style="text-align: center; margin-bottom:20px;">
                        <img src="images/gcashwhite.png" alt="GCash" style="height: 50px;">
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
            <center><button class="btn btn-primary" style="background-color:#054ce1;" onclick="proceedToNextModal3()">Next</button></center>
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
            <div class="modal-header" style="color:white;background-color:#B31B1B;">
                <div class="row"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:#e8e9ee; max-height: 500px; overflow-y: auto;">
                <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                    <div style="text-align: center; margin-bottom:20px;">
                        <img src="images/gcashwhite.png" alt="GCash" style="height: 50px;">
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
                                    <?php
                                    if ($result12->num_rows > 0) {
                                        while ($row = $result12->fetch_assoc()) {
                                            echo '<span style="color: black; margin-left: 10px;">' . $row["credits"] . '</span>';
                                        }
                                    }
                                    ?>
                                </span>
                                <input type="radio" style="color:#054ce1; background-color:#054ce1;" name="payment_method" style="margin-left: 10px;" checked>
                            </div>
                            <br>
                            <div style="display: flex; align-items: center;">
                                <label style="color:#5A5A5A; font-size: 15px; flex: 1;"><strong>YOU ARE ABOUT TO PAY</strong></label>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <label for="merchant" style="color:#5A5A5A; flex: 1;">Amount</label>
                                <span id="total_ticket_price2" style="flex: 2; color: #141414;"></span>
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
                        <center>
                            <button id="btn_booking_modal" class="btn btn-primary" style="background-color:#054ce1;" onclick="closeModal()">PAY <span id="total_ticket_price4"></span></button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>


<?php
include("footer.php");
?>

<script>
document.getElementById('proceed_to_payment_btn').addEventListener('click', function(event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Check if the required fields are filled
    var seatDetails = document.getElementById('seat_dt').value;
    var bookingDate = document.getElementsByName('booking_date')[0].value;

    if (seatDetails.trim() === '' || bookingDate.trim() === '') {
        // If any of the required fields are empty, display an alert to the user
        alert('Please fill out all required fields.');
    } else {
        // If all required fields are filled, show the payment modal
        $('#modelId5').modal('show');
    }
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
    // Get the "Pay" button and the green checkmark icon
    var payButton = document.getElementById("btn_booking_modal");
    var checkmarkIcon = document.getElementById("payment_success_icon");

    // Add a click event listener to the "Pay" button
    payButton.addEventListener("click", function() {
        // Toggle the visibility of the green checkmark icon
        checkmarkIcon.style.display = "inline";
    });
</script>

<!-- JavaScript to enable/disable the "Book Ticket" button -->
<script>
    // Get the "Book Ticket" button and the "Pay" button in the modal
    var bookTicketButton = document.getElementById("btn_booking");
    var payButtonModal = document.getElementById("btn_booking_modal");

    // Add a click event listener to the "Pay" button in the modal
    payButtonModal.addEventListener("click", function() {
        // Enable the "Book Ticket" button
        bookTicketButton.disabled = false;
        // Change the background color back to its original color
        bookTicketButton.style.backgroundColor = "#B31B1B";
    });
</script>

<script>
    function closeModal() {
        // Find the modal element
        var modal = document.getElementById("newModelId3");
        // Trigger the close event
        $(modal).modal('hide');
    }
</script>















