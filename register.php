<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('./config.php') 


?>
 <?php require_once('inc/header.php') ?>
<body class="hold-transition">
<script>
    start_loader();

    // Function to validate the form before submission
    function validateForm() {
        var form = document.getElementById('registrationForm');
        var inputs = form.querySelectorAll('input');
        var isValid = true;
        inputs.forEach(function(input) {
            if (input.value.trim() === '') {
                isValid = false;
            }
        });
        if (!isValid) {
            alert('Please fill in all fields before submitting.');
            return false;
        }
        return true;
    }
  </script>
  <style>
      html,body{
          height: calc(100%);
          width: calc(100%);
      }
      body{
          width:calc(100%);
          height:calc(100%);
          /* background-image:url('<?= validate_image($_settings->info('cover')) ?>'); */
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
      #cimg{
          width:200px;
          height:200px;
          object-fit:scale-down;
          object-position:center center
      }
      .bubble-message {
    position: relative;
    background-color: #f0f0f0;
    border-radius: 8px;
    padding: 15px;
    max-width: 300px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
}

.bubble-message .arrow {
    position: absolute;
    width: 15px;
    height: 15px;
    background-color: #f0f0f0;
    transform: rotate(45deg);
    bottom: -7px;
    left: 20px;
    z-index: -1;
}

.bubble-message .message {
    color: #333;
    font-size: 14px;
}

.bubble-message p {
    margin-bottom: 10px;
    font-weight: bold;
}

.bubble-message ul {
    padding-left: 20px;
}

.bubble-message ul li {
    margin-bottom: 5px;
}
.required-asterisk {
    color: red;
    margin-left: 5px;
}
  </style>
  <script>
  </script>
  <!-- <div class="d-flex justify-content-center align-items-center flex-row h-100">
        <div class="col-5">
            
            <center><img src="<?= validate_image($_settings->info('logo')) ?>" alt="System Logo" class="img-thumbnail rounded-circle" id="logo-img"></center>
            <h1 class="text-center" id="system_name"><?= $_settings->info('name') ?></h1>
        </div> -->
        
        
<!-- 
<div class="modal fade bd-example-modal-lg" id="register-btn" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">


    <div class="card-body"> -->
                   
    
          
                
                   
                   
                    <a href="./register.php" class="h1"><b>Create an Account</b></a>
                   
                    
                   

                    <form id="registrationForm" action="registration.php" method="post" novalidate onsubmit="return validateForm()">

                  
                        <input type="hidden" name="id">
                       
                        <div class="row">
                            <div class="form-group col-md-4">
                            <label for="firstname" class="control-label">First Name<span class="required-asterisk">*</span></label>
                                <input type="text" id="firstname" autofocus name="firstname" class="form-control form-control-sm form-control-border" required>
                                <span class="error-message"><?php if (!empty($fnameErr) && $fnameErr != 1) echo $fnameErr; ?></span>
                            </div>
                            

                            <div class="form-group col-md-4">
                                <label for="middlename" class="control-label">Middle Name</label>
                                <input type="text" id="middlename" name="middlename" class="form-control form-control-sm form-control-border" placeholder="">
                                
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lastname" class="control-label">Last Name<span class="required-asterisk">*</span></label>
                                <input type="text" id="lastname" name="lastname" class="form-control form-control-sm form-control-border" required>
                                <span class="error-message"></span>
                            </div>
                            <div class="form-group col-md-4">
    <label for="gender" class="control-label">Gender<span class="required-asterisk">*</span></label>
    <select type="text" id="gender" name="gender" class="form-control form-control-sm form-control-border select" required>
        <option disabled selected>Select gender</option>
        <option>Male</option>
        <option>Female</option>
        <option>Non-binary</option>
        <option>Other</option>
        <option>Prefer not to say</option>
    </select>
    <span class="error-message"></span>
</div>
                            <div class="form-group col-md-4">
                              <label for="contact" class="control-label">Phone Number<span class="required-asterisk">*</span></label>
                                <input type="text" id="contact" name="contact" maxlength="14" class="form-control form-control-sm form-control-border" required>
                                    <span class="error-message"></span>
                                </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="address" class="control-label">Address<span class="required-asterisk">*</span></label>
                                <textarea rows="3" id="address" name="address" class="form-control form-control-sm rounded-0" required></textarea>
                                <span class="error-message"></span>
                            </div>
                        </div>
                        <!-- <div class="row">
        <div class="form-group col-md-4">
            <label for="house_number" class="control-label">House Number</label>
            <input type="text" id="address" name="address" class="form-control form-control-sm form-control-border" required>
            <span class="error-message"></span>
        </div>
        <div class="form-group col-md-4">
            <label for="town" class="control-label">Town</label>
            <input type="text" id="address" name="address" class="form-control form-control-sm form-control-border" required>
            <span class="error-message"></span>
        </div>
        <div class="form-group col-md-4">
            <label for="city" class="control-label">City</label>
            <input type="text" id="address" name="address" class="form-control form-control-sm form-control-border" required>
            <span class="error-message"></span>
        </div>
    </div> -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email" class="control-label">Email<span class="required-asterisk">*</span></label>
                                <input type="email" id="email" name="email" class="form-control form-control-sm form-control-border" required>
                                <span class="error-message"></span>
                            </div>
                        </div>
                      
                        <div class="row">
                        <div class="form-group col-md-6">
    <label for="password" class="control-label">Password<span class="required-asterisk">*</span></label>
    <div class="input-group input-group-sm">
        <input type="password" id="password" name="password" class="form-control form-control-sm form-control-border" required>
        <div class="input-group-append bg-transparent border-top-0 border-left-0 border-right-0 rounded-0">
            <span class="input-group-text bg-transparent border-top-0 border-left-0 border-right-0 rounded-0">
                <a href="javascript:void(0)" class="text-reset text-decoration-none pass_view"> <i class="fa fa-eye-slash"></i></a>
            </span>
            <span class="error-message"></span>
        </div>
    </div>
    <div class="bubble-message" id="password-requirements">
    <div class="arrow"></div>
    <div class="message">
        <p>Password Requirements:</p>
        <ul>
            <li>At least 8 characters</li>
            <li>At least 1 lowercase letter</li>
            <li>At least 1 uppercase letter</li>
            <li>At least 1 number</li>
            <li>At least 1 special character</li>
        </ul>
    </div>
</div>
    <!-- <div id="password-requirements" class="password-requirements"></div> Floating message area for password requirements -->
</div>
                            <div class="form-group col-md-6">
                                <label for="cpassword" class="control-label">Confirm Password<span class="required-asterisk">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="password" id="cpassword" class="form-control form-control-sm form-control-border" required>
                                    <div class="input-group-append bg-transparent border-top-0 border-left-0 border-right-0 rounded-0">
                                        <span class="input-group-text bg-transparent border-top-0 border-left-0 border-right-0 rounded-0">
                                            <a href="javascript:void(0)" class="text-reset text-decoration-none pass_view"> <i class="fa fa-eye-slash"></i></a>
                                        </span>
                                        <span class="error-message"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="form-group col-md-6">
                                <label for="logo" class="control-label">Image</label>
                                <input type="file" id="logo" name="img" class="form-control form-control-sm form-control-border" onchange="displayImg(this,$(this))" accept="image/png, image/jpeg" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 text-center">
                                <img src="<?= validate_image('') ?>" alt="Shop Logo" id="cimg" class="border border-gray img-thumbnail">
                            </div>
                        </div> -->
                        <!-- Your existing form fields remain unchanged -->

                        <div class="row align-item-end">
                            <!-- Your existing content remains unchanged -->
                            <div class="col-8">
                                <a href="<?= base_url ?>">Back to Site</a>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat">Create Account</button>
                            </div>
                            <!-- <div class="col-12 text-center">
                            <a href="<?= base_url.'./login.php' ?>">Already have an Account</a>
                            </div> -->
                        <!-- /.col -->
                        </div>
                    </form>
                    <script>
    // Function to validate the form before submission
    function validateForm() {
        var form = document.getElementById('registrationForm');
        var inputs = form.querySelectorAll('input:not([type="hidden"])'); // Exclude hidden inputs
        var isValid = true;
        inputs.forEach(function(input) {
            if (input.value.trim() === '') {
                isValid = false;
            }
        });
        if (!isValid) {
            alert('Please fill in all fields before submitting.');
            return false;
        }
        return true;
    }

    // Add event listener to form submission
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
</script>


                </div>
            </div>
            
        </div>
<!-- 
               </div>

      
    </div>
  </div>
</div> -->

        
  <!-- </div> -->


<!-- jQuery -->
<script src="<?php echo base_url ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- <script src="<?php echo base_url ?>dist/js/adminlte.min.js"></script> -->
<!-- Select2 -->
<script src="<?php echo base_url ?>plugins/select2/js/select2.full.min.js"></script>

<script>
    

    
    $(function () {
    // Function to validate if input contains only letters and spaces
    function isValidName(input) {
        return /^[a-zA-Z\s]+$/.test(input);
    }

    // Function to validate if input contains at least 1 lowercase, 1 uppercase, 1 special character, and is within 10 characters
    function isValidPassword(input) {
        return /^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*[0-9])(?=.{1,10}$)/.test(input);
    }

    // Function to update password requirements message
    function updatePasswordRequirementsMessage(message) {
        $('#password-requirements').text(message);
    }

    // Function to check password requirements and return appropriate message
    function getPasswordRequirementsMessage(password) {
        // Define your password requirements here
        var requirements = [
            "At least 8 characters",
            "At least 1 lowercase letter",
            "At least 1 uppercase letter",
            "At least 1 number",
            "At least 1 special character"
        ];

        var message = "";
        for (var i = 0; i < requirements.length; i++) {
            if (!meetsRequirement(password, requirements[i])) {
                message += "- " + requirements[i] + "\n";
            }
        }
        if (message === "") {
            message = "Password meets all requirements.";
        }
        return message;
    }

    // Function to check if password meets a specific requirement
    function meetsRequirement(password, requirement) {
        switch (requirement) {
            case "At least 8 characters":
                return password.length >= 8;
            case "At least 1 lowercase letter":
                return /[a-z]/.test(password);
            case "At least 1 uppercase letter":
                return /[A-Z]/.test(password);
            case "At least 1 number":
                return /[0-9]/.test(password);
            case "At least 1 special character":
                return /[^A-Za-z0-9]/.test(password);
            default:
                return false;
        }
    }

    // Add event listener for password input field
    $('#password').on('input', function () {
        var passwordValue = $(this).val();
        var requirementsMessage = getPasswordRequirementsMessage(passwordValue);
        updatePasswordRequirementsMessage(requirementsMessage);
    });


    end_loader();
    $('body').height($(window).height());
    $('.select2').select2({
        placeholder: "Please Select Here",
        width: '100%'
    });
    $('.select2-selection').addClass("form-border");
    $('.pass_view').click(function () {
        var _el = $(this).closest('.input-group');
        var type = _el.find('input').attr('type');
        if (type == 'password') {
            _el.find('input').attr('type', 'text').focus();
            $(this).find('i.fa').removeClass('fa-eye-slash').addClass('fa-eye');
        } else {
            _el.find('input').attr('type', 'password').focus();
            $(this).find('i.fa').addClass('fa-eye-slash').removeClass('fa-eye');
        }
    });

    // Add event listeners for input fields
    $('#firstname, #middlename, #lastname').on('input', function () {
        var fieldValue = $(this).val();
        var isValid = isValidName(fieldValue);
        if (isValid) {
            $(this).removeClass('is-invalid').addClass('is-valid');
            $(this).siblings('.error-message').text("");
        } else {
            $(this).removeClass('is-valid').addClass('is-invalid');
            $(this).siblings('.error-message').text("Please enter a valid name without numbers or special characters.");
        }
    });

    // Contact field formatting
    $('#contact').on('input', function () {
        var inputValue = $(this).val();
        if (!inputValue.startsWith('+63')) {
            // If input does not start with "+63", prepend it
            $(this).val('+63 ' + inputValue);
        }
    });

    // Allow typing numbers in the contact field
    $('#contact').on('keypress', function (e) {
        var keyCode = e.which ? e.which : e.keyCode;
        // Allow numeric input, backspace, delete, and arrow keys
        if (!(keyCode >= 48 && keyCode <= 57) && keyCode !== 8 && keyCode !== 46 && keyCode !== 37 && keyCode !== 39) {
            e.preventDefault();
        }
    });

    $('#cregister-frm').submit(function (e) {
        e.preventDefault();
        var _this = $(this);
        $('.error-message').text(''); // Clear existing error messages
        $('.form-control').removeClass('is-invalid is-valid'); // Remove is-invalid and is-valid classes
        var el = $('<div>');
        el.addClass("alert err-msg");
        el.hide();
        var isValid = true;

        // Check each input field for validation
        $('#firstname').trigger('input');
        $('#middlename').trigger('input');
        $('#lastname').trigger('input');
        $('#gender').trigger('input'); // Trigger validation for gender
        $('#contact').trigger('input'); // Trigger validation for phone number
        $('#address').trigger('input');

        if ($('#password').val() != $('#cpassword').val()) {
            // Passwords do not match
            isValid = false;
            el.addClass('alert-danger').text('Password does not match.');
            $('#cpassword').addClass('is-invalid');
            $('#cpassword').siblings('.error-message').text('Password does not match.');
            _this.append(el);
            el.show('slow');
            $('html,body').scrollTop(0);
            // Auto-dismiss error message after 10 seconds
            setTimeout(function() {
                el.hide('slow');
            }, 10000);
            return false;
        }

        // Validate password
        var passwordValue = $('#password').val();
        if (!isValidPassword(passwordValue)) {
            isValid = false;
            $('#password').addClass('is-invalid');
            $('#password').siblings('.error-message').text("Password must contain at least 1 lowercase, 1 uppercase, 1 special character, and be within 10 characters.");
            return false;
        }

        if (isValid) {
            start_loader();
            $.ajax({
                url: _base_url_ + "classes/Users.php?f=save_client",
                data: new FormData(_this[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                error: err => {
                    console.error(err);
                    el.addClass('alert-danger').text("An error occurred");
                    _this.prepend(el);
                    el.show('.modal');
                    // Auto-dismiss error message after 10 seconds
                    setTimeout(function() {
                        el.hide('slow');
                    }, 10000);
                    end_loader();
                },
                success: function (resp) {
                    if (typeof resp == 'object' && resp.status == 'success') {
                        location.href = './index.php';
                    } else if (resp.status == 'failed' && !!resp.msg) {
                        el.addClass('alert-danger').text(resp.msg);
                        _this.prepend(el);
                        el.show('.modal');
                        // Auto-dismiss error message after 10 seconds
                        setTimeout(function() {
                            el.hide('slow');
                        }, 10000);
                    } else {
                        el.text("An error occurred");
                        console.error(resp);
                    }
                    $("html, body").scrollTop(0);
                    end_loader();
                }
            });
        }
    });

    $('#house_number, #town, #city').on('input', function () {
        var fieldValue = $(this).val();
        if (fieldValue.trim() !== '') {
            $(this).removeClass('is-invalid').addClass('is-valid');
            $(this).siblings('.error-message').text("");
        } else {
            $(this).removeClass('is-valid').addClass('is-invalid');
            $(this).siblings('.error-message').text("This field is required.");
        }
    });

    // Add event listener for password input field
    $('#password').on('input', function () {
        var passwordValue = $(this).val();
        var isValid = isValidPassword(passwordValue);
        if (isValid) {
            $(this).removeClass('is-invalid').addClass('is-valid');
            $(this).siblings('.error-message').text("");
        } else {
            $(this).removeClass('is-valid').addClass('is-invalid');
            $(this).siblings('.error-message').text("Password must contain at least 1 lowercase, 1 uppercase, 1 special character, and be within 10 characters.");
        }
    });

    // Function to validate if input contains at least 1 lowercase, 1 uppercase, 1 special character, and is within 10 characters
    function isValidPassword(input) {
        return /^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*[0-9])(?=.{1,10}$)/.test(input);
    }
});
</script>







</body>
</html>