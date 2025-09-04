<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<footer class="footer">
  <div class="footer-container">

    <!-- Brand -->
    <div class="footer-col">
      <h3><span class="dot">●</span> Arohya</h3>
      <p>
        Premium essentials designed in India. Ethical production, fair pricing.
      </p>

      <!-- Social Media -->
      <div class="social-links">
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-x-twitter"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>

    <!-- Shop -->
    <div class="footer-col">
      <h4>Shop</h4>
      <ul>
        <li><a href="#">Men</a></li>
        <li><a href="#">New Arrivals</a></li>
        <li><a href="#">Bestsellers</a></li>
      </ul>
    </div>

    <!-- Support -->
    <div class="footer-col">
      <h4>Support</h4>
      <ul>
        <li><a href="#">Track Order</a></li>
        <li><a href="#">Shipping & Returns</a></li>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>

    <!-- Legal -->
    <div class="footer-col">
      <h4>Legal</h4>
      <ul>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Use</a></li>
        <li><a href="#">Refund Policy</a></li>
      </ul>
    </div>
  </div>

  <!-- Bottom Bar -->
  <div class="footer-bottom">
    © 2025 Arohya Clothing. All rights reserved.
  </div>
</footer>

<!-- CSS -->
<style>
  .footer {
    background: #0b0b0d;
    color: #fff;
    padding: 40px 20px;
    font-family: Arial, sans-serif;
  }

  .footer-container {
    max-width: 1200px;
    margin: auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
  }

  .footer-col h3 {
    font-size: 18px;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .footer-col h4 {
    font-weight: bold;
    margin-bottom: 12px;
  }

  .dot {
    color: #e11d48;
    font-size: 22px;
  }

  .footer-col p {
    margin-top: 12px;
    color: #a1a1aa;
    line-height: 1.6;
  }

  .footer-col ul {
    list-style: none;
    padding: 0;
    margin: 0;
    line-height: 1.8;
  }

  .footer-col ul li a {
    color: #d4d4d8;
    text-decoration: none;
    transition: color 0.2s ease-in-out;
  }

  .footer-col ul li a:hover {
    color: #fff;
  }

  /* Social Media */
  .social-links {
    margin-top: 16px;
    display: flex;
    gap: 15px;
  }

  .social-links a {
    color: #a1a1aa;
    font-size: 20px;
    transition: color 0.3s ease;
  }

  .social-links a:hover {
    color: #fff;
  }

  .footer-bottom {
    max-width: 1200px;
    margin: 30px auto 0;
    border-top: 1px solid #27272a;
    padding-top: 20px;
    text-align: center;
    color: #a1a1aa;
    font-size: 14px;
  }

  /* 📱 Responsive Design */
  @media (max-width: 900px) {
    .footer-container {
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
    }
  }

  @media (max-width: 600px) {
    .footer-container {
      grid-template-columns: 1fr;
      text-align: center;
    }
    .footer-col h3, 
    .footer-col h4,
    .social-links {
      justify-content: center;
    }
  }
</style>
