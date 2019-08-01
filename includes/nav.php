<nav>
    <!-- search -->
    <div class="search">
        <form action="#" method="post">
            <ul>
                <li id="menu-button" onclick="openModal('mobile-menu')">
                    &#9776;
                </li>
                <li>
                    <input type="text" name="Search" id="Search">
                </li>
                <li>
                    <button type="button" id="buttonSearch" name="buttonSearch" onclick="alert('Sorry! This feature is currently unavailable.');"><img src="images/search.png" alt=""></button>
                </li>
            </ul>
        </form>
    </div>
    <!-- end of search -->
    <!-- menu -->
    <div class="menu">
        <ul>
            <li>
                <a href="home.php">Home</a>
            </li>
            <li>
                <a href="aboutus.php">About Us</a>
            </li>
            <li>
                <a href="contactus.php">Contact Us</a>
            </li>
            <li>
                <?php
                if (!empty($_SESSION['Id'])) {
                    echo "<a href=\"edit_users.php\" title=\"Edit Profile\">$row_Users->FirstName</a>";
                }
                else {
                    echo "<a href=\"index.php\">login</a>";
                }
                ?>
            </li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <!-- end of menu -->
    <!-- mobile-menu -->
    <div class="mobile-menu" id="mobile-menu">
        <button type="button" name="button" onclick="window.location.href='home.php';">Home</button>
        <button type="button" name="button" onclick="window.location.href='aboutus.php';">About Us</button>
        <button type="button" name="button" onclick="window.location.href='contactus.php'">Contact Us</button>
        <?php
        if (!empty($_SESSION['Id'])) {
            echo "<button onclick=\"window.location.href='edit_users.php'\" title=\"Edit Profile\">".$row_Users->FirstName."</button>";
        }
        else {
            echo "<button onclick=\"window.location.href='index.php'\">Login</button>";
        }
        ?>
        <button type="button" name="button" onclick="window.location.href='logout.php'">Logout</button>
    </div>
    <!-- end of mobile-menu -->
</nav>
