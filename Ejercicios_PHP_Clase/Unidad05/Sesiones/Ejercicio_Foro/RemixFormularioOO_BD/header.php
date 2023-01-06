    <div class="cabecera-Cont">
        <img class="cabecera-logo" src="./Assets/img/logo.svg" alt="TheBlastSFX"/>
        <div class="cabecera-enlaces">
            <?php if(!isset($_SESSION['id_user'])) {
                echo '<a href="./login_v2.php">Login</a>';
            }else {
                echo $_SESSION['username'];
                echo "<a href='./logOut.php'>Log Out</a>";
            } ?>
        </div>
    </div>
