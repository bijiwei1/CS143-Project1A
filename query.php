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
		
			//connect to local machine with username cs143 and empty pw
			$db_connection = mysql_connect("localhost", "cs143", "");
			if(!$db_connection) {
   				$errmsg = mysql_error($db_connection);
    			print "Connection failed: $errmsg" <br />;
    			exit(1);
			}

			//select a specific database
			$db_selected = mysql_select_db("CS143", $db_connection);
			if(!$db_selected) {
   				$errmsg = mysql_error($db_selected);
    			print "Connection failed: $errmsg" <br />;
    			exit(1);
			}

			//check user input 
			//$sanitized_name = mysql_real_escape_string($name, $db_connection);
			//$query_to_issue = sprintf($query, $sanitized_name);
			//issue queries
			$user_sql =  $_GET["query"];
			$rs = mysql_query($user_sql, $db_connection);
			if(!$rs) {
				$errmsg = mysql_error($rs);
    			print "Connection failed: $errmsg" <br />;
    			exit(1);
			}

			//print result
			echo "<h3>Results from MySQL:</h3>\n";

			//release result
			mysql_free_result($result);
			//close datavase
			mysql_close($db_connection);
   		?>
	</p>
</body>>
</html>