<?php
// Include environment configuration
include('head.php');
?>
    <div class="container d-flex justify-content-center align-items-center vh-100">
      <div class="card" style="width: 100%; max-width: 500px;">
        <div class="card-body">
          <h5 class="card-title text-center mb-4">Register</h5>
          <form action="register_process.php" method="POST">
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="fullname" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="fullname" name="fullname">
            </div>
            <div class="mb-3">
              <label for="phonenumber" class="form-label">Phone Number</label>
              <input type="text" class="form-control" id="phonenumber" name="phonenumber">
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="mb-3">
              <label for="role" class="form-label">Role</label>
              <select id="role" name="role" class="form-select" required>
                <option value="" disabled selected>Select your role</option>
                <option value="user">User</option>
                <option value="dealer">Admin</option>
              </select>
            </div>
            <button type="submit" name="register" class="btn rounded-0  btn-primary w-100">Register</button>
          </form>
          <p class="mt-3 text-center">Already have an account? <a href="login">Login</a></p>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
