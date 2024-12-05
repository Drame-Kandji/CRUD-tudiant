<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="style.css">
    <title>se connecter</title>
</head>
<style>
.container {
    width: 250px;
    height: 250px;
}

.title {
    transform: translate(50px, 30px);
}

.container input[type="submit"] {
    margin-top: 40px;
    background: blueviolet;
    border-radius: 5px;
    width: 77%;
    color: rgb(255, 255, 255);
    border: none;
    font-size: 18px;
}
</style>

<body>
    <div class="container">
        <div class="title">
            <p>Se Connecter</p>
        </div>
        <form action="" method="post">
            <input type="text" name="email" id="" placeholder="email">
            <input type="password" name="password" id="" placeholder="password">
            <input type="submit" name="connecter" id="connecter" value="Connecter">
        </form>
    </div>


</body>

</html>