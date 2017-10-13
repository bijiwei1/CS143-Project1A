<html>
<head>
    <title>CS 143 Project 1A</title>
</head>

<body>
    <header>
        <h1>CS 143 Project 1A</h1>
    </header>

    <p>
        <form action="" method="GET">
            <textarea name="query" cols="100" rows="10"><?php if (isset($_GET["query"])) echo htmlspecialchars($_GET["query"]);?>
            </textarea><br />
            <input type="submit" value="Submit" />
        </form>

        <?php
        if (!isset($_GET["query"]) || $_GET["query"] === "")
            die("No query entered.");
        $db_connection = mysql_connect("localhost", "cs143", "");

        if (!$db_connection)
            die("Unable to connect to database: " . mysql_error());

        $db_selected = mysql_select_db("CS143", $db_connection);
        if (!$db_selected)
            die("Unable to select database: " . mysql_error());

        $user_sql = $_GET["query"];
        if (!$result = mysql_query($user_sql))
            die("Error executing query: " . mysql_error());


        // Print table with results
        echo "<h3>Results from MySQL:</h3>\n";
        echo "<table border=1 cellspacing=1 cellpadding=2>\n";
        echo "<tr>";
        for ($i = 0; $i < mysql_num_fields($result); $i++) {
            $field = mysql_fetch_field($result, $i);
            echo "<td><b>" . $field->name . "</b></td>";
        }
        echo "</tr>\n";
        while ($row = mysql_fetch_row($result)) {
            echo "<tr>";
            for ($i = 0; $i < mysql_num_fields($result); $i++) {
                $val = $row[$i];
                if (is_null($val))
                    $val = "N/A";
                echo "<td>" . htmlspecialchars($val) . "</td>";
            }
            echo "</tr>\n";
        }    
        echo "</table>\n";
        mysql_free_result($result);
        mysql_close($db);
        ?>
    </p>
</body>
</html>