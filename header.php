
<header>
  <!-- NAVBAR -->
  <div class="container navbar">
    <div class="inner">
      
      <!-- Brand -->
      <div class="brand">
        <span class="dot"></span> Arohya
      </div>

      <!-- Desktop Nav -->
      <nav class="nav">
        <a href="index.php" class="active">Home</a>
        <a href="shop.php">Shop</a>
        <a href="collections.php">Collections</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
      </nav>

      <!-- CTA Buttons -->
      <div class="nav-cta" style="display:flex;gap:8px;align-items:center">
        <?php if (isset($_SESSION['user_id'])): ?>
          <!-- If user logged in -->
          <a class="btn btn--ghost" href="logout.php">Logout</a>
          <a class="btn btn--primary" href="cart.php">Cart</a>
        <?php else: ?>
          <!-- If user not logged in -->
          <a class="btn btn--ghost" href="login.php">Login</a>
          <a class="btn btn--primary" href="cart.php">Cart</a>
        <?php endif; ?>
      </div>

      <!-- Mobile Menu Toggle -->
      <button class="menu-toggle" onclick="document.querySelector('.mobile-nav').classList.toggle('show')">☰</button>
    </div>

    <!-- Mobile Nav -->
    <div class="mobile-nav">
      <a href="index.php">Home</a>
      <a href="shop.php">Shop</a>
      <a href="collections.php">Collections</a>
      <a href="about.php">About</a>
      <a href="contact.php">Contact</a>
      <?php if (isset($_SESSION['user_id'])): ?>
        <a href="logout.php">Logout</a>
        <a href="cart.php">Cart</a>
      <?php else: ?>
        <a href="login.php">Login</a>
        <a href="cart.php">Cart</a>
      <?php endif; ?>
    </div>
  </div>
</header>

<style>
/* NAVBAR */
/* NAVBAR */
.navbar {
  position: fixed;   /* always fixed */
  top: 10px;
  left: 0;
  width: 100%;
  z-index: 999;       /* keeps it above everything */
}

.navbar .inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  padding: 10px 14px;
  border: 1px solid var(--border);
  border-radius: var(--radius-xl);
  backdrop-filter: saturate(140%) blur(10px);
  background: rgba(17, 19, 24, .85);
  box-shadow: var(--shadow);
}

/* Add padding to body so content is not hidden under fixed header */
body {
  padding-top: 70px; /* adjust height = navbar height */
}

.brand {
  font-weight: 800;
  display: flex;
  align-items: center;
  gap: 8px;
  color: var(--text);
}
.brand .dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: var(--primary);
}
.nav {
  display: flex;
  gap: 8px;
}
.nav a {
  padding: 8px 12px;
  color: var(--text-dim);
  border-radius: 10px;
  text-decoration: none;
  transition: 0.2s;
}
.nav a:hover,
.nav .active {
  color: var(--text);
  background: rgba(255, 255, 255, .05);
}
.nav-cta .btn {
  padding: 6px 14px;
  border-radius: 10px;
  text-decoration: none;
}
.btn--ghost {
  background: transparent;
  border: 1px solid var(--primary);
  color: var(--primary);
}
.btn--primary {
  background: var(--primary);
  color: white;
  border: none;
}
.menu-toggle {
  display: none;
  font-size: 22px;
  background: none;
  border: none;
  color: var(--text);
  cursor: pointer;
}

/* Mobile nav */
.mobile-nav {
  display: none;
  flex-direction: column;
  margin-top: 10px;
  background: rgba(17, 19, 24, .95);
  border-radius: var(--radius-xl);
  padding: 10px;
}
.mobile-nav a {
  padding: 10px;
  color: var(--text-dim);
  text-decoration: none;
  border-radius: 8px;
}
.mobile-nav a:hover {
  background: rgba(255,255,255,.05);
  color: var(--text);
}
.mobile-nav.show {
  display: flex;
}

/* Responsive */
@media(max-width:900px) {
  .nav { display: none; }
  .menu-toggle { display: block; }
}
</style>
