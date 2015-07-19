<?php
include("views/head.php");
include("views/header.php");?>

    <div id="login">
        <h2>Login</h2>
        <form action="" method="post">
            <label>Username :</label>
            <input id="name" name="username" placeholder="username" type="text">
            <label>Password :</label>
            <input id="password" name="password" placeholder="**********" type="password">
            <input name="submit" type="submit" value=" Login ">
            <span><?php echo $error; ?></span>
        </form>
    </div>
<?php
include("views/footer.php");