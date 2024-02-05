<!doctype html>
<html>
    <body>
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                require_once("db_connect.php");
                DatabaseCreate::initializeDatabase();
                
                echo "<h3>Database Initialized</h3>";
            }
        ?>
        <form method="POST">
            <input type="submit" value="Initialize Database" >
        </form>
    </body>
</html>