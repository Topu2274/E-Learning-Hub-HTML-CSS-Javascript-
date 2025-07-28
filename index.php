<?php
// Start the session
session_start();

// Include the database connection
include 'connection/connection.php';

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Fetch the user's role and name from the database
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT name, role FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Check if the user is a student
if ($user['role'] !== 'student') {
    header("Location: logout.php");
    exit();
}

// Handle name update if submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_name'])) {
    $new_name = $_POST['new_name'];
    $stmt = $conn->prepare("UPDATE users SET name = ? WHERE email = ?");
    $stmt->bind_param("ss", $new_name, $email);
    $stmt->execute();
    $stmt->close();
    // Update the displayed name
    $user['name'] = $new_name;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Premier University E-Learning Hub</title>
  <link rel="stylesheet" href="style.css">
  <style>
    /* General Styling */
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
      text-align: center;
    }

    /* Navigation Styling */
    nav {
      display: flex;
      justify-content: center;
      gap: 20px;
      background: rgba(0, 0, 0, 0.8);
      padding: 12px;
      border-radius: 12px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
    }

    nav a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      font-size: 18px;
      padding: 10px 18px;
      border-radius: 8px;
      transition: all 0.3s ease-in-out;
    }

    nav a:hover {
      background: #ff6600;
      transform: scale(1.1);
    }

    /* Student Name Styling */
    .student-name-container {
      position: fixed;
      top: 20px;
      right: 150px; /* Adjusted to position above logout button */
      z-index: 10;
    }

    #student-name {
      padding: 8px 16px;
      background: linear-gradient(135deg, #00c6ff, #0072ff);
      color: white;
      border: none;
      border-radius: 20px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    #student-name:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0, 114, 255, 0.4);
    }

    /* Name Change Form (Hidden by Default) */
    .name-change-form {
      display: none;
      position: fixed;
      top: 60px;
      right: 150px;
      background: rgba(255, 255, 255, 0.95);
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
      z-index: 11;
    }

    .name-change-form input[type="text"] {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 1rem;
      width: 150px;
    }

    .name-change-form button {
      padding: 8px 16px;
      background: #28a745;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
      transition: all 0.3s ease;
    }

    .name-change-form button:hover {
      background: #218838;
    }

    /* Logout Button */
    #logout-button {
      position: fixed;
      top: 20px;
      right: 20px;
      padding: 10px 20px;
      background: linear-gradient(135deg, #ff416c, #ff4b2b);
      color: white;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      font-size: 1rem;
      font-weight: 600;
      transition: all 0.3s ease;
      z-index: 10;
    }

    #logout-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(255, 75, 43, 0.4);
    }

    /* Categories Section */
    #categories {
      text-align: center;
      margin-top: 50px;
    }

    .category-list {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 15px;
      padding: 20px;
    }

    .category-list a {
      text-decoration: none;
    }

    .category-list button {
      background: #007bff;
      color: white;
      border: none;
      padding: 12px 24px;
      font-size: 18px;
      cursor: pointer;
      border-radius: 8px;
      transition: all 0.3s ease-in-out;
      box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
    }

    .category-list button:hover {
      background: #0056b3;
      transform: scale(1.1);
      box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.3);
    }

    /* Admin Button (Commented Out) */
    #admin-button {
      display: block;
      text-align: center;
      margin-top: 100px;
      padding-bottom: 50px;
    }

    #admin-button a {
      padding: 10px 20px;
      background-color: #ff6600;
      color: white;
      border-radius: 8px;
      text-decoration: none;
      font-size: 18px;
      transition: all 0.3s ease-in-out;
    }

    #admin-button a:hover {
      background-color: #cc5200;
    }
  </style>
</head>
<body>
  <!-- Header Section -->
  <header>
    <div class="welcome-box">
      <h1>Welcome to Premier University E-Learning Hub</h1>
      <p>Your gateway to knowledge and learning</p>
    </div>
    <nav>
      <!-- Navigation links removed -->
    </nav>
  </header>

  <!-- Student Name and Change Form -->
  <div class="student-name-container">
    <button id="student-name" onclick="toggleNameForm()"><?php echo htmlspecialchars($user['name']); ?></button>
    <form class="name-change-form" id="name-change-form" method="POST" action="">
      <input type="text" name="new_name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
      <button type="submit">Update Name</button>
    </form>
  </div>

  <!-- Logout Button -->
  <form action="logout.php" method="POST">
    <button type="submit" id="logout-button">Logout</button>
  </form>

  <!-- Main Content -->
  <main>
    <!-- Categories Section -->
    <section id="categories">
      <h2>Categories</h2>
      <div class="category-list">
        <a href="newportal.php"><button>News Portal</button></a>
        <a href="programs-events.php"><button>Programs & Events</button></a>
        <a href="course/courses.php"><button>Courses</button></a>
        <a href="career-opportunities.php"><button>Career Opportunities</button></a>
      </div>
    </section>

    <!-- Book List Section -->
    <section id="book-list">
      <h2>Book List</h2>
      <div class="category-list">
        <a href="category/category-ieee.php"><button>IEEE</button></a>
        <a href="category/category-robotics.php"><button>Robotics</button></a>
        <a href="category/category-networking.php"><button>Networking</button></a>
        <a href="category/category-machine-learning.php"><button>Machine Learning</button></a>
        <a href="category/category-ai.php"><button>Artificial Intelligence</button></a>
        <a href="category/category-programming.php"><button>Programming</button></a>
        <a href="category/category-math.php"><button>Engineering Mathematics</button></a>
      </div>
    </section>

    <!-- Admin Button (Commented Out) -->
    <!-- <section id="admin-button">
      <a href="admin-login-register.php">Admin Login/Register</a>
    </section> -->
  </main>

  <script>
    // Toggle the name change form visibility
    function toggleNameForm() {
      const form = document.getElementById('name-change-form');
      form.style.display = form.style.display === 'block' ? 'none' : 'block';
    }
  </script>
</body>
</html>