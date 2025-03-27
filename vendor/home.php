<?php
// Assuming $_settings and $conn are initialized properly

// Fetch counts from the database
$category_query = $conn->query("SELECT count(id) as total FROM category_list where delete_flag = 0 and vendor_id = '{$_settings->userdata('id')}' ");
$category_count = $category_query->fetch_assoc()['total'];

$service_query = $conn->query("SELECT count(id) as total FROM product_list where delete_flag = 0 and vendor_id = '{$_settings->userdata('id')}' ");
$service_count = $service_query->fetch_assoc()['total'];

$pending_request_query = $conn->query("SELECT count(id) as total FROM order_list where `status` = 0 and vendor_id = '{$_settings->userdata('id')}' ");
$pending_request_count = $pending_request_query->fetch_assoc()['total'];

$client_query = $conn->query("SELECT count(id) as total FROM client_list where delete_flag = 0 ");
$client_count = $client_query->fetch_assoc()['total'];

$total_pending_orders_query = $conn->query("SELECT count(id) as total FROM order_list where status = 0 ");
$total_pending_orders_count = $total_pending_orders_query->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Include necessary CSS and JS libraries for the chart -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.css">

  <style>
    .dashboard {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    .chart-container {
      flex: 1;
      max-width: 500px;
      margin: 50px;
    }
  </style>
</head>
<body>
  <h1>Welcome to <?php echo $_settings->info('name') ?> - Admin Side</h1>
  <hr>
  
  <div class="row">
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Categories</span>
        <span class="info-box-number text-right h4">
          <?php echo format_num($category_count); ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-secondary elevation-1"><i class="fas fa-boxes"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Menu</span>
        <span class="info-box-number text-right h4">
          <?php echo format_num($service_count); ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pending Request</span>
        <span class="info-box-number text-right h4">
          <?php echo format_num($pending_request_count); ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-maroon elevation-1"><i class="fas fa-user-friends"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Clients</span>
        <span class="info-box-number text-right h4">
          <?php echo format_num($client_count); ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Total Pending Orders</span>
        <span class="info-box-number text-right h4">
          <?php echo format_num($total_pending_orders_count); ?>
        </span>
      </div>
    </div>
  </div>
</div>
<div class="dashboard">
    <div class="chart-container">
      <h2>Data Overview</h2>
      <canvas id="myChart" width="400" height="400"></canvas>
    </div>
    <div class="chart-container">
      <h2>Pending Requests Status</h2>
      <canvas id="pieChart" width="400" height="400"></canvas>
    </div>
  </div>
  

  <!-- <div class="clear-fix mb-2">
    <div class="text-center w-100">
      <img src="<?= validate_image($_settings->info('cover')) ?>" alt="System Cover image" class="w-100" id="cover-image">
    </div>
  </div> -->

  <!-- Include Chart.js library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

  <!-- <canvas id="myChart" width="400" height="400"></canvas> -->

  <script>
    // Create a bar chart
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Categories', 'Services', 'Pending Requests', 'Clients', 'Total Pending Orders'],
        datasets: [{
          label: 'Counts',
          data: [<?php echo $category_count; ?>, <?php echo $service_count; ?>, <?php echo $pending_request_count; ?>, <?php echo $client_count; ?>, <?php echo $total_pending_orders_count; ?>],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
 <!-- New chart canvas for pie chart -->
 <canvas id="pieChart" width="400" height="400"></canvas>

<!-- New chart script for pie chart -->
<script>
  var pieCtx = document.getElementById('pieChart').getContext('2d');
  var pieChart = new Chart(pieCtx, {
    type: 'pie',
    data: {
      labels: ['Categories', 'Services', 'Pending Requests', 'Clients', 'Total Pending Orders'],
      datasets: [{
        label: 'Counts',
        data: [<?php echo $category_count; ?>, <?php echo $service_count; ?>, <?php echo $pending_request_count; ?>, <?php echo $client_count; ?>, <?php echo $total_pending_orders_count; ?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
</body>
</html>
