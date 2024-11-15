<!-- Footer Section -->
<footer class="text-light" style="background-color: #1c1c1c; padding: 60px 0 0 0; position: relative;">
   <div class="container">
      <div class="row">
         <!-- Company Information -->
         <div class="col-lg-4 col-md-6 mb-4">
            <h5 class="footer-brand">KenzWheels</h5>
            <p class="footer-description">At KenzWheels, we offer exceptional car services tailored to meet your every need. Explore a wide range of cars and services with us today.</p>
            <!-- <p>&copy; 2024 KenzWheels. All rights reserved.</p> -->
            <img src="../assets/images/logo/logowhite.png" alt="KenzWheels Logo" style="height: 45px;">

         </div>

         <!-- Links -->
         <div class="col-lg-2 col-md-6 mb-4">
            <h5 class="footer-heading">Quick Links</h5>
            <ul class="list-unstyled footer-links">
               <li><a href="#" class="text-light">Used Cars</a></li>
               <li><a href="#" class="text-light">New Cars</a></li>
               <li><a href="#" class="text-light">Sell Your Car</a></li>
               <li><a href="#" class="text-light">Car Dealers</a></li>
            </ul>
         </div>

         <!-- Services -->
         <div class="col-lg-2 col-md-6 mb-4">
            <h5 class="footer-heading">Our Services</h5>
            <ul class="list-unstyled footer-links">
               <li><a href="#" class="text-light">Auto Parts</a></li>
               <li><a href="#" class="text-light">Price Calculator</a></li>
               <li><a href="#" class="text-light">Car Reviews</a></li>
               <li><a href="#" class="text-light">On-Road Price</a></li>
            </ul>
         </div>

         <!-- Newsletter Subscription -->
         <div class="col-lg-4 col-md-6 mb-4">
            <h5 class="footer-heading">Contact Us</h5>
            <p><i class="bi bi-telephone-fill"></i> +91 12345 67890</p>
            <p><i class="bi bi-envelope-fill"></i> info@kenzwheels.com</p>
            <p><i class="bi bi-geo-alt-fill"></i> Hyderabad, Telangana, India</p>
            <div class="social-icons d-flex gap-4 mt-3">
               <a href="#" class="text-light"><i class="bi bi-facebook"></i></a>
               <a href="#" class="text-light"><i class="bi bi-twitter"></i></a>
               <a href="#" class="text-light"><i class="bi bi-instagram"></i></a>
               <a href="#" class="text-light"><i class="bi bi-linkedin"></i></a>
            </div>
         </div>
      </div>
      <!-- Footer Bottom -->
      <div class="row text-center mt-4">
         <div class="col-md-12">
            <p class="mb-0">&copy; 2024 KenzWheels. All rights reserved.</p>
         </div>
      </div>
   </div>
   <div class="container-fluid p-0 m-0" style="padding: 0 !important; margin: 0 !important;">
    <!-- Wave SVG -->
    <div class="footer-wave m-0 p-0" style="margin: 0 !important; padding: 0 !important;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-100" style="display: block; margin: 0; padding: 0;">
            <path fill="#b73439" fill-opacity="1" d="M0,96L48,101.3C96,107,192,117,288,117.3C384,117,480,107,576,101.3C672,96,768,96,864,101.3C960,107,1056,117,1152,149.3C1248,181,1344,235,1392,261.3L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</div>



   <!-- JAVASCRIPT -->
   <!-- <script src="<?= BASE_URL ?>manage/assets/libs/jquery/jquery.min.js"></script> -->
   <script src="<?= BASE_URL ?>assets/lib/owl-carousel/js/jquery.min.js"></script>
   <script src="<?= BASE_URL ?>manage/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="<?= BASE_URL ?>manage/assets/libs/metismenu/metisMenu.min.js"></script>
   <script src="<?= BASE_URL ?>manage/assets/libs/simplebar/simplebar.min.js"></script>
   <script src="<?= BASE_URL ?>manage/assets/libs/node-waves/waves.min.js"></script>
   <script src="<?= BASE_URL ?>manage/assets/js/app.js"></script>
   <script src="<?= BASE_URL ?>manage/assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
   <script src="<?= BASE_URL ?>assets/lib/owl-carousel/js/owl.carousel.min.js"></script>

</footer>

<script>
   $(document).ready(function() {
      $('#loginForm').on('submit', function(e) {
         e.preventDefault(); // Prevent default form submission

         $.ajax({
            url: 'login.php', // Your PHP script to handle the login
            type: 'POST',
            data: $(this).serialize(), // Serialize form data
            success: function(response) {
               // Handle response
               const data = JSON.parse(response);
               if (data.success) {
                  Swal.fire({
                     position: 'center',
                     icon: 'success',
                     title: 'Login successful!',
                     showConfirmButton: false,
                     timer: 1500
                  }).then(() => {
                     window.location.href = data.redirect; // Redirect to the appropriate page
                  });
               } else {
                  Swal.fire({
                     position: 'center',
                     icon: 'error',
                     title: data.message,
                     showConfirmButton: false,
                     timer: 1500
                  });
               }
            },
            error: function() {
               Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'An error occurred. Please try again.',
                  showConfirmButton: false,
                  timer: 1500
               });
            }
         });
      });
   });
</script>
<script>
   $(document).ready(function() {
      // Form validation
      $('#registrationForm').on('submit', function(e) {
         e.preventDefault(); // Prevent default form submission
         // Check if the form is valid 
         if (this.checkValidity()) {
            $.ajax({
               url: 'PasswordRecover.php', // Your PHP script to handle registration
               type: 'POST',
               data: $(this).serialize(), // Serialize form data
               dataType: 'json', // Expect JSON response
               success: function(data) {
                  if (data.success) {
                     Swal.fire({
                        icon: 'success',
                        title: data.message,
                        text: 'Redirecting to OTP verification...',
                        timer: 1500,
                        onClose: () => {
                           window.location.href = data.redirect; // Redirect to OTP verification page
                        }
                     });
                  } else {
                     Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message,
                     });
                  }
               },
               error: function(jqXHR, textStatus, errorThrown) {
                  Swal.fire({
                     icon: 'error',
                     title: 'An error occurred',
                     text: 'Please try again later. Error: ' + errorThrown,
                  });
               }
            });
         } else {
            // Show validation errors
            this.classList.add('was-validated');
         }
      });
   });
</script>

<script>
   $(document).ready(function() {
      var currentTab = 0; // Current tab is set to be the first tab (0)
      showTab(currentTab); // Display the current tab

      function showTab(n) {
         var x = $(".tab-pane");
         $(x[n]).addClass("active show").siblings().removeClass("active show");

         if (n === 0) {
            $(".previous").addClass("disabled");
         } else {
            $(".previous").removeClass("disabled");
         }
         if (n === (x.length - 1)) {
            $(".next").hide();
            $(".submit").show();
         } else {
            $(".next").show();
            $(".submit").hide();
         }

         var progress = ((n + 1) / x.length) * 100;
         $("#bar .progress-bar").css("width", progress + "%");
      }

      $(".next").click(function() {
         var valid = true;
         var form = $("form").eq(currentTab);
         $(form).find("input, textarea").each(function() {
            if (!$(this).val()) {
               valid = false;
            }
         });

         if (valid) {
            if (currentTab === 0) {
               const email = $('#email').val();
               const password = $('#password').val();
               const logo = $('#logo')[0].files[0];

               // Send OTP to the user's email
               $.ajax({
                  url: 'send_otp.php',
                  type: 'POST',
                  data: {
                     email: email
                  },
                  success: function(response) {
                     const data = JSON.parse(response);
                     if (data.success) {
                        currentTab++;
                        showTab(currentTab);
                     } else {
                        Swal.fire({
                           icon: 'error',
                           title: 'Error',
                           text: data.message,
                        });
                     }
                  },
                  error: function() {
                     Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred. Please try again.',
                     });
                  }
               });
            } else {
               currentTab++;
               showTab(currentTab);
            }
         } else {
            Swal.fire({
               icon: 'error',
               title: 'Oops...',
               text: 'Please fill in all required fields.',
            });
         }
      });

      $(".previous").click(function() {
         currentTab--;
         showTab(currentTab);
      });

      $("#sendOtpBtn").click(function() {
         const email = $('#email').val();
         $.ajax({
            url: 'send_otp.php',
            type: 'POST',
            data: {
               email: email
            },
            success: function(response) {
               const data = JSON.parse(response);
               if (data.success) {
                  Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'OTP sent to your email!',
                     showConfirmButton: false,
                     timer: 1500
                  });
               } else {
                  Swal.fire({
                     icon: 'error',
                     title: 'Error',
                     text: data.message,
                  });
               }
            },
            error: function() {
               Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'Failed to send OTP. Please try again.',
               });
            }
         });
      });

      $(document).ready(function() {
         $("#submitBtn").click(function() {
            const sellerData = $("#sellerDetailsForm").serializeArray(); // Use serializeArray to get an array of objects
            const businessData = $("#businessDetailsForm").serializeArray();
            const otp = $('#otp').val();
            const logo = $('#logo')[0].files[0]; // Assuming you have an input for logo
            const documentUpload = $('#document_upload')[0].files[0]; // Assuming you have an input for document upload

            const formData = new FormData();
            if (logo) {
               formData.append('logo', logo);
            }
            if (documentUpload) {
               formData.append('document_upload', documentUpload);
            }
            formData.append('otp', otp);

            // Append seller data
            sellerData.forEach(item => {
               formData.append(item.name, item.value);
            });

            // Append business data
            businessData.forEach(item => {
               formData.append(item.name, item.value);
            });

            // Now send the FormData via AJAX
            $.ajax({
               url: 'submit_registration.php',
               type: 'POST',
               data: formData,
               processData: false, // Important
               contentType: false, // Important
               success: function(response) {
                  const data = JSON.parse(response);
                  if (data.success) {
                     Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Registration successful!',
                        showConfirmButton: false,
                        timer: 1500
                     }).then(() => {
                        window.location.href = 'success_page.php';
                     });
                  } else {
                     Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message,
                     });
                  }
               },
               error: function() {
                  Swal.fire({
                     icon: 'error',
                     title: 'Error',
                     text: 'An error occurred. Please try again.',
                  });
               }
            });
         });
      });
   });
</script>