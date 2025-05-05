<?php
session_start();

// 1) Produkt in den Warenkorb legen
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $name  = $_POST['name'];
    $price = floatval($_POST['price']);
    $cart  = $_SESSION['cart'] ?? [];
    if (isset($cart[$name])) {
        $cart[$name]['qty']++;
    } else {
        $cart[$name] = ['price' => $price, 'qty' => 1];
    }
    $_SESSION['cart'] = $cart;
    $message = 'Produkt wurde in den Warenkorb gelegt!';
    header('Location: index.php?msg=' . urlencode($message));
    exit;
}

// 2) Nachricht aus GET
$message = $_GET['msg'] ?? '';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RetroSounds</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            transition: background-color 0.3s, color 0.3s;
        }
        header {
            background-color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        header.dark-mode { background-color: #ff7043; }
        nav {
            display: flex;
            justify-content: center;
            background-color: rgba(150,127,127,0.1);
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: background-color 0.3s;
        }
        nav.dark-mode { background-color: rgba(167,142,142,0.1); }
        nav ul { list-style: none; padding: 0; display: flex; gap: 30px; }
        nav ul li a {
            color: black; text-decoration: none; font-size: 18px; font-weight: bold; padding: 10px;
            transition: color 0.3s;
        }
        nav.dark-mode ul li a { color: white; }
        nav ul li a:hover { color: #ff4500; }
        .container { max-width: 1200px; margin: auto; padding: 20px; }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
            gap: 20px;
            padding: 20px 0;
        }
        .product {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
            padding: 15px;
            transition: background-color 0.3s, color 0.3s;
        }
        .product img { width: 100%; border-bottom: 2px solid #eee; cursor: pointer; }
        .product h3 { font-size: 18px; margin: 10px 0; color: black !important; line-height: 1.2; }
        .product .price { font-weight: bold; color: #ff4500; font-size: 16px; }
        .product button {
            background-color: rgb(3,50,105);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        .product button:hover { background-color: rgb(15,113,242); }
        .product.dark-mode { background-color: white; color: black; }
        .product.dark-mode h3 { color: black !important; }
        .Überschrift { margin-right: 1400px; margin-top: -100px; }
        #logopng { width: 100px; }
        footer {
            text-align: center;
            padding: 20px;
            background: white;
            margin-top: 40px;
            box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
            transition: background-color 0.3s, color 0.3s;
        }
        body.dark-mode footer { background-color: #333; color: white; }
        body.dark-mode { background-color: #121212; color: white; }
        h1.dark-mode { color: #ffffff; }
        .dark-mode-toggle {
            position: fixed; top: 20px; right: 20px;
            background-color: #333; color: white;
            padding: 10px 20px; border: none; border-radius: 5px;
            cursor: pointer; font-size: 16px; z-index: 1100;
            transition: background-color 0.3s;
        }
        .dark-mode-toggle:hover { background-color: #555; }
        .notification {
            position: fixed; top: 20px; right: 20px;
            background-color: #4CAF50; color: white;
            padding: 15px; border-radius: 5px; display: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            font-size: 16px; z-index: 1200; transition: opacity 0.3s;
        }
        .notification.dark-mode { background-color: #ff4500; }
    </style>
</head>
<body>
    <?php if ($message): ?>
        <div class="notification" id="notification" style="display:block;"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <header>
        <h1>RetroSounds</h1>
        <div class="Überschrift">
            <img src="bilder/logo.PNG" alt="Logo" id="logopng">
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="#schallplatten">Schallplatten</a></li>
            <li><a href="#cds">CDs</a></li>
            <li><a href="#instrumente">Instrumente</a></li>
            <li>
                <a href="warenkorb.php">
                    <img src="bilder/shopping.png" alt="Warenkorb" style="width:20px;vertical-align:middle;margin-right:5px;">
                    Warenkorb
                </a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <section id="schallplatten">
            <h2>Schallplatten</h2>
            <div class="product-grid">
                <form method="post" class="product">
                    <img src="bilder/AMY.png" alt="Amy Winehouse" onclick="document.getElementById('amy-audio').play()">
                    <h3>Amy Winehouse – Back to Black</h3>
                    <div class="price">€29,99</div>
                    <input type="hidden" name="name" value="Amy Winehouse – Back to Black">
                    <input type="hidden" name="price" value="29.99">
                    <button type="submit" name="add">In den Warenkorb</button>
                </form>
                <form method="post" class="product">
                    <img src="bilder/blondocean.png" alt="Frank Ocean">
                    <h3>blonde – Frank Ocean</h3>
                    <div class="price">€19,99</div>
                    <input type="hidden" name="name" value="blonde – Frank Ocean">
                    <input type="hidden" name="price" value="19.99">
                    <button type="submit" name="add">In den Warenkorb</button>
                </form>
                <form method="post" class="product">
                    <img src="bilder/KayneWest.png" alt="Kanye West">
                    <h3>My Beautiful Dark Twisted Fantasy – Kanye West</h3>
                    <div class="price">€19,99</div>
                    <input type="hidden" name="name" value="My Beautiful Dark Twisted Fantasy – Kanye West">
                    <input type="hidden" name="price" value="19.99">
                    <button type="submit" name="add">In den Warenkorb</button>
                </form>
                <form method="post" class="product">
                    <img src="bilder/PinkFloydAlbum.png" alt="Pink Floyd">
                    <h3>The Dark Side of the Moon – Pink Floyd</h3>
                    <div class="price">€19,99</div>
                    <input type="hidden" name="name" value="The Dark Side of the Moon – Pink Floyd">
                    <input type="hidden" name="price" value="19.99">
                    <button type="submit" name="add">In den Warenkorb</button>
                </form>
            </div>
        </section>

        <section id="cds">
            <h2>CDs</h2>
            <div class="product-grid">
                <form method="post" class="product">
                    <img src="bilder/igor.jpg" alt="IGOR" onclick="document.getElementById('igor').play()">
                    <h3>IGOR – Tyler, the Creator</h3>
                    <div class="price">€14,99</div>
                    <input type="hidden" name="name" value="IGOR – Tyler, the Creator">
                    <input type="hidden" name="price" value="14.99">
                    <button type="submit" name="add">In den Warenkorb</button>
                </form>
                <form method="post" class="product">
                    <img src="bilder/atlonglastasap.jpg" alt="AT.LONG.LAST.A$AP">
                    <h3>AT.LONG.LAST.A$AP – A$AP Rocky</h3>
                    <div class="price">€14,99</div>
                    <input type="hidden" name="name" value="AT.LONG.LAST.A$AP – A$AP Rocky">
                    <input type="hidden" name="price" value="14.99">
                    <button type="submit" name="add">In den Warenkorb</button>
                </form>
                <form method="post" class="product">
                    <img src="bilder/graduation.jpg" alt="Graduation">
                    <h3>Graduation – Kanye West</h3>
                    <div class="price">€14,99</div>
                    <input type="hidden" name="name" value="Graduation – Kanye West">
                    <input type="hidden" name="price" value="14.99">
                    <button type="submit" name="add">In den Warenkorb</button>
                </form>
                <form method="post" class="product">
                    <img src="bilder/mbh.jpg" alt="Mann beißt Hund OG">
                    <h3>Mann beißt Hund OG – Keemo</h3>
                    <div class="price">€14,99</div>
                    <input type="hidden" name="name" value="Mann beißt Hund OG – Keemo">
                    <input type="hidden" name="price" value="14.99">
                    <button type="submit" name="add">In den Warenkorb</button>
                </form>
            </div>
        </section>

        <section id="instrumente">
            <h2>Instrumente</h2>
            <div class="product-grid">
                <form method="post" class="product">
                    <img src="bilder/flötetransparent.png" alt="Flöte">
                    <h3>Flöte</h3>
                    <div class="price">€199,99</div>
                    <input type="hidden" name="name" value="Flöte">
                    <input type="hidden" name="price" value="199.99">
                    <button type="submit" name="add">In den Warenkorb</button>
                </form>
                <form method="post" class="product">
                    <img src="bilder/—Pngtree—violin exquisite violin playing entertainment_6926571.png" alt="Geige">
                    <h3>Geige</h3>
                    <div class="price">€199,99</div>
                    <input type="hidden" name="name" value="Geige">
                    <input type="hidden" name="price" value="199.99">
                    <button type="submit" name="add">In den Warenkorb</button>
                </form>
                <form method="post" class="product">
                    <img src="bilder/gitarretransparent.jpeg" alt="Gitarre">
                    <h3>Gitarre</h3>
                    <div class="price">€199,99</div>
                    <input type="hidden" name="name" value="Gitarre">
                    <input type="hidden" name="price" value="199.99">
                    <button type="submit" name="add">In den Warenkorb</button>
                </form>
                <form method="post" class="product">
                    <img src="bilder/—Pngtree—beth_7204229.png" alt="Bass">
                    <h3>Bass</h3>
                    <div class="price">€199,99</div>
                    <input type="hidden" name="name" value="Bass">
                    <input type="hidden" name="price" value="199.99">
                    <button type="submit" name="add">In den Warenkorb</button>
                </form>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; 2025 Emil & Domi. Alle Rechte vorbehalten.</p>
    </footer>

    <button class="dark-mode-toggle" onclick="toggleDarkMode()">Dark Mode</button>

    <!-- Audio-Elemente -->
    <audio id="igor">
        <source src="audio/Tylor.mp3" type="audio/mpeg">
        Dein Browser unterstützt Audio leider nicht.
    </audio>
    <audio id="amy-audio">
        <source src="audio/amywinehouse.mp3" type="audio/mpeg">
        Dein Browser unterstützt Audio leider nicht.
    </audio>

    <script>
        // Dark Mode Toggle
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
            document.querySelector('header').classList.toggle('dark-mode');
            document.querySelector('nav').classList.toggle('dark-mode');
            document.querySelectorAll('.product').forEach(p => p.classList.toggle('dark-mode'));
            document.querySelector('footer').classList.toggle('dark-mode');
            document.querySelector('h1').classList.toggle('dark-mode');
            document.querySelectorAll('.notification').forEach(n => n.classList.toggle('dark-mode'));
            localStorage.setItem('dark-mode', document.body.classList.contains('dark-mode') ? 'enabled' : 'disabled');
        }
        if (localStorage.getItem('dark-mode') === 'enabled') toggleDarkMode();
    </script>
</body>
</html>