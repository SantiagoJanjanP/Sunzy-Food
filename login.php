<?php require_once('./config.php') ?>



<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
 <?php require_once('inc/header.php') ?>
<body class="hold-transition login-page">
  <script>
    start_loader()
  </script>
  <style>
      body{
          width:calc(100%);
          height:calc(100%);
          background-repeat: no-repeat;
          background-size:cover;
      }
      #logo-img{
          width:15em;
          height:15em;
          object-fit:scale-down;
          object-position:center center;
      }
      #system_name{
        color:#fff;
        text-shadow: 3px 3px 3px #000;
      }
     
      
  </style>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered rounded-0" role="document" style="max-width: 800px;">
    <div class="modal-content rounded-0">
      <div class="modal-header rounded-0">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body rounded-0">
        <!-- Your modal content goes here -->
        <?php require_once('register.php') ?>
      </div>
      <div class="modal-footer">
        

      </div>
    </div>
  </div>
</div>



   <?php if($_settings->chk_flashdata('success')): ?>
      <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
      </script>
    <?php endif;?>
  <center><img src="<?= validate_image($_settings->info('logo')) ?>" alt="System Logo" class="img-thumbnail rounded-circle" id="logo-img"></center>
<h1 class="text-center" id="system_name"><?= $_settings->info('name') ?></h1>
  <div class="clear-fix my-2"></div>
<!-- <div class="login-box"> -->

  <!-- /.login-logo -->
  <!-- <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="./login.php" class="h1 text-decoration-none"><b>Client Login</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p> -->

      <form id="cclogin-frm" action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" autofocus placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
          <div class="input-group-append bg-transparent border-top-0 border-left-0 border-right-0 rounded-0">
                                        
                                        <span class="input-group-text bg-transparent border-top-0 border-left-0 border-right-0 rounded-0">
                                            <a href="javascript:void(0)" class="text-reset text-decoration-none pass_view"> <i class="fa fa-eye-slash"></i></a>
                                        </span>
                                        <span class="error-message"></span>
                                    </div>
          </div>
        </div>
        <div class="row-align-item-end">
         
          <!-- /.col -->
          <div class="text-center">
          <button type="submit" class="btn btn-primary btn-block btn-flat mx-auto d-block">Sign In</button>
   </div>
          
          <div class="col-12 text-center">
          
          </div>
          <!-- /.col -->
        </div>
        
      </form>
      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#registerModal">
  Register
</button>
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
      
    
    <!-- /.card-body -->
  
  <!-- /.card -->

<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
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
   $('.pass_view').click(function () {
        var _el = $(this).closest('.input-group')
        var type = _el.find('input').attr('type')
        if (type == 'password') {
            _el.find('input').attr('type', 'text').focus()
            $(this).find('i.fa').removeClass('fa-eye-slash').addClass('fa-eye')
        } else {
            _el.find('input').attr('type', 'password').focus()
            $(this).find('i.fa').addClass('fa-eye-slash').removeClass('fa-eye')
        }
    })

  
  $(function(){
    end_loader();
    $('#cclogin-frm').submit(function(e){
        e.preventDefault();
        var _this = $(this)
            $('.err-msg').remove();
        var el = $('<div>')
            el.addClass("alert err-msg")
            el.hide()
        if(_this[0].checkValidity() == false){
            _this[0].reportValidity();
            return false;
            }
        start_loader();
        $.ajax({
            url:_base_url_+"classes/Login.php?f=login_client",
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            dataType: 'json',
            error:err=>{
                console.error(err)
                el.addClass('alert-danger').text("An error occured");
                _this.prepend(el)
                el.show('.modal')
                end_loader();
            },
            success:function(resp){
                if(typeof resp =='object' && resp.status == 'success'){
                    location.href= './';
                }else if(resp.status == 'failed' && !!resp.msg){
                    el.addClass('alert-danger').text(resp.msg);
                    _this.prepend(el)
                    el.show('.modal')
                }else{
                    el.text("An error occured");
                    console.error(resp)
                }
                $("html, body").scrollTop(0);
                end_loader()

            }
        })
    })
  })
</script>
</body>
</html>