<?php require_once('./config.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Receipt</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .container {
        width: 80%;
        margin: auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .text-center {
        text-align: center;
    }
    .border {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 4px;
    }
    .item {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .item:nth-child(even) {
        background-color: #f9f9f9;
    }
    .total {
        font-size: 1.2em;
    }
    /* New Styles */
    .header {
        background-color: #4CAF50;
        color: #fff;
        padding: 15px;
        text-align: center;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }
    .summary {
        margin-bottom: 20px;
        padding: 10px;
    }
    .summary h2 {
        margin: 0;
        padding: 0;
    }
    .vendor-name {
        font-weight: bold;
    }
</style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Sunzy Food Receipt</h1>
    </div>

    <div class="summary border">
        <h2 class="text-center">Summary</h2>
        <?php 
        if(isset($_settings)) {
            $gtotal = 0;
            $vendors = $conn->query("SELECT * FROM `vendor_list` where id in (SELECT vendor_id from product_list where id in (SELECT product_id FROM `cart_list` where client_id ='{$_settings->userdata('id')}')) order by `shop_name` asc");
            while($vrow=$vendors->fetch_assoc()):    
            $vtotal = $conn->query("SELECT sum(c.quantity * p.price) FROM `cart_list` c inner join product_list p on c.product_id = p.id where c.client_id = '{$_settings->userdata('id')}' and p.vendor_id = '{$vrow['id']}'")->fetch_array()[0];   
            $vtotal = $vtotal > 0 ? $vtotal : 0;
            $gtotal += $vtotal;
        ?>
        <div class="item">
            <span class="vendor-name"><?= $vrow['code']." - ".$vrow['shop_name'] ?></span>
            <span><?= format_num($vtotal) ?></span>
        </div>
        <?php endwhile; ?>
        <div class="total text-right h3">
            <span>Grand Total:</span>
            <span><?= format_num($gtotal) ?></span>
        </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
