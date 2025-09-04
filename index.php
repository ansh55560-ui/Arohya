<?php
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Arohya UI — CSS & Components</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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

    /* UTILITIES */
    .container{max-width:var(--container);margin-inline:auto;padding:16px}
    .grid{display:grid;gap:var(--gap)}
    .grid-2{grid-template-columns:repeat(2,1fr)}
    .grid-3{grid-template-columns:repeat(3,1fr)}
    .grid-4{grid-template-columns:repeat(4,1fr)}
    @media(max-width:1024px){.grid-4{grid-template-columns:repeat(3,1fr)}}
    @media(max-width:768px){
      .grid-2,.grid-3,.grid-4{grid-template-columns:1fr}
      .container{padding:12px}
    }

    .card{background:linear-gradient(180deg,rgba(255,255,255,.02),rgba(255,255,255,0));border:1px solid var(--border);border-radius:var(--radius);box-shadow:var(--shadow-sm);overflow:hidden}
    .btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;height:42px;padding:0 16px;border-radius:var(--radius-sm);border:1px solid var(--border);background:linear-gradient(180deg,rgba(255,255,255,.05),rgba(255,255,255,0));color:var(--text);text-decoration:none;font-weight:600;transition:.2s}
    .btn:hover{transform:translateY(-1px);box-shadow:var(--shadow-sm)}
    .btn--primary{background:linear-gradient(180deg,var(--primary),var(--primary-600));color:#fff}

    /* NAVBAR */
    .navbar{position:sticky;top:10px;z-index:50}
    .navbar .inner{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:10px 14px;border:1px solid var(--border);border-radius:var(--radius-xl);backdrop-filter:saturate(140%) blur(10px);background:rgba(17,19,24,.75);box-shadow:var(--shadow)}
    .brand{font-weight:800;display:flex;align-items:center;gap:8px}
    .brand .dot{width:10px;height:10px;border-radius:50%;background:var(--primary)}
    .nav{display:flex;gap:8px}
    .nav a{padding:8px 12px;color:var(--text-dim);border-radius:10px;text-decoration:none}
    .nav a:hover,.nav .active{color:var(--text);background:rgba(255,255,255,.05)}
    .menu-toggle{display:none;font-size:22px;background:none;border:none;color:var(--text)}
    @media(max-width:900px){.nav{display:none}.menu-toggle{display:block}}

    /* MOBILE NAV */
    .mobile-nav{display:flex;flex-direction:column;gap:6px;padding:10px;background:rgba(17,19,24,.95);border-radius:0 0 var(--radius-xl) var(--radius-xl);max-height:0;opacity:0;overflow:hidden;transition:max-height .3s ease,opacity .3s ease}
    .mobile-nav.show{max-height:260px;opacity:1}
    .mobile-nav a{padding:10px;color:var(--text-dim);text-decoration:none;border-radius:8px}
    .mobile-nav a:hover{color:var(--text);background:rgba(255,255,255,.05)}

    /* HERO */
    .hero .wrap{display:grid;grid-template-columns:1.2fr .8fr;gap:var(--gap-lg)}
    @media(max-width:900px){.hero .wrap{grid-template-columns:1fr}}
    .headline{font-size:clamp(28px,5vw,52px);line-height:1.1;font-weight:900}

    /* STRIP / CTA */
    .strip{display:flex;align-items:center;justify-content:space-between;padding:18px 20px;border:1px dashed #2a2f3c;border-radius:var(--radius);background:rgba(14,165,233,.05)}
    .strip p{color:var(--text-dim)}

/* PRODUCT CARD */
.product{display:flex;flex-direction:column;gap:10px}
    .product .thumb{aspect-ratio:1/1;border-bottom:1px solid var(--border);background:linear-gradient(160deg, rgba(255,255,255,.05), rgba(255,255,255,.0));display:grid;place-items:center}
    .product .thumb .ghost{width:70%;height:70%;border-radius:20px;background:linear-gradient(145deg, rgba(255,255,255,.08), rgba(255,255,255,.02));border:1px dashed #2a2f3c}
    .product .title{font-weight:700}
    .product .meta{color:var(--text-dim);font-size:14px}
    .product .actions{display:flex;gap:10px}


    /* FOOTER */
    footer{margin-top:56px}
    .footer{display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:24px;padding:28px;border:1px solid var(--border);border-radius:var(--radius-xl);background:linear-gradient(180deg, rgba(255,255,255,.02), rgba(255,255,255,.00))}
    .footer h4{margin-bottom:10px}
    .footer a{color:var(--text-dim);text-decoration:none}
    .footer a:hover{color:var(--text)}
    @media(max-width:900px){.footer{grid-template-columns:1fr 1fr}}

  </style>
</head>
<body>
  <!-- NAVBAR -->

<h2>Welcome, <?php echo $_SESSION['user_name']; ?> 🎉</h2>
  <div class="container navbar">
    <div class="inner">
      <div class="brand"><span class="dot"></span> Arohya</div>
      <nav class="nav">
        <a href="#" class="active">Home</a>
        <a href="products.php">Shop</a>
        <a href="#">Collections</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
      </nav>
      <button class="menu-toggle" onclick="document.querySelector('.mobile-nav').classList.toggle('show')">☰</button>
      <div class="nav-cta" style="display:flex;gap:8px;align-items:center">
    <?php if (isset($_SESSION['user_id'])): ?>
        <!-- User logged in -->
        <a class="btn btn--ghost" href="logout.php">Logout</a>
        <a class="btn btn--primary" href="cart.php">Cart</a>
    <?php else: ?>
        <!-- User not logged in -->
        <a class="btn btn--ghost" href="login.php">Login</a>
        <a class="btn btn--primary" href="cart.php">Cart</a>
    <?php endif; ?>
</div>

    </div>
    <div class="mobile-nav">
      <a href="#">Home</a>
      <a href="products.php">Shop</a>
      <a href="#">Collections</a>
      <a href="about.php">About</a>
      <a href="contact.php">Contact</a>
    </div>
  </div>

  <!-- HERO -->
  <section class="container hero">
    <div class="wrap">
      <div class="card" style="padding:30px">
        <span style="font-size:13px;color:var(--text-dim)">FW25 COLLECTION</span>
        <h1 class="headline">Elevate your everyday — crafted basics with a bold edge.</h1>
        <p style="color:var(--text-dim)">Breathable fabrics, premium cuts, and colors that speak. Discover tees, denim, and street layers designed for India’s climate and style.</p>
        <div style="display:flex;flex-wrap:wrap;gap:10px;margin-top:10px">
          <a class="btn btn--primary" href="#">Shop New Arrivals</a>
          <a class="btn" href="#">Explore Bestsellers</a>
        </div>
      </div>
      <div class="grid">
        <div class="card" style="padding:20px;min-height:120px">Men</div>
        
      </div>
    </div>
  </section>

  <!-- STRIP -->
  <section class="container" style="margin-top:22px">
    <div class="strip">
      <p>Sign up & get <strong>₹200</strong> off your first order.</p>
      <a class="btn btn--primary" href="#newsletter">Get Offer</a>
    </div>
  </section>

  <!-- PRODUCTS GRID -->
  <section class="container" style="margin-top:28px">
    <div style="display:flex;align-items:end;justify-content:space-between;margin-bottom:12px">
      <div>
        <h2 style="font-size:28px">Featured Products</h2>
        <p style="color:var(--text-dim)">Handpicked bestsellers loved by our community.</p>
      </div>
      <div class="pill"><span class="dot"></span> In Stock</div>
    </div>

    <div class="grid grid-4">
      <!-- Product Card Template (Repeat with PHP loop) -->
      <article class="card product">
        <div class="thumb"><div class="ghost float"></div></div>
        <div style="padding:12px">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px">
            <span class="title">Oversized Tee — Jet Black</span>
            <span class="stars" aria-label="4.5 stars"><span></span><span></span><span></span><span></span><span style="opacity:.5"></span></span>
          </div>
          <p class="meta">100% cotton • 240 GSM</p>
          <div style="display:flex;align-items:center;justify-content:space-between;margin-top:10px">
            <div class="price">₹699 <del>₹899</del></div>
            <div class="actions">
              <a class="btn" href="#">View</a>
              <a class="btn btn--primary" href="#">Add</a>
            </div>
          </div>
        </div>
      </article>

      <article class="card product">
        <div class="thumb"><div class="ghost"></div></div>
        <div style="padding:12px">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px">
            <span class="title">Straight Fit Denim — Indigo</span>
            <span class="stars" aria-label="5 stars"><span></span><span></span><span></span><span></span><span></span></span>
          </div>
          <p class="meta">Comfort stretch</p>
          <div style="display:flex;align-items:center;justify-content:space-between;margin-top:10px">
            <div class="price">₹1,499</div>
            <div class="actions">
              <a class="btn" href="#">View</a>
              <a class="btn btn--primary" href="#">Add</a>
            </div>
          </div>
        </div>
      </article>

      <article class="card product">
        <div class="thumb"><div class="ghost"></div></div>
        <div style="padding:12px">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px">
            <span class="title">Linen Shirt — Sand</span>
            <span class="stars" aria-label="4 stars"><span></span><span></span><span></span><span></span><span style="opacity:.2"></span></span>
          </div>
          <p class="meta">Lightweight & breathable</p>
          <div style="display:flex;align-items:center;justify-content:space-between;margin-top:10px">
            <div class="price">₹1,099</div>
            <div class="actions">
              <a class="btn" href="#">View</a>
              <a class="btn btn--primary" href="#">Add</a>
            </div>
          </div>
        </div>
      </article>

      <article class="card product">
        <div class="thumb"><div class="ghost"></div></div>
        <div style="padding:12px">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px">
            <span class="title">Cargo Joggers — Olive</span>
            <span class="stars" aria-label="4.5 stars"><span></span><span></span><span></span><span></span><span style="opacity:.5"></span></span>
          </div>
          <p class="meta">Utility pockets • Tapered</p>
          <div style="display:flex;align-items:center;justify-content:space-between;margin-top:10px">
            <div class="price">₹1,299 <del>₹1,499</del></div>
            <div class="actions">
              <a class="btn" href="#">View</a>
              <a class="btn btn--primary" href="#">Add</a>
            </div>
          </div>
        </div>
      </article>
    </div>
  </section>


  <!-- FOOTER -->
  <footer class="container">
    <div class="footer">
      <div>
        <div class="brand"><span class="dot"></span> Arohya</div>
        <p style="color:var(--text-dim);margin-top:10px">Premium essentials designed in India. Ethical production, fair pricing.</p>
      </div>
      <div>
        <h4>Shop</h4>
        <div class="grid" style="margin-top:10px">
          <a href="#">Men</a>
          
          <a href="#">New Arrivals</a>
          <a href="#">Bestsellers</a>
        </div>
      </div>
      <div>
        <h4>Support</h4>
        <div class="grid" style="margin-top:10px">
          <a href="#">Track Order</a>
          <a href="#">Shipping & Returns</a>
          <a href="#">FAQ</a>
          <a href="contact.php">Contact</a>
        </div>
      </div>
      <div>
        <h4>Legal</h4>
        <div class="grid" style="margin-top:10px">
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Use</a>
          <a href="#">Refund Policy</a>
        </div>
      </div>
    </div>
    <p style="text-align:center;color:var(--text-dim);margin-top:12px">© 2025 Arohya Clothing. All rights reserved.</p>
  </footer>

  <script>
    // mobile nav toggle handled inline ☰ button
  </script>
</body>
</html>
