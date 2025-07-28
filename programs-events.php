<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Programs & Events - Premier University</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #b65656;
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
      background: #f80f0f;
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

    /* Highlighted Events Header */
    .events-header {
      background: linear-gradient(to right, #e5089b, #0fefff);
      color: white;
      padding: 15px;
      font-size: 24px;
      font-weight: bold;
      border-radius: 10px;
      margin: 30px auto;
      width: fit-content;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    }

    .events-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin: 20px auto;
      max-width: 1200px;
    }
    .event-card {
      background: rgb(185, 204, 236);
      width: 300px;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease-in-out;
    }
    .event-card:hover { transform: scale(1.05); }
    .event-card img { width: 100%; height: 180px; border-radius: 8px; }
    .event-card h3 { margin: 10px 0; font-size: 20px; }
    .event-card p { font-size: 14px; color: #555; }
    .event-card .btn {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 15px;
      background: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      transition: 0.3s;
      cursor: pointer;
    }
    .event-card .btn:hover { background: #0056b3; }

    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      top: 0; left: 0; width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.6);
      justify-content: center;
      align-items: center;
    }
    .modal-content {
      background: rgb(228, 141, 141);
      padding: 20px;
      border-radius: 8px;
      width: 80%;
      max-width: 800px;
      text-align: center;
    }
    .close-btn {
      float: right;
      font-size: 22px;
      cursor: pointer;
    }
    .event-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 15px;
      text-align: center;
    }
    .event-item {
      background: #f9f9f9;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
    }
    .event-item img {
      width: 100%;
      height: 180px;
      border-radius: 8px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <header>Premier University - Programs & Events</header>
  <a href="index.php" class="home-btn">⬅ Home</a>
  
  <!-- Highlighted Header -->
  <div class="events-header">
    Explore Our Clubs & Events
  </div>

  <main>
    <div class="events-container">
      <div class="event-card">
        <img src="assets/images/logo1.jpeg" alt="Computer Club">
        <h3>Computer Club</h3>
        <p>Learn advanced web development, competitive programming, and more.</p>
        <button class="btn" onclick="openModal('computer')">Learn More</button>
      </div>
      <div class="event-card">
        <img src="assets/images/logo2.jpeg" alt="Robotics Club">
        <h3>Robotics Club</h3>
        <p>Connect with industry leaders and explore the world of robotics.</p>
        <button class="btn" onclick="openModal('robotics')">Learn More</button>
      </div>
      <div class="event-card">
        <img src="assets/images/logo3.png" alt="Debating Society">
        <h3>Debating Society</h3>
        <p>Enhance public speaking skills and engage in discussions.</p>
        <button class="btn" onclick="openModal('debating')">Learn More</button>
      </div>
    </div>
  </main>

  <!-- Modal -->
  <div id="eventModal" class="modal">
    <div class="modal-content">
      <span class="close-btn" onclick="closeModal()">&times;</span>
      <h2 id="modal-title"></h2>
      <div id="modal-body" class="event-list"></div>
    </div>
  </div>

  <script>
    const events = {
      computer: [
        { title: "IT Fest", img: "assets/images/a.jpg", desc: "Annual IT Fest with workshops and hackathons." },
        { title: "International Events", img: "assets/images/b.jpg", desc: "Global participation in tech events." },
        { title: "Contests", img: "assets/images/cc.jpg", desc: "Programming and software development contests." },
        { title: "Seminars", img: "assets/images/d.jpg", desc: "Tech talks from industry experts." }
      ],
      robotics: [
        { title: "Events Road Map", img: "assets/images/e.jpeg", desc: "Yearly plan of robotics competitions." },
        { title: "Robotics Design Competition", img: "assets/images/f.jpeg", desc: "Design and build robotic solutions." },
        { title: "Robosoccer Competition", img: "assets/images/g.jpeg", desc: "AI-powered robot soccer event." },
        { title: "Workshops", img: "assets/images/h.jpeg", desc: "Hands-on robotics learning sessions." }
      ],
      debating: [
        { title: "Introduction", img: "assets/images/i.jpeg", desc: "Overview of our debating community." },
        { title: "Sessions", img: "assets/images/j.jpg", desc: "Weekly debates and training." },
        { title: "Competitions", img: "assets/images/k.jpg", desc: "National and international debate contests." }
      ]
    };

    function openModal(club) {
      document.getElementById("modal-title").innerText = club.replace(/\b\w/g, c => c.toUpperCase()) + " Events";
      document.getElementById("modal-body").innerHTML = events[club].map(event => `
        <div class="event-item">
          <img src="${event.img}" alt="${event.title}">
          <h3>${event.title}</h3>
          <p>${event.desc}</p>
        </div>
      `).join("");
      document.getElementById("eventModal").style.display = "flex";
    }
    function closeModal() { document.getElementById("eventModal").style.display = "none"; }
  </script>
</body>
</html>
