<?php
    include '../functions/select_role_fxn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>
<link rel="stylesheet" href="../css/signup.css">
<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script>
  function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var role = document.getElementById("role").value;
    
    var usernameRegex = /^[a-zA-Z0-9_ ]{3,20}$/;
    var emailRegex = /^[a-zA-Z0-9._%+-]+@ashesi\.edu\.gh$/;
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,}$/;
    
    if (!username.match(usernameRegex)) {
      alert("Username must be alphanumeric and between 3 to 20 characters.");
      return false;
    }
    
    if (!email.match(emailRegex)) {
      alert("Email must be in the format example@ashesi.edu.gh");
      return false;
    }
    
    if (!password.match(passwordRegex)) {
      alert("Password must contain at least one uppercase letter, one lowercase letter, one digit, and be at least 8 characters long.");
      return false;
    }
    
    return true;
  }
  
  function togglePassword() {
    var passwordInput = document.getElementById("password");
    var icon = document.getElementById("password-toggle-icon");
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    } else {
      passwordInput.type = "password";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");

      
    }
  }
</script>
</head>
<body>
  <div class="navbar">
    <div class="logo">ASBED</div>
  </div>
  <div class="signup-container">
    <h2>Sign Up</h2>
    <form action="../actions/register_user_action.php" method="post" onsubmit="return validateForm()" required>
      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="role">Role</label>
        <select id="role" name="role_id" required>
          <?php foreach ($roles as $role): ?>
            <?php if (strtolower($role['role_name']) !== 'admin'): ?>
              <option value="<?php echo $role['role_id']; ?>"><?php echo $role['role_name']; ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <i id="password-toggle-icon" class="fas fa-eye-slash" onclick="togglePassword()"></i>
      </div>
      <button type="submit" name="submit">Submit</button>
    </form>
    <hr class="divider">
    <button type="button" class="login-btn"><a href="../login/login_view.php"> I have an account</a></button>
  </div>
</body>
</html>
