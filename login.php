<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection file
include 'connection/connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Use MD5 hashing

    // Debug: Print POST data
    echo "<pre>POST Data: ";
    var_dump($_POST);
    echo "Hashed Password (MD5): $password</pre>";

    // Prepare and execute query to fetch password and role
    $stmt = $conn->prepare("SELECT password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    // Get result
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $user['password'] === $password) {
        // Successful login
        $_SESSION['email'] = $email;

        // Redirect based on role
        if ($user['role'] === 'student') {
            header("Location: index.php");
        } elseif ($user['role'] === 'admin') {
            header("Location: admin/admin_dashboard.php");
        } else {
            // For other roles (e.g., teacher), redirect to logout for now
            header("Location: logout.php");
        }
        exit();
    } else {
        $error = "Invalid email or password.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - E-Learning Hub</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-image: url('assets/images/book.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      font-family: 'Poppins', sans-serif;
    }

    .login-container {
      background: rgba(255, 255, 255, 0.9);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(10px);
      text-align: center;
      max-width: 400px;
      width: 100%;
      animation: fadeIn 1s ease-in-out;
    }

    .login-container h2 {
      color: #2575fc;
      margin-bottom: 20px;
      font-size: 2rem;
      font-weight: 600;
    }

    .login-container p {
      color: #555;
      margin-bottom: 30px;
      font-size: 0.9rem;
    }

    .login-container form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .login-container label {
      display: block;
      text-align: left;
      margin-bottom: 5px;
      font-weight: 500;
      color: #333;
    }

    .login-container input {
      width: 100%;
      padding: 12px;
      border: 1px solid rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .login-container input:focus {
      border-color: #2575fc;
      box-shadow: 0 0 8px rgba(37, 117, 252, 0.3);
      outline: none;
    }

    .login-container button {
      width: 100%;
      padding: 12px;
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .login-container button:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
    }

    .forgot-password {
      text-align: right;
      margin-top: -10px;
    }

    .forgot-password a {
      color: #2575fc;
      text-decoration: none;
      font-size: 0.9rem;
      transition: color 0.3s ease;
    }

    .forgot-password a:hover {
      color: #6a11cb;
    }

    .login-container nav {
      margin-top: 20px;
    }

    .login-container nav a {
      color: #2575fc;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .login-container nav a:hover {
      color: #6a11cb;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .error {
      color: red;
      font-size: 0.9rem;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Welcome Back!</h2>
    <p>Please login to continue to your E-Learning Hub account.</p>
    <form id="login" method="POST" action="">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required placeholder="Enter your email">

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required placeholder="Enter your password">
      
      <div class="forgot-password">
        <a href="forgot-password.php">Forgot Password?</a>
      </div>

      <button type="submit">Login</button>
    </form>

    <?php if (isset($error)): ?>
      <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <nav>
      <a href="index.php">Home</a> | 
      <a href="register.php">Register</a>
    </nav>
  </div>
</body>
</html>