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
        <div>
            <form action="" method="post">
                <label for="username">Username(login) :</label>
                    <input for="username" type="text">
                <label for="pwd">Password(login) :</label>
                    <input for="pwd" type="password">
                <label for="firstname">First name of employee :</label>
                    <input for="firstname" type="text">
                <label for="lastname">Last name of employee :</label>
                    <input for="firstname" type="text">
                <label for="rank">Rank :</label>
                    <input for="rank" type="text">
                <label for="experience">Experience :</label>
                    <input for="experience" type="text">
                <label for="perm">Permission on the site :</label>
                    <input for="perm" type="text">
                <label for="activeInactive">Active or Inactive :</label>
                <select id="activeInactive" name="cars">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                <label for="gender">Select gender :</label>  
                    <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label><br>
                    <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label><br>

            </form>
        </div>
    </div>
</body>
</html>