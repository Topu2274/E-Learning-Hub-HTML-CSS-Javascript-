<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection file
include 'connection/connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Use MD5 hashing
    $role = $_POST['role'];

    // Debug: Print POST data
    echo "<pre>POST Data: ";
    var_dump($_POST);
    echo "Hashed Password (MD5): $password</pre>";

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $existingUser = $result->fetch_assoc();

    if ($existingUser) {
        $error = "Email already registered. Please use a different email.";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $role); // "ssss" for four strings
        $success = $stmt->execute();

        if ($success) {
            echo "<p style='color: green;'>User inserted into database!</p>";
            header("Location: login.php?success=Registration successful! Please login.");
            exit();
        } else {
            $error = "Failed to insert user into database: " . $conn->error;
        }
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - E-Learning Hub</title>
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

    .register-container {
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

    .register-container h2 {
      color: #2575fc;
      margin-bottom: 20px;
      font-size: 2rem;
      font-weight: 600;
    }

    .register-container p {
      color: #555;
      margin-bottom: 30px;
      font-size: 0.9rem;
    }

    .register-container form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .register-container label {
      display: block;
      text-align: left;
      margin-bottom: 5px;
      font-weight: 500;
      color: #333;
    }

    .register-container input,
    .register-container select {
      width: 100%;
      padding: 12px;
      border: 1px solid rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .register-container input:focus,
    .register-container select:focus {
      border-color: #2575fc;
      box-shadow: 0 0 8px rgba(37, 117, 252, 0.3);
      outline: none;
    }

    .register-container button {
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

    .register-container button:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
    }

    .register-container nav {
      margin-top: 20px;
    }

    .register-container nav a {
      color: #2575fc;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .register-container nav a:hover {
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
  <div class="register-container">
    <h2>Create an Account</h2>
    <p>Join E-Learning Hub to access exclusive resources and courses.</p>
    <form id="register" method="POST" action="">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required placeholder="Enter your name">

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required placeholder="Enter your email">

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required placeholder="Enter your password">

      <label for="role">Role:</label>
      <select id="role" name="role">
        <option value="student">Student</option>
        <option value="teacher">Teacher</option>
        <option value="admin">Admin</option>
      </select>

      <button type="submit">Register</button>
    </form>

    <?php if (isset($error)): ?>
      <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <nav>
      <a href="index.php">Home</a> | 
      <a href="login.php">Login</a>
    </nav>
  </div>
</body>
</html>