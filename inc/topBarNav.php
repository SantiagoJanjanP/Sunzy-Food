<style>
  .user-img{
        position: absolute;
        height: 27px;
        width: 27px;
        object-fit: cover;
        left: -7%;
        top: -12%;
  }
  .btn-rounded{
        border-radius: 50px;
  }

  .LoginButton{
    padding-left: 50px;
  }
</style>
<!-- Navbar -->
      <style>
        #login-nav {
          position: fixed !important;
          top: 0 !important;
          z-index: 1038;
          padding: 0.3em 2.5em !important;
        }
        #top-Nav{
          top: 0em;
        }
        .text-sm .layout-navbar-fixed .wrapper .main-header ~ .content-wrapper, .layout-navbar-fixed .wrapper .main-header.text-sm ~ .content-wrapper {
          margin-top: calc(3.6) !important;
          padding-top: calc(3.2em) !important
      }
      </style>
       
      <nav class="main-header navbar navbar-expand-md navbar-light border-0 text-sm bg-gradient-light shadow" id='top-Nav'>
        
       
          <a href="./" class="navbar-brand">
            <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Site Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span><?= $_settings->info('short_name') ?></span>
          </a>

         

          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
           
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="./" class="nav-link <?= isset($page) && $page =='home' ? "active" : "" ?>">Home</a>
              </li>
              <li class="nav-item">
                <a href="./?page=products" class="nav-link <?= isset($page) && $page =='products' ? "active" : "" ?>">Menu</a>
              </li>
              <li class="nav-item">
                <a href="./?page=about" class="nav-link <?= isset($page) && $page =='about' ? "active" : "" ?>">About Us</a>
              </li>
              <li class="nav-item">
                <a href="./?page=contacts" class="nav-link <?= isset($page) && $page =='contacts' ? "active" : "" ?>">Contacts</a>
              </li>

              
              
              <?php if($_settings->userdata('id') > 0 && $_settings->userdata('login_type') == 3): ?>
            
              <li class="nav-item">
                <a href="./?page=orders/my_orders" class="nav-link <?= isset($page) && $page =='orders/my_orders' ? "active" : "" ?>">My Orders</a>
              </li>
              <li class="nav-item">
                
             
        
          
          
            <?php if($_settings->userdata('id') > 0 && $_settings->userdata('login_type') ==3): ?>
              
              <!-- <span class="mx-2">Howdy, <?= !empty($_settings->userdata('username')) ? $_settings->userdata('username') : $_settings->userdata('email') ?></span>
              <span class="mx-1"><a href="<?= base_url.'classes/Login.php?f=logout_client' ?>"><i class="fa fa-power-off"></i></a></span> -->
            
            <?php else: ?>
             
            <?php endif; ?>
          
        
     


              
              </li>
              <?php endif; ?>
            </ul>
          </div>
          <!-- Right navbar links -->
          <div class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <button class="navbar-toggler order-1 border-0 text-sm" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <?php
// Replace this with your actual login check logic.
$loggedIn = $_settings->userdata('id') > 0 && $_settings->userdata('login_type') == 3;

if ($loggedIn) {
    // User is logged in, show the dropdown menu.
    ?>
    <div class="dropdown">
        <a href="javascript:void(0)" class="dropdown-toggle text-reset text-decoration-none" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mx-2"><span class="fa fa-user">
            <span class="mx-2"> <?= !empty($_settings->userdata('username')) ? $_settings->userdata('username') : $_settings->userdata('firstname') ?></span></span>

        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="./?page=manage_account">Account</a>
           
            <a href="./?page=orders/my_orders" class="dropdown-item <?= isset($page) && $page =='orders/my_orders' ? : "" ?>">My Orders</a>
            <a class="dropdown-item" href="<?= base_url.'classes/Login.php?f=logout_client' ?>">Logout</a>
        </div>
    </div>
    <?php
} else {
    // User is not logged in, show login and signup buttons.
    ?>
    <div class="LoginButton">
     <button class="btn btn-primary" id="login-btn">Login</button>
      <button class="btn btn-secondary" id="register-btn">Signup</button>


        
    </div>
    <?php
}
?>
          </div>
          
        
      </nav>
      <!-- /.navbar -->

      <script>
  $(function(){
    $('#login-btn').click(function(){
      uni_modal("","login.php")
    });

    $('#register-btn').click(function(){
      uni_modal("","register.php")
    });

    $('#navbarResponsive').on('show.bs.collapse', function () {
      $('#mainNav').addClass('navbar-shrink')
    });

    $('#navbarResponsive').on('hidden.bs.collapse', function () {
      if($('body').offset.top == 0)
        $('#mainNav').removeClass('navbar-shrink')
    });

    $('#search-form').submit(function(e){
      e.preventDefault();
      var sTxt = $('[name="search"]').val();
      if(sTxt != '')
        location.href = './?p=products&search='+sTxt;
    });

    // Add this click event to manually close the modal when clicking outside
    // $(document).on('click', function (e) {
    //   if ($(e.target).hasClass('modal')) {
    //     $('#uni_modal').modal('hide');
    //   }
    // });
  });
</script>

      <script>
        $(function(){
          
        })
      </script>