<?php
session_start();
require 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email exists
    $check = $conn->prepare("SELECT id FROM users WHERE email=?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $message = "Email already registered!";
    } else {
        // ✅ Correct: 4 fields, 4 placeholders
        $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $pass);
        if ($stmt->execute()) {
            $message = "Registration successful! You can now login.";
        } else {
            $message = "Error: Could not register.";
        }
    }
}
?>

?>
<!DOCTYPE html>
<html>
<head>
    <title>Register - Arohya</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Create Account</h2>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="phone" name="phone" placeholder="phone number " required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
</div>

<?php if ($message): ?>
<div id="popup">
    <div class="popup-content">
        <p><?php echo $message; ?></p>
        <button onclick="document.getElementById('popup').style.display='none'">OK</button>
    </div>
</div>
<?php endif; ?>
</body>
</html>
<style>
    /* RESET */
*,*::before,*::after{box-sizing:border-box}
*{margin:0;padding:0}
html,body{height:100%}
body{line-height:1.5;-webkit-font-smoothing:antialiased;font-family:var(--font-sans);}
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

/* BODY BACKGROUND */
body{
  background:radial-gradient(1200px 800px at 80% -10%, rgba(225,29,72,.12), transparent 55%),
             radial-gradient(800px 600px at -10% 10%, rgba(14,165,233,.10), transparent 45%),
             var(--bg);
  color:var(--text);
  display:flex;
  align-items:center;
  justify-content:center;
  padding:20px;
}

/* FORM CONTAINER */
.form-container{
  background:linear-gradient(180deg,rgba(255,255,255,.02),rgba(255,255,255,0));
  border:1px solid var(--border);
  border-radius:var(--radius-xl);
  box-shadow:var(--shadow);
  width:100%;
  max-width:400px;
  padding:32px;
  text-align:center;
}

/* TITLE */
.form-container h2{
  font-size:24px;
  font-weight:800;
  margin-bottom:20px;
}

/* INPUTS */
.form-container input{
  width:100%;
  padding:12px;
  margin:10px 0;
  border:1px solid var(--border);
  border-radius:var(--radius-sm);
  background:var(--muted);
  color:var(--text);
}
.form-container input::placeholder{
  color:var(--text-dim);
}

/* BUTTON */
.form-container button{
  width:100%;
  padding:12px;
  margin-top:14px;
  border:none;
  border-radius:var(--radius-sm);
  background:var(--primary);
  color:#fff;
  font-weight:600;
  cursor:pointer;
  transition:0.2s;
}
.form-container button:hover{
  background:var(--primary-600);
  transform:translateY(-1px);
}

/* PARAGRAPH LINKS */
.form-container p{
  margin-top:16px;
  color:var(--text-dim);
  font-size:14px;
}
.form-container a{
  color:var(--accent);
  text-decoration:none;
}
.form-container a:hover{
  text-decoration:underline;
}

/* POPUP */
#popup{
  position:fixed;top:0;left:0;width:100%;height:100%;
  background:rgba(0,0,0,0.5);
  display:flex;align-items:center;justify-content:center;
}
.popup-content{
  background:var(--surface);
  padding:20px;
  border-radius:var(--radius);
  text-align:center;
  box-shadow:var(--shadow);
  max-width:320px;
}
.popup-content p{
  margin-bottom:12px;
}
.popup-content button{
  background:var(--accent);
  color:#fff;
  border:none;
  border-radius:var(--radius-sm);
  padding:10px 16px;
  cursor:pointer;
  transition:.2s;
}
.popup-content button:hover{
  background:#0284c7;
}

</style>

