<?php
session_start();

$message = '';
// 1) Einzelnes Produkt entfernen
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove'])) {
        $n = $_POST['remove'];
        unset($_SESSION['cart'][$n]);
        $message = 'Produkt entfernt!';
    }
    // 2) Warenkorb leeren
    elseif (isset($_POST['empty'])) {
        unset($_SESSION['cart']);
        unset($_SESSION['coupon']);
        $message = 'Warenkorb geleert!';
    }
    // 3) Rabattcode anwenden
    elseif (!empty($_POST['coupon'])) {
        $code = trim($_POST['coupon']);
        if ($code === 'BFS') {
            $_SESSION['coupon'] = 0.90;
            $message = '10% Rabatt angewendet!';
        } else {
            $message = 'Ungültiger Rabattcode!';
        }
    }
    header('Location: warenkorb.php?msg=' . urlencode($message));
    exit;
}

// 4) Nachricht aus GET
$message = $_GET['msg'] ?? '';

// 5) Warenkorb & Gesamt berechnen
$cart = $_SESSION['cart'] ?? [];
$total = 0;
foreach ($cart as $name => $item) {
    $total += $item['price'] * $item['qty'];
}
if (isset($_SESSION['coupon'])) {
    $total *= $_SESSION['coupon'];
}
?>
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
        h1 { color: #333; text-align: center; font-size: 2.5rem; margin-bottom: 20px; }
        table {
            width: 100%; border-collapse: collapse; margin-top: 30px;
            background: white; box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
        }
        th, td {
            padding: 15px; text-align: center; border-bottom: 1px solid #ddd;
        }
        th {
            background-color: rgb(0,166,19);
            color: white; text-transform: uppercase;
        }
        tfoot td { font-weight: bold; font-size: 1.2rem; }
        .buttons { margin-top: 20px; text-align: center; }
        .buttons a, .buttons button {
            text-decoration: none; background-color: rgb(85,0,255);
            color: white; padding: 12px 25px; margin: 5px;
            border: none; border-radius: 8px; cursor: pointer;
            transition: background-color 0.3s;
        }
        .buttons a:hover, .buttons button:hover { background-color: #e03e00; }
        .coupon { margin-top: 20px; text-align: center; }
        .coupon input {
            padding: 10px; font-size: 1rem; width: 200px;
            margin-right: 10px; border-radius: 5px; border: 1px solid #ccc;
        }
        .coupon button {
            padding: 10px 20px; background-color: #333;
            color: white; border: none; border-radius: 5px;
            cursor: pointer;
        }
        .coupon button:hover { background-color: #555; }
        .notification {
            position: fixed; top: 20px; right: 20px;
            background-color: #4CAF50; color: white;
            padding: 15px; border-radius: 5px; display: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            font-size: 16px; z-index: 1200; transition: opacity 0.3s;
        }
        body.dark-mode { background-color: #121212; color: white; }
        table.dark-mode { background-color: #222; color: white; }
        th.dark-mode { background-color: #333; }
        .buttons.dark-mode a, .buttons.dark-mode button { background-color: #333; }
        h1.dark-mode { color: #ff4500; }
        .notification.dark-mode { background-color: #ff4500; }
        .dark-mode-toggle {
            position: fixed; top: 20px; right: 20px;
            background-color: #333; color: white;
            padding: 10px 20px; border: none; border-radius: 5px;
            cursor: pointer; z-index: 1100; transition: background-color 0.3s;
        }
        .dark-mode-toggle:hover { background-color: #555; }
    </style>
</head>
<body>
    <?php if ($message): ?>
        <div class="notification" style="display:block;"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

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
        <?php if (empty($cart)): ?>
            <tr><td colspan="4">Ihr Warenkorb ist leer.</td></tr>
        <?php else: ?>
            <?php foreach ($cart as $name => $item): ?>
            <tr>
                <td><?= htmlspecialchars($name) ?></td>
                <td><?= number_format($item['price'], 2, ',', '.') ?> €</td>
                <td><?= $item['qty'] ?></td>
                <td>
                    <form method="post" style="display:inline">
                        <button name="remove" value="<?= htmlspecialchars($name) ?>">Entfernen</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">Gesamt</td>
                <td colspan="2"><?= number_format($total, 2, ',', '.') ?> €</td>
            </tr>
        </tfoot>
    </table>

    <div class="coupon">
        <form method="post">
            <input type="text" name="coupon" placeholder="Rabattcode eingeben">
            <button type="submit">Rabatt anwenden</button>
        </form>
    </div>

    <div class="buttons">
        <a href="index.php">Weiter einkaufen</a>
        <form method="post" style="display:inline">
            <button name="empty" type="submit">Warenkorb leeren</button>
        </form>
    </div>

    <button class="dark-mode-toggle" onclick="toggleDarkMode()">Dark Mode</button>
    <script>
        function toggleDarkMode(){
            document.body.classList.toggle('dark-mode');
            document.querySelector('table').classList.toggle('dark-mode');
            document.querySelectorAll('th').forEach(th=>th.classList.toggle('dark-mode'));
            document.querySelectorAll('.buttons a, .buttons button').forEach(b=>b.classList.toggle('dark-mode'));
            document.querySelector('h1').classList.toggle('dark-mode');
            document.querySelectorAll('.notification').forEach(n=>n.classList.toggle('dark-mode'));
            localStorage.setItem('dark-mode', document.body.classList.contains('dark-mode')?'enabled':'disabled');
        }
        if(localStorage.getItem('dark-mode')==='enabled') toggleDarkMode();
    </script>
</body>
</html>
