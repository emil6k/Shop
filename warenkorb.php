<!-- warenkorb.html -->
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
            transition: background-color 0.3s, color 0.3s;
        }
        h1 {
            color: #333;
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            background: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
        }
        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: rgb(0,166,19);
            color: white;
            text-transform: uppercase;
        }
        tfoot td {
            font-weight: bold;
            font-size: 1.2rem;
        }
        .buttons {
            margin-top: 20px;
            text-align: center;
        }
        .buttons a, .buttons button {
            text-decoration: none;
            background-color: rgb(85,0,255);
            color: white;
            padding: 12px 25px;
            margin: 5px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .buttons a:hover, .buttons button:hover {
            background-color: #e03e00;
        }
        .coupon {
            margin-top: 20px;
            text-align: center;
        }
        .coupon input {
            padding: 10px;
            font-size: 1rem;
            width: 200px;
            margin-right: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .coupon button {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .coupon button:hover {
            background-color: #555;
        }

        /* Dark Mode */
        body.dark-mode {
            background-color: #121212;
            color: white;
        }
        table.dark-mode {
            background-color: #222;
            color: white;
        }
        th.dark-mode {
            background-color: #333;
        }
        .buttons.dark-mode a, .buttons.dark-mode button {
            background-color: #333;
        }
        h1.dark-mode {
            color: #ff4500;
        }
        .notification.dark-mode {
            background-color: #444;
        }
        .dark-mode-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1100;
            transition: background-color 0.3s;
        }
        .dark-mode-toggle:hover {
            background-color: #555;
        }
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            display: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            font-size: 16px;
            z-index: 1000;
            transition: opacity 0.3s;
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
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody>
            <!-- Gefüllt durch JS -->
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">Gesamt</td>
                <td id="gesamtpreis">0 €</td>
                <td></td>
            </tr>
        </tfoot>
    </table>

    <div class="coupon">
        <input type="text" id="coupon" placeholder="Rabattcode eingeben">
        <button onclick="applyCoupon()">Rabatt anwenden</button>
    </div>

    <div class="buttons">
        <a href="index.html">Weiter einkaufen</a>
        <button onclick="warenkorbLeeren()">Warenkorb leeren</button>
    </div>

    <div class="notification" id="notification">Aktion erfolgreich!</div>
    <button class="dark-mode-toggle" onclick="toggleDarkMode()">Dark Mode</button>

    <script>
        // Dark Mode
        function toggleDarkMode(){
            document.body.classList.toggle('dark-mode');
            document.querySelector('table').classList.toggle('dark-mode');
            document.querySelectorAll('th').forEach(th=>th.classList.toggle('dark-mode'));
            document.querySelectorAll('.buttons a, .buttons button').forEach(b=>b.classList.toggle('dark-mode'));
            document.querySelector('h1').classList.toggle('dark-mode');
            document.getElementById('notification').classList.toggle('dark-mode');
            localStorage.setItem('dark-mode', document.body.classList.contains('dark-mode')?'enabled':'disabled');
        }
        if(localStorage.getItem('dark-mode')==='enabled') toggleDarkMode();

        // Warenkorb-Funktionen
        function warenkorbAnzeigen(){
            const cart = JSON.parse(localStorage.getItem('warenkorb'))||[];
            const tbody = document.querySelector('#warenkorbTabelle tbody');
            const totalEl = document.getElementById('gesamtpreis');
            tbody.innerHTML='';
            let sum=0;
            cart.forEach((p,i)=>{
                sum+=p.price*p.menge;
                const tr=document.createElement('tr');
                tr.innerHTML=`
                    <td>${p.name}</td>
                    <td>${p.price.toFixed(2)} €</td>
                    <td>${p.menge}</td>
                    <td><button onclick="produktEntfernen(${i})">Entfernen</button></td>
                `;
                tbody.appendChild(tr);
            });
            totalEl.textContent=sum.toFixed(2)+' €';
        }
        function produktEntfernen(i){
            let cart=JSON.parse(localStorage.getItem('warenkorb'))||[];
            cart.splice(i,1);
            localStorage.setItem('warenkorb',JSON.stringify(cart));
            showNotification('Produkt entfernt!');
            warenkorbAnzeigen();
        }
        function warenkorbLeeren(){
            localStorage.removeItem('warenkorb');
            showNotification('Warenkorb geleert!');
            warenkorbAnzeigen();
        }
        function applyCoupon(){
            const code=document.getElementById('coupon').value.trim();
            const totalEl=document.getElementById('gesamtpreis');
            let sum=parseFloat(totalEl.textContent);
            if(code==='BFS'){
                sum*=0.90;
                totalEl.textContent=sum.toFixed(2)+' €';
                showNotification('10% Rabatt angewendet!');
            } else {
                showNotification('Ungültiger Rabattcode!');
            }
        }
        function showNotification(msg){
            const n=document.getElementById('notification');
            n.innerText=msg;
            n.style.display='block';
            setTimeout(()=>{ n.style.opacity='0'; setTimeout(()=>{ n.style.display='none'; n.style.opacity='1'; },300); },2000);
        }

        document.addEventListener('DOMContentLoaded',warenkorbAnzeigen);
    </script>
</body>
</html>
