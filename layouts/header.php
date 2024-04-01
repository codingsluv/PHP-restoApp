<header>
    <div>
        <a href="index.php">RestoApp</a>
    </div>
    <div>
        <?php
        if (isset($_SESSION['is_login'])) {
            echo "<a href='report.php'>Report</a>";
            echo " ||||";
            echo "<a href='logout.php'>Logout</a>";
        } else {
            echo "<a href='login.php'>Login</a>";
        }
        ?>
    </div>
</header>