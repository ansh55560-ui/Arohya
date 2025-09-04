<?php
require 'db.php';
include('header.php')

?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h2 style="text-align:center;">Shop Arohya</h2>

    <section class="container" style="margin-top:28px">
        <div class="grid grid-4">
            <?php
            // Fetch all products from DB
            $result = $conn->query("SELECT * FROM products ORDER BY created_at DESC");
            while ($row = $result->fetch_assoc()):
            ?>
            <article class="card product">
                <div class="thumb">
                    <div class="ghost float"></div>
                </div>
                <div style="padding:12px">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px">
                        <span class="title"><?= htmlspecialchars($row['name']) ?></span>
                    </div>
                    <p class="meta"><?= htmlspecialchars($row['description']) ?></p>
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-top:10px">
                        <div class="price">₹<?= number_format($row['price'], 2) ?></div>
                        <div class="actions">
                            <a class="btn" href="product-details.php?id=<?= $row['id'] ?>">View</a>
                            <a class="btn btn--primary" href="cart.php?action=add&id=<?= $row['id'] ?>">Add</a>
                        </div>
                    </div>
                </div>
            </article>
            <?php endwhile; ?>
        </div>
    </section>
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

    /* PRODUCT CARD */
.product{display:flex;flex-direction:column;gap:10px}
    .product .thumb{aspect-ratio:1/1;border-bottom:1px solid var(--border);background:linear-gradient(160deg, rgba(255,255,255,.05), rgba(255,255,255,.0));display:grid;place-items:center}
    .product .thumb .ghost{width:70%;height:70%;border-radius:20px;background:linear-gradient(145deg, rgba(255,255,255,.08), rgba(255,255,255,.02));border:1px dashed #2a2f3c}
    .product .title{font-weight:700}
    .product .meta{color:var(--text-dim);font-size:14px}
    .product .actions{display:flex;gap:10px}


</style>

<?php
include('footer.php')
?>