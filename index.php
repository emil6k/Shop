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
            background-color:rgb(3, 50, 105);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .product button:hover {
            background-color:rgb(15, 113, 242);
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

    <audio id="amy-audio">
    <source src="audio/amywinehouse.mp3" type="audio/mpeg">
    Dein Browser unterstützt Audio leider nicht.
    </audio>

    <div class="container">
        <section id="schallplatten">
            <h2>Schallplatten</h2>
            <div class="product-grid">
                <div class="product">
                    <img src="bilder/AMY.png" alt="Schallplatte 1" class="prodimg" id="amy-audio">
                    <h3>Amy Winehouse – Back to Black</h3>
                    <p></p>
                    <div class="price">€29,99</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
                <div class="product">
                    <img src="bilder/blondocean.png" alt="Schallplatte 2" class="prodimg">
                    <h3>blonde - Frank Ocean</h3>
                    <div class="price">€19,99</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
                <div class="product">
                    <img src="bilder/KayneWest.png" alt="Schallplatte 3" class="prodimg">
                    <h3>My Beautiful Dark Twisted Fantasy - Kanya West</h3>
                    <div class="price">€19,99</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
                <div class="product">
                    <img src="bilder/PinkFloydAlbum.png" alt="Schallplatte 4" class="prodimg">
                    <h3>The Dark Side of the Moon - Pink Floyd</h3>
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
     <section id="instrumente2">
            <div class="product-grid">
                <div class="product">
                    <img src="bilder/akkordeon.png" alt="Akkordeon">
                    <h3>Akkordeon</h3>
                    <p>Hochwertige Flöte für Einsteiger und Profis.</p>
                    <div class="price">749,49 €</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
                <div class="product">
                    <img src="bilder\schlagzeug.png" alt="Schlagzeug">
                    <h3>Schlagzeug</h3>
                    <p>Hochwertige Geige für Einsteiger und Profis.</p>
                    <div class="price">1.099,00 €</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
                <div class="product">
                    <img src="bilder\saxophon.png" alt="Saxophon">
                    <h3>Saxophon</h3>
                    <p>Hochwertige Gitarre für Einsteiger und Profis.</p>
                    <div class="price">10.890,00 €</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
                <div class="product">
                    <img src="bilder/Piano.png" alt="Piano">
                    <h3>Piano</h3>
                    <p>Hochwertiger Bass für Einsteiger und Profis.</p>
                    <div class="price">9.390,00 €</div>
                    <button onclick="zumWarenkorb()">In den Warenkorb</button>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; 2025 Musikshop. Alle Rechte vorbehalten.</p>
    </footer>
    <script>
        function zumWarenkorb() {
            window.location.href = "warenkorb.php";
        }

        const amyImage = document.querySelector('img[src="bilder/AMY.png"]');
const amyAudio = document.getElementById('amy-audio');

if (amyImage && amyAudio) {
    amyImage.addEventListener('click', () => {
        if (!amyAudio.paused) {
            amyAudio.pause();
            amyAudio.currentTime = 0;
            return;
        }

        amyAudio.currentTime = 0;
        amyAudio.play();

        setTimeout(() => {
            amyAudio.pause();
            amyAudio.currentTime = 0;
        }, 10000); // 10 Sekunden
    });
}



        
    </script>
</body>
</html>
