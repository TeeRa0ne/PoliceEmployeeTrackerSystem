<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Employee System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="global">
        <div class="header1">
        <img class="logo" src="../assets/img/FBI.png" alt="logo">
            <h1 class="title">Federal Bureau of Investigation</h1>
            <p>Authorized personal only</p>
        </div>
    </header>
    <div class="background">
        <div class="container">
            <h2>Employee Police Database</h2>
            <form method="post">
                <div class="form1">
                    <label for="login">Login :</label>
                    <input name="login" type="text">
                    <br>
                    <label for="pass">Password :</label>
                    <input name="pass" type="password">
                </div>
            </form>   
            <div class="adminpanel-signin">
                <a href="adminpanel.php">Admin Panel</a>
                <button class="button-submit" type="submit">Submit</button>
            </div>
        </div>
    </div>
</body>
</html>