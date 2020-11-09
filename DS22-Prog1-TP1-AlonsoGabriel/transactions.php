<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Homebanking</title>
</head>
<body>
    <form action="transaction.php" method="POST" class="form">
        <h2>Home Banking</h2>
        <p id="message">
            <?php if(isset($_GET['m'])){ echo $_GET['m'];} ?>
        </p>
        <label for="balance">Account balance</label>
        <input id="balance" name="balance" readonly value="<?php echo $_GET['b'] ?>">
        <label for="operation">Operation type</label>
        <select name="type">
            <option value="ext">Extraction</option>
            <option value="dep">Deposit</option>
        </select>
        <label for="amount">Amount</label>
        <input type="number" name="amount">
        <input type="submit" id="btn" value="Confirm transaction">
    </form>
</body>
</html>