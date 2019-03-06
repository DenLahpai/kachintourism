<nav>
    <!-- search -->
    <div class="search">
        <form action="#" method="post">
            <ul>
                <li id="menu-button">
                    &#9776;
                </li>
                <li>
                    <input type="text" name="Search" id="Search">
                </li>
                <li>
                    <button type="button" id="buttonSearch" name="buttonSearch">Search</button>
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
                    echo "<a href=\"\">$row_Users->FirstName</a>";
                }
                else {
                    echo "<a href=\"index.php\">login</a>";
                }
                ?>
            </li>
            <li>
                <a href="logout.php">logout</a>
            </li>
        </ul>
    </div>
    <!-- end of menu -->
</nav>
