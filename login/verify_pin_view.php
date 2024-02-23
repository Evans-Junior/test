
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link rel="stylesheet" href="../css/verify.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">ASBED</div>
    </div>
    <div class="wrapper">
        <h1>Verify PIN</h1>
        <form action="../actions/verify_pin_action.php" method="post">
            <div class="input-group">
                <label for="pin">Verification PIN</label>
                <input type="text" id="pin" name="pin" required>
            </div>
            <button type="submit" name="verify_pin">Verify</button>
        </form>
    </div>
</body>
</html>
