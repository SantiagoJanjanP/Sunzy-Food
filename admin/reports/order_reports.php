<?php 
$month = isset($_GET['month']) ? $_GET['month'] : date("Y-m");
$week = isset($_GET['week']) ? $_GET['week'] : date("Y-\WW");
$day = isset($_GET['day']) ? $_GET['day'] : date("Y-m-d");
$report_type = isset($_GET['report_type']) ? $_GET['report_type'] : 'monthly';
?>
<div class="content py-3">
    <div class="card card-outline card-navy shadow rounded-0">
        <div class="card-header">
            <h5 class="card-title">Order Reports</h5>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="callout callout-primary shadow rounded-0">
                    <form action="" id="filter">
                        <div class="row align-items-end">
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="month" class="control-label">Month</label>
                                    <input type="month" name="month" id="month" value="<?= $month ?>" class="form-control rounded-0" required>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="week" class="control-label">Week</label>
                                    <input type="week" name="week" id="week" value="<?= $week ?>" class="form-control rounded-0" required>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="day" class="control-label">Day</label>
                                    <input type="date" name="day" id="day" value="<?= $day ?>" class="form-control rounded-0" required>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-flat btn-sm dropdown-toggle" type="button" id="reportTypeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Select Report Type
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="reportTypeDropdown">
                                            <a class="dropdown-item" href="#" data-report-type="monthly">Monthly</a>
                                            <a class="dropdown-item" href="#" data-report-type="weekly">Weekly</a>
                                            <a class="dropdown-item" href="#" data-report-type="daily">Daily</a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="report_type" id="report_type" value="<?= $report_type ?>">
                                    <button class="btn btn-primary btn-flat btn-sm"><i class="fa fa-filter"></i> Filter</button>
                                    <button class="btn btn-light border btn-flat btn-sm" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="clear-fix mb-3"></div>
                    <div id="outprint">
                        <?php if($report_type == 'monthly'): ?>
                        <h4 class="text-center">Monthly Order Reports</h4>
                        <table class="table table-bordered table-stripped">
                            <colgroup>
                                <col width="3%">
                                <col width="12%">
                                <col width="20%">
                                <col width="20%">
                                <col width="20%">
                                <col width="15%">
                                <col width="15%">
                            </colgroup>
                            <thead>
                                <tr class="">
                                    <th class="text-center align-middle py-1">#</th>
                                    <th class="text-center align-middle py-1">Date Created</th>
                                    <th class="text-center align-middle py-1">Ref. Code</th>
                                    <th class="text-center align-middle py-1">Client</th>
                                    <th class="text-center align-middle py-1">Vendor</th>
                                    <th class="text-center align-middle py-1">Status</th>
                                    <th class="text-center align-middle py-1">Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $total_monthly = 0;
                                $orders_monthly = $conn->query("SELECT o.*, c.code as ccode, CONCAT(c.lastname, ', ', c.firstname, ' ', COALESCE(c.middlename, '')) as client, CONCAT(v.code, '-', v.shop_name) as vendor FROM `order_list` o INNER JOIN client_list c ON o.client_id = c.id INNER JOIN vendor_list v ON o.vendor_id = v.id WHERE DATE_FORMAT(o.date_created, '%Y-%m') = '{$month}' ORDER BY UNIX_TIMESTAMP(o.date_created) DESC");
                                while($row = $orders_monthly->fetch_assoc()):
                                    $total_monthly += $row['total_amount'];
                                ?>
                                    <tr>
                                        <td class="text-center align-middle px-2 py-1"><?php echo $i++; ?></td>
                                        <td class="align-middle px-2 py-1"><?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
                                        <td class="align-middle px-2 py-1"><?= $row['code'] ?></td>
                                        <td class="align-middle px-2 py-1"><?php echo ucwords($row['ccode'] . ' - ' . $row['client']) ?></td>
                                        <td class="align-middle px-2 py-1"><?php echo ucwords($row['vendor']) ?></td>
                                        <td class="text-center align-middle px-2 py-1">
                                            <?php 
                                                switch($row['status']){
                                                    case 0:
                                                        echo '<span class="badge badge-secondary bg-gradient-secondary px-3 rounded-pill">Pending</span>';
                                                        break;
                                                    case 1:
                                                        echo '<span class="badge badge-primary bg-gradient-primary px-3 rounded-pill">Confirmed</span>';
                                                        break;
                                                    case 2:
                                                        echo '<span class="badge badge-info bg-gradient-info px-3 rounded-pill">Packed</span>';
                                                        break;
                                                    case 3:
                                                        echo '<span class="badge badge-warning bg-gradient-warning px-3 rounded-pill">Out for Delivery</span>';
                                                        break;
                                                    case 4:
                                                        echo '<span class="badge badge-success bg-gradient-success px-3 rounded-pill">Completed</span>';
                                                        break;
                                                    case 5:
                                                        echo '<span class="badge badge-danger bg-gradient-danger px-3 rounded-pill">Cancelled</span>';
                                                        break;
                                                    default:
                                                        echo '<span class="badge badge-light bg-gradient-light border px-3 rounded-pill">N/A</span>';
                                                        break;
                                                }
                                            ?>
                                        </td>
                                        <td class="text-right align-middle px-2 py-1"><?php echo format_num($row['total_amount']) ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center px-1 py-1 align-middle" colspan="6">Total</th>
                                    <th class="text-right px-1 py-1 align-middle"><?= format_num($total_monthly) ?></th>
                                </tr>
                            </tfoot>
                        </table>
                        <?php elseif($report_type == 'weekly'): ?>
                        <h4 class="text-center mt-4">Weekly Order Reports</h4>
                        <table class="table table-bordered table-stripped">
                            <colgroup>
                                <col width="3%">
                                <col width="12%">
                                <col width="20%">
                                <col width="20%">
                                <col width="20%">
                                <col width="15%">
                                <col width="15%">
                            </colgroup>
                            <thead>
                                <tr class="">
                                    <th class="text-center align-middle py-1">#</th>
                                    <th class="text-center align-middle py-1">Date Created</th>
                                    <th class="text-center align-middle py-1">Ref. Code</th>
                                    <th class="text-center align-middle py-1">Client</th>
                                    <th class="text-center align-middle py-1">Vendor</th>
                                    <th class="text-center align-middle py-1">Status</th>
                                    <th class="text-center align-middle py-1">Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $total_weekly = 0;
                                $week_start = date('Y-m-d', strtotime($week));
                                $week_end = date('Y-m-d', strtotime($week_start . ' +6 days'));
                                $orders_weekly = $conn->query("SELECT o.*, c.code as ccode, CONCAT(c.lastname, ', ', c.firstname, ' ', COALESCE(c.middlename, '')) as client, CONCAT(v.code, '-', v.shop_name) as vendor FROM `order_list` o INNER JOIN client_list c ON o.client_id = c.id INNER JOIN vendor_list v ON o.vendor_id = v.id WHERE DATE(o.date_created) BETWEEN '{$week_start}' AND '{$week_end}' ORDER BY UNIX_TIMESTAMP(o.date_created) DESC");
                                while($row = $orders_weekly->fetch_assoc()):
                                    $total_weekly += $row['total_amount'];
                                ?>
                                    <tr>
                                        <td class="text-center align-middle px-2 py-1"><?php echo $i++; ?></td>
                                        <td class="align-middle px-2 py-1"><?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
                                        <td class="align-middle px-2 py-1"><?= $row['code'] ?></td>
                                        <td class="align-middle px-2 py-1"><?php echo ucwords($row['ccode'] . ' - ' . $row['client']) ?></td>
                                        <td class="align-middle px-2 py-1"><?php echo ucwords($row['vendor']) ?></td>
                                        <td class="text-center align-middle px-2 py-1">
                                            <?php 
                                                switch($row['status']){
                                                    case 0:
                                                        echo '<span class="badge badge-secondary bg-gradient-secondary px-3 rounded-pill">Pending</span>';
                                                        break;
                                                    case 1:
                                                        echo '<span class="badge badge-primary bg-gradient-primary px-3 rounded-pill">Confirmed</span>';
                                                        break;
                                                    case 2:
                                                        echo '<span class="badge badge-info bg-gradient-info px-3 rounded-pill">Packed</span>';
                                                        break;
                                                    case 3:
                                                        echo '<span class="badge badge-warning bg-gradient-warning px-3 rounded-pill">Out for Delivery</span>';
                                                        break;
                                                    case 4:
                                                        echo '<span class="badge badge-success bg-gradient-success px-3 rounded-pill">Completed</span>';
                                                        break;
                                                    case 5:
                                                        echo '<span class="badge badge-danger bg-gradient-danger px-3 rounded-pill">Cancelled</span>';
                                                        break;
                                                    default:
                                                        echo '<span class="badge badge-light bg-gradient-light border px-3 rounded-pill">N/A</span>';
                                                        break;
                                                }
                                            ?>
                                        </td>
                                        <td class="text-right align-middle px-2 py-1"><?php echo format_num($row['total_amount']) ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center px-1 py-1 align-middle" colspan="6">Total</th>
                                    <th class="text-right px-1 py-1 align-middle"><?= format_num($total_weekly) ?></th>
                                </tr>
                            </tfoot>
                        </table>
                        <?php elseif($report_type == 'daily'): ?>
                        <h4 class="text-center mt-4">Daily Order Reports</h4>
                        <table class="table table-bordered table-stripped">
                            <colgroup>
                                <col width="3%">
                                <col width="12%">
                                <col width="20%">
                                <col width="20%">
                                <col width="20%">
                                <col width="15%">
                                <col width="15%">
                            </colgroup>
                            <thead>
                                <tr class="">
                                    <th class="text-center align-middle py-1">#</th>
                                    <th class="text-center align-middle py-1">Date Created</th>
                                    <th class="text-center align-middle py-1">Ref. Code</th>
                                    <th class="text-center align-middle py-1">Client</th>
                                    <th class="text-center align-middle py-1">Vendor</th>
                                    <th class="text-center align-middle py-1">Status</th>
                                    <th class="text-center align-middle py-1">Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $total_daily = 0;
                                $orders_daily = $conn->query("SELECT o.*, c.code as ccode, CONCAT(c.lastname, ', ', c.firstname, ' ', COALESCE(c.middlename, '')) as client, CONCAT(v.code, '-', v.shop_name) as vendor FROM `order_list` o INNER JOIN client_list c ON o.client_id = c.id INNER JOIN vendor_list v ON o.vendor_id = v.id WHERE DATE(o.date_created) = '{$day}' ORDER BY UNIX_TIMESTAMP(o.date_created) DESC");
                                while($row = $orders_daily->fetch_assoc()):
                                    $total_daily += $row['total_amount'];
                                ?>
                                    <tr>
                                        <td class="text-center align-middle px-2 py-1"><?php echo $i++; ?></td>
                                        <td class="align-middle px-2 py-1"><?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
                                        <td class="align-middle px-2 py-1"><?= $row['code'] ?></td>
                                        <td class="align-middle px-2 py-1"><?php echo ucwords($row['ccode'] . ' - ' . $row['client']) ?></td>
                                        <td class="align-middle px-2 py-1"><?php echo ucwords($row['vendor']) ?></td>
                                        <td class="text-center align-middle px-2 py-1">
                                            <?php 
                                                switch($row['status']){
                                                    case 0:
                                                        echo '<span class="badge badge-secondary bg-gradient-secondary px-3 rounded-pill">Pending</span>';
                                                        break;
                                                    case 1:
                                                        echo '<span class="badge badge-primary bg-gradient-primary px-3 rounded-pill">Confirmed</span>';
                                                        break;
                                                    case 2:
                                                        echo '<span class="badge badge-info bg-gradient-info px-3 rounded-pill">Packed</span>';
                                                        break;
                                                    case 3:
                                                        echo '<span class="badge badge-warning bg-gradient-warning px-3 rounded-pill">Out for Delivery</span>';
                                                        break;
                                                    case 4:
                                                        echo '<span class="badge badge-success bg-gradient-success px-3 rounded-pill">Completed</span>';
                                                        break;
                                                    case 5:
                                                        echo '<span class="badge badge-danger bg-gradient-danger px-3 rounded-pill">Cancelled</span>';
                                                        break;
                                                    default:
                                                        echo '<span class="badge badge-light bg-gradient-light border px-3 rounded-pill">N/A</span>';
                                                        break;
                                                }
                                            ?>
                                        </td>
                                        <td class="text-right align-middle px-2 py-1"><?php echo format_num($row['total_amount']) ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center px-1 py-1 align-middle" colspan="6">Total</th>
                                    <th class="text-right px-1 py-1 align-middle"><?= format_num($total_daily) ?></th>
                                </tr>
                            </tfoot>
                        </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<noscript id="print-header">
<style>
    #sys_logo{
        width:5em !important;
        height:5em !important;
        object-fit:scale-down !important;
        object-position:center center !important;
    }
</style>
<div class="d-flex align-items-center">
    <div class="col-auto text-center pl-4">
        <img src="<?= validate_image($_settings->info('logo')) ?>" alt=" System Logo" id="sys_logo" class="img-circle border border-dark">
    </div>
    <div class="col-auto flex-shrink-1 flex-grow-1 px-4">
        <h4 class="text-center m-0"><?= $_settings->info('name') ?></h4>
        <h3 class="text-center m-0"><b>Order Report</b></h3>
        <h5 class="text-center m-0">For the Month of</h5>
        <h5 class="text-center m-0"><?= date("F Y", strtotime($month)) ?></h5>
        <h5 class="text-center m-0">For the Week of</h5>
        <h5 class="text-center m-0"><?= date("W Y", strtotime($week . "-1")) ?></h5>
        <h5 class="text-center m-0">For the Day of</h5>
        <h5 class="text-center m-0"><?= date("F j, Y", strtotime($day)) ?></h5>
    </div>
</div>
<hr>
</noscript>
<script>
    $(function(){
        $('#filter').submit(function(e){
            e.preventDefault()
            location.href = "./?page=reports/order_reports&"+$(this).serialize();
        })
        $('#print').click(function(){
            start_loader();
            var head = $('head').clone()
            var p = $('#outprint').clone()
            var el = $('<div>')
            var header =  $($('noscript#print-header').html()).clone()
            head.find('title').text("Orders Monthly, Weekly, and Daily Report - Print View")
            el.append(head)
            el.append(header)
            el.append(p)
            var nw = window.open("","_blank","width=1000,height=900,top=50,left=75")
                    nw.document.write(el.html())
                    nw.document.close()
                    setTimeout(() => {
                        nw.print()
                        setTimeout(() => {
                            nw.close()
                            end_loader()
                        }, 200);
                    }, 500);
        })
        $('.dropdown-item').click(function(){
            var reportType = $(this).data('report-type');
            $('#report_type').val(reportType);
            $('#filter').submit();
        })
    })
</script>
