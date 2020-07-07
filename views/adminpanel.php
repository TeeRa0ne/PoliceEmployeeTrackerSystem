<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Police Employee Tracker System</title>
    <link rel="stylesheet" href="../assets/css/adminpanel.css">
</head>
<body>
    <header class="global">
        <div class="header1">
        <img class="logo" src="../assets/img/FBI.png" alt="logo">
            <h1 class="title">Federal Bureau of Investigation</h1>
            <div>
                <p>Administrator</p>
            </div>
        </div>
    </header>
    <hr>
    <div class="container">
        <h2>Administration Panel</h2>
        <div class="button-list">
            <button onclick=window.location.href='../views/adminfunction/add.php'; class="button-submit" type="submit"><a>Add new employee</a></button>
            <button onclick=window.location.href='../views/adminfunction/edit.php'; class="button-submit" type="submit"><a href="#">Edit existing employee</a></button>
            <button onclick=window.location.href='../views/adminfunction/remove.php'; class="button-submit" type="submit"><a href="#">Remove a employee</a></button>
            <button onclick=window.location.href='../views/adminfunction/list.php'; class="button-submit" type="submit"><a href="#">List of employee</a></button>
        </div>
    </div>
</body>
</html>