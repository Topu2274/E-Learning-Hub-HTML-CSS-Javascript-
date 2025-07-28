<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News Portal - Premier University</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
      text-align: center;
    }
    header {
      background-color: #003366;
      color: white;
      padding: 20px;
      font-size: 24px;
    }
    .home-btn {
      display: inline-block;
      margin: 20px auto;
      padding: 12px 20px;
      background: #ff6600;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-size: 16px;
      transition: 0.3s;
      box-shadow: 2px 4px 6px rgba(0, 0, 0, 0.2);
    }
    .home-btn:hover {
      background: #cc5500;
      transform: scale(1.05);
    }
    .news-container {
      max-width: 1100px;
      margin: 20px auto;
      padding: 20px;
      background: rgb(140, 172, 227);
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
    .news-item {
      background: #3975a5;
      width: 320px;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
      margin: 10px auto;
    }
    .news-item:hover {
      transform: scale(1.05);
    }
    .news-item h3 {
      color: #000000;
    }
    .news-item p {
      color: #ffffff;
    }
  </style>
</head>
<body>
  <header>
    <h1>News Portal</h1>
    <p>Latest updates and academic news</p>
  </header>
  <a href="index.php" class="home-btn">⬅ Back to Home</a>
  <main>
    <div class="news-container">
      <h2>Latest News</h2>
      <div class="news-item">
        <h3>New Semester Enrollment Open</h3>
        <p>Enrollment for the new semester starts from April 10th. Register now!</p>
      </div>
      <div class="news-item">
        <h3>Upcoming Programming Contest</h3>
        <p>Join the annual programming contest and showcase your coding skills.</p>
      </div>
      <div class="news-item">
        <h3>AI Workshop Announcement</h3>
        <p>A special workshop on AI trends and future advancements.</p>
      </div>
    </div>
  </main>
</body>
</html>
