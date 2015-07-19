<header>
    <div class="wrap">
        <div id="logo">
            <a href="/"><img src="../static/images/logo.png" height="50" width="300"></a>
        </div>
        <nav>
            <?php
            echo '<a href="/">Home</a><a href="bet/betitall">Bet it all!</a>';
            if (isset($_SESSION['login']) && $_SESSION['login'] != ''):
                echo '<a href="bet/createbet">Create your bet</a><a href="bet/mybets">My bets</a><a href="user/profile">My profile</a>';
            else:
                echo '<a href="user/signin">Sign in</a><a href="user/login">Log in</a>';
            endif
            ?>
        </nav>
    </div>
</header>
<div id="container">
    <div class="wrap">