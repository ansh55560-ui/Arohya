

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Arohya</title>

</head>
<body>
  <div class="container">
    <h2>Contact Us</h2>
    <form method="POST" action="contact_submit.php">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required>
      </div>
      <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone">
      </div>
      <div class="form-group">
        <label>Message</label>
        <textarea name="message" rows="5" required></textarea>
      </div>
      <button type="submit">Send Message</button>
    </form>
  </div>
</body>
</html>


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

  /* ========================
   CONTACT PAGE STYLING
   ======================== */

/* Container */
.container {
  max-width: 600px;
  margin: 60px auto;
  background: var(--surface);
  padding: 32px;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  border: 1px solid var(--border);
}

/* Heading */
h2 {
  text-align: center;
  color: var(--primary);
  font-size: 28px;
  margin-bottom: 24px;
  font-weight: 700;
}

/* Form groups */
.form-group {
  margin-bottom: 18px;
}

label {
  display: block;
  font-weight: 600;
  color: var(--text-dim);
  margin-bottom: 6px;
}

/* Inputs & textarea */
input, textarea {
  width: 100%;
  padding: 12px;
  border-radius: var(--radius-sm);
  border: 1px solid var(--border);
  background: var(--muted);
  color: var(--text);
  font-size: 15px;
  outline: none;
  transition: border-color .2s, box-shadow .2s;
}

input:focus, textarea:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 2px rgba(225,29,72,.3);
}

/* Button */
button {
  width: 100%;
  background: linear-gradient(180deg, var(--primary), var(--primary-600));
  color: #fff;
  border: none;
  border-radius: var(--radius-sm);
  padding: 14px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: transform .2s, box-shadow .2s;
}

button:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-sm);
}

/* Responsive */
@media (max-width: 768px) {
  .container {
    margin: 20px;
    padding: 20px;
  }
  h2 {
    font-size: 24px;
  }
}

</style>