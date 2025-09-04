<?php
require 'db.php';
include('header.php');

// Fetch about content
$sql = "SELECT * FROM about_us ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
$about = $result->fetch_assoc();
$team = json_decode($about['team'], true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us - Arohya</title>
  <style>
    /* RESET */
    *,*::before,*::after{box-sizing:border-box}
    *{margin:0}
    html,body{height:100%}
    body{line-height:1.5;-webkit-font-smoothing:antialiased;}
    img,video,canvas,svg{display:block;max-width:100%}
    input,button,textarea,select{font:inherit}
    p,h1,h2,h3,h4,h5,h6{overflow-wrap:break-word}

    /* THEME TOKENS */
    :root{
      --font-sans: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial;

      --bg:#0b0c10;--surface:#111318;--muted:#191c22;
      --text:#e6e7eb;--text-dim:#b7bcc6;--border:#242834;

      --primary:#e11d48;--primary-600:#be123c;
      --accent:#0ea5e9;

      --radius-sm:10px;--radius:16px;--radius-xl:24px;
      --shadow-sm:0 4px 12px rgba(0,0,0,.25);--shadow:0 10px 30px rgba(0,0,0,.35);

      --container:1200px;--gap:16px;--gap-lg:24px;
    }

    body{
      background:radial-gradient(1200px 800px at 80% -10%, rgba(225,29,72,.12), transparent 55%),
                 radial-gradient(800px 600px at -10% 10%, rgba(14,165,233,.10), transparent 45%),
                 var(--bg);
      color:var(--text);font-family:var(--font-sans);
    }
    .container{max-width:1000px;margin:auto;padding:40px;border-radius:16px}
    h1{color:#e11d48;margin-bottom:16px}
    h2{color:#0ea5e9;margin-top:24px}
    p{color:#b7bcc6;margin-bottom:16px}
    .team{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px;margin-top:30px}
    .member{;padding:20px;border-radius:12px;text-align:center}
    .member img{width:100px;height:100px;border-radius:50%;object-fit:cover;margin-bottom:12px;border:2px solid #e11d48}
    .member h3{margin-bottom:8px;color:#e6e7eb}
    .member p{font-size:0.9rem;color:#b7bcc6}
  </style>
</head>
<body>
  <div class="container">
    <h1><?= $about['title']; ?></h1>
    <h2>Our Mission</h2>
    <p><?= $about['mission']; ?></p>

    <h2>Our Vision</h2>
    <p><?= $about['vision']; ?></p>

    <h2>Meet Our Team</h2>
    <div class="team">
      <?php foreach ($team as $member): ?>
        <div class="member">
          <img src="uploads/<?= htmlspecialchars($member['img']); ?>" alt="<?= htmlspecialchars($member['name']); ?>">
          <h3><?= htmlspecialchars($member['name']); ?></h3>
          <p><?= htmlspecialchars($member['role']); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>

<?php

include('footer')

?>


