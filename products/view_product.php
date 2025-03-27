<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT  p.*, v.shop_name as vendor, c.name as `category` FROM `product_list` p inner join vendor_list v on p.vendor_id = v.id inner join category_list c on p.category_id = c.id where p.delete_flag = 0 and p.id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }else{
        echo "<script> alert('Unkown Product ID.'); location.replace('./?page=products') </script>";
        exit;
    }
}else{
    echo "<script> alert('Product ID is required.'); location.replace('./?page=products') </script>";
    exit;
}
?>
<style>
    #prod-img-holder {
        height: 45vh !important;
        width: calc(100%);
        overflow: hidden;
    }

    #prod-img {
        object-fit: scale-down;
        height: calc(100%);
        width: calc(100%);
        transition: transform .3s ease-in;
    }
    #prod-img-holder:hover #prod-img{
        transform:scale(1.2);
    }
</style>

<!-- Modal HTML Structure -->
<div id="cartModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title">Cart List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <div class="modal-body">
                <!-- Cart List will be displayed here -->
                <div id="cartContent"></div>
                <!-- Checkout form container -->
                <div id="checkoutContainer"></div>
            </div>
            <div class="modal-footer">
            <a href="#"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
                <a href="./?page=orders/checkout"> <button class="btn btn-primary" id="checkoutBtn">Checkout</button></a>
            </div>
        </div>
    </div>
</div>

<!-- Product Details Page -->
<div class="content py-3">
    <div class="card card-outline card-primary rounded-0 shadow">
        <div class="card-header">
            <h5 class="card-title"><b>Product Details</b></h5>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div id="msg"></div>
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-12 text-center">
                        <div class="position-relative overflow-hidden" id="prod-img-holder">
                            <img src="<?= isset($image_path) ? $image_path : "" ?>" alt="<?= $name ?>" id="prod-img" class="img-thumbnail bg-gradient-gray">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12">
                        <h3><b><?= $name ?></b></h3>
                        <div class="d-flex w-100">
                            <div class="col-auto px-0"><small class="text-muted">Vendor: </small></div>
                            <div class="col-auto px-0 flex-shrink-1 flex-grow-1"><p class="m-0"><small class="text-muted"><?= $vendor ?></small></p></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-auto px-0"><small class="text-muted">Category: </small></div>
                            <div class="col-auto px-0 flex-shrink-1 flex-grow-1"><p class="m-0"><small class="text-muted"><?= $category ?></small></p></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-auto px-0"><small class="text-muted">Price: </small></div>
                            <div class="col-auto px-0 flex-shrink-1 flex-grow-1"><p class="m-0 pl-3"><small class="text-primary"><?= format_num($price) ?></small></p></div>
                        </div>
                        <div class="row align-items-end">
                        <div class="col-md-3 form-group" style="display: none;">
    <input type="number" min="1" max="1" id="qty" value="1" class="form-control rounded-0 text-center">
</div>
                        </div>
                        <div class="w-100"><?= html_entity_decode($description) ?></div>
                        <div class="col-md-3 form-group">
                            <button class="btn btn-primary btn-flat" type="button" id="openCartModal"><i class=""></i> Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function loadCheckoutForm() {
        $.ajax({
            url: 'orders/cart.php',
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

    $('#cartModal').on('shown.bs.modal', function (e) {
        loadCartList();
        loadCheckoutForm();
    });

    function loadCartList() {
        $.ajax({
            url: _base_url_ + 'classes/Master.php?f=load_cart_list',
            method: 'GET',
            dataType: 'html',
            error: function (err) {
                console.error(err);
            },
            success: function (resp) {
                $('#cartContent').html(resp);
            }
        });
    }

    function addToCart() {
        var pid = '<?= isset($id) ? $id : '' ?>';
        var qty = $('#qty').val();
        $.ajax({
            url: _base_url_ + 'classes/Master.php?f=add_to_cart',
            method: 'POST',
            data: { product_id: pid, quantity: qty },
            dataType: 'json',
            error: function (err) {
                console.error(err);
                uni_modal("","login.php")
            },
            success: function (resp) {
                if (resp.status == 'success') {
                    loadCartList();
                    $('#cartModal').modal('show');
                } else if (!!resp.msg) {
                    alert_toast(resp.msg, 'error');
                } else {
                    alert_toast('An error occurred. Please try to refresh this page.', 'error');
                }
            }
        });
    }

    $(function () {
        $('#openCartModal').click(function () {
            addToCart();
        });

        $('#checkoutBtn').click(function () {
            $('#cartModal').modal('hide');
            $('#checkoutModal').modal('show');
        });
    });

    $(document).ready(function () {
        loadCartList();
    });
</script>
