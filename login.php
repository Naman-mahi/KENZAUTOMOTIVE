<?php
// Include environment configuration
include('head.php');
?>
    <div class="container d-flex justify-content-center align-items-center vh-100">
      <div class="card" style="width: 100%; max-width: 400px;">
        <div class="card-body">
          <h5 class="card-title text-center mb-4">Login</h5>
          <form action="includes/functions.php" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
          </form>
          <p class="mt-3 text-center">Don't have an account? <a href="register">Register</a></p>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
