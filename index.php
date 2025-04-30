<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RetroSounds</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: rgba(150, 127, 127, 0.1);
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 30px;
        }
        nav ul li a {
            color: black;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
            transition: color 0.3s;
        }
        nav ul li a:hover {
            color: #ff4500;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px 0;
        }
        .product {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 15px;
        }
        .product img {
            width: 100%;
            border-bottom: 2px solid #eee;
        }
        .product h3 {
            font-size: 18px;
            margin: 10px 0;
        }
        .product p {
            color: #666;
            font-size: 14px;
        }
        .product .price {
            font-weight: bold;
            color: #ff4500;
            font-size: 16px;
        }
        .product button {
            background-color: #ff4500;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .product button:hover {
            background-color: #e03e00;
        }
        .Überschrift {
            margin-right: 1400px;
            margin-top: -100px;
        }
        #logopng {
            width: 100px;
        }
        .product:hover {
            transform: scale(1.05);
            transition: transform 0.4s ease;
        }
        footer {
            text-align: center;
            padding: 20px;
            background: white;
            margin-top: 40px;
            box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
        }
    </style>

    <!-- JavaScript für die Weiterleitung -->
    <script>
        function zumWarenkorb() {
            window.location.href = "warenkorb.php";
        }
    </script>s
</head>
<body>
    <header>
        <h1>RetroSounds</h1>
        <div class="Überschrift">
            
            <img src="bilder/logo.PNG" alt="Schallplatte 1" id="logopng">
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="#schallplatten">Schallplatten</a></li>
            <li><a href="#cds">CDs</a></li>
            <li><a href="#instrumente">Instrumente</a></li>
            <li><a href="#kontakt">Kontakt</a></li>
            <li><a href="warenkorb.php">
            <img src="bilder/shopping.png" alt="Warenkorb" style="width: 20px; vertical-align: middle; margin-right: 5px;"> Warenkorb
        </a></li>

        </ul>
    </nav>

    <div class="container">
        <section id="schallplatten">
            <h2>Schallplatten</h2>
            <div class="product-grid">
                <div class="product">
                    <img src="bilder/schallplattentransparent.jpg" alt="Schallplatte 1" class="prodimg">
                    <h3>Albumtitel - Künstler</h3>
                    <p>Beschreibung der Schallplatte.</p>
                    <div class="price">€19,99</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
                <div class="product">
                    <img src="bilder/schallplattentransparentrot.jpg" alt="Schallplatte 2" class="prodimg">
                    <h3>Albumtitel - Künstler</h3>
                    <p>Beschreibung der Schallplatte.</p>
                    <div class="price">€19,99</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
                <div class="product">
                    <img src="bilder/schallplattentransparentblau.jpg" alt="Schallplatte 3" class="prodimg">
                    <h3>Albumtitel - Künstler</h3>
                    <p>Beschreibung der Schallplatte.</p>
                    <div class="price">€19,99</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
                <div class="product">
                    <img src="bilder/schallplattentransparentgrün.jpg" alt="Schallplatte 4" class="prodimg">
                    <h3>Albumtitel - Künstler</h3>
                    <p>Beschreibung der Schallplatte.</p>
                    <div class="price">€19,99</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
            </div>
        </section>

        <section id="cds">
            <h2>CDs</h2>
            <div class="product-grid">
                <div class="product">
                    <img src="bilder/cdtransparent.png" alt="CD 1">
                    <h3>Albumtitel - Künstler</h3>
                    <p>Beschreibung der CD.</p>
                    <div class="price">€14,99</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
                <div class="product">
                    <img src="bilder/cdtransparent.png" alt="CD 2">
                    <h3>Albumtitel - Künstler</h3>
                    <p>Beschreibung der CD.</p>
                    <div class="price">€14,99</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
                <div class="product">
                    <img src="bilder/cdtransparent.png" alt="CD 3">
                    <h3>Albumtitel - Künstler</h3>
                    <p>Beschreibung der CD.</p>
                    <div class="price">€14,99</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
                <div class="product">
                    <img src="bilder/cdtransparent.png" alt="CD 4">
                    <h3>Albumtitel - Künstler</h3>
                    <p>Beschreibung der CD.</p>
                    <div class="price">€14,99</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
            </div>
        </section>

        <section id="instrumente">
            <h2>Instrumente</h2>
            <div class="product-grid">
                <div class="product">
                    <img src="bilder/flötetransparent.png" alt="Flöte">
                    <h3>Flöte</h3>
                    <p>Hochwertige Flöte für Einsteiger und Profis.</p>
                    <div class="price">€199,99</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
                <div class="product">
                    <img src="bilder/—Pngtree—violin exquisite violin playing entertainment_6926571.png" alt="Geige">
                    <h3>Geige</h3>
                    <p>Hochwertige Geige für Einsteiger und Profis.</p>
                    <div class="price">€199,99</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
                <div class="product">
                    <img src="bilder/gitarretransparent.jpeg" alt="Gitarre">
                    <h3>Gitarre</h3>
                    <p>Hochwertige Gitarre für Einsteiger und Profis.</p>
                    <div class="price">€199,99</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
                <div class="product">
                    <img src="bilder/—Pngtree—beth_7204229.png" alt="Bass">
                    <h3>Bass</h3>
                    <p>Hochwertiger Bass für Einsteiger und Profis.</p>
                    <div class="price">€199,99</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; 2025 Musikshop. Alle Rechte vorbehalten.</p>
    </footer>
</body>
</html>
