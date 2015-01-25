<header>
    <nav>
        <a href="home">Home</a>
        <a href="bets">Bets</a>
        <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] != ''):
            echo '<a href="betyouall">Bet you all!</a> <a href="mybets">My bets</a> <a href="profile">My profile</a>';
        else:
            echo '<a href="signin">Sign in</a> <a href="login">Log in</a>';
        endif
        ?>
    </nav>
</header>