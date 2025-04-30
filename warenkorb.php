<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warenkorb</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #ff4500;
            color: white;
        }
        tfoot td {
            font-weight: bold;
        }
        .buttons {
            margin-top: 20px;
            text-align: center;
        }
        .buttons a, .buttons button {
            text-decoration: none;
            background-color: #ff4500;
            color: white;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .buttons a:hover, .buttons button:hover {
            background-color: #e03e00;
        }
    </style>
</head>
<body>

    <h1>Ihr Warenkorb</h1>

    <table id="warenkorbTabelle">
        <thead>
            <tr>
                <th>Produkt</th>
                <th>Preis</th>
                <th>Menge</th>
            </tr>
        </thead>
        <tbody>
            <!-- Warenkorb-Einträge kommen hier rein -->
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">Gesamt</td>
                <td id="gesamtpreis">0 €</td>
            </tr>
        </tfoot>
    </table>

    <div class="buttons">
        <a href="index.php">Weiter einkaufen</a>
        <button onclick="warenkorbLeeren()">Warenkorb leeren</button>
    </div>

    <script>
        function warenkorbAnzeigen() {
            const warenkorb = JSON.parse(localStorage.getItem('warenkorb')) || [];
            const tbody = document.querySelector("#warenkorbTabelle tbody");
            const gesamtpreisElement = document.getElementById("gesamtpreis");

            tbody.innerHTML = "";
            let gesamt = 0;

            warenkorb.forEach(produkt => {
                const zeile = document.createElement("tr");
                zeile.innerHTML = `
                    <td>${produkt.name}</td>
                    <td>${produkt.preis} €</td>
                    <td>${produkt.menge}</td>
                `;
                tbody.appendChild(zeile);

                gesamt += produkt.preis * produkt.menge;
            });

            gesamtpreisElement.textContent = gesamt.toFixed(2) + " €";
        }

        function warenkorbLeeren() {
            localStorage.removeItem('warenkorb');
            warenkorbAnzeigen();
        }

        warenkorbAnzeigen();
    </script>

</body>
</html>
