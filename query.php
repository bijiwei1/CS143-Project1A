<html>
<head>
    <title>CS 143 Project 1A</title>
</head>

<body>
	<header>
        <h1>CS 143 Project 1A</h1>
    </header>

    <p>
		<form action ="" method="GET">
			<textarea> NAME="query" rows=10 cols=50> 
				<?php if (isset($_GET["query"])) echohtmlspecialchars($_GET["query"]);?>
			</textarea><br />
			<input type="submit" value="Submit" />
		</form>

		 <?php
        if (!isset($_GET["query"]) || $_GET["query"] === "")
            die("No query entered.");
        $db = mysql_connect("localhost", "cs143", "");
        if (!$db)
            die("Unable to connect to database: " . mysql_error());
        $db_selected = mysql_select_db("CS143", $db);
        if (!$db_selected)
            die("Unable to select database: " . mysql_error());
        $sql = $_GET["query"];
        if (!$result = mysql_query($sql))
            die("Error executing query: " . mysql_error());
       
   		?>
	</p>
</body>>
</html>