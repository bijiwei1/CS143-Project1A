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
			<textarea name="query" rows="10" cols="50"> 
				<?php if (isset($_GET["query"])) echo htmlspecialchars($_GET["query"]);?>
			</textarea><br />
			<input type="submit" value="Submit" />
		</form>

		 <?php
        	if (!isset($_GET["query"]) || $_GET["query"] === "")
        		die("No query entered.");
		
			//connect to local machine with username cs143 and empty pw
			$db_connection = mysql_connect("localhost", "cs143", "");
			if(!$db_connection) {
   				//$errmsg = mysql_error($db_connection);
    			//print "Connection failed: $errmsg" <br />;
    			//exit(1);
    			die ("Connection failed" . mysql_error());
			}

			//select a specific database
			$db_selected = mysql_select_db("CS143", $db_connection);
			if(!$db_selected) {
   				//$errmsg = mysql_error($db_selected);
    			//print "Connection failed: $errmsg" <br />;
    			//exit(1);
    			die ("Connection failed" . mysql_error());
			}

			//check user input 
			//$sanitized_name = mysql_real_escape_string($name, $db_connection);
			//$query_to_issue = sprintf($query, $sanitized_name);
			//issue queries
			$user_sql =  $_GET["query"];
			$rs = mysql_query($user_sql);
			if(!$rs) {
				//$errmsg = mysql_error($rs);
    			//print "Connection failed: $errmsg" <br />;
    			//exit(1);
    			die ("Connection failed" . mysql_error());
			}

			 // Print table with results
      		echo "<h3>Results from MySQL:</h3>\n";
        	echo "<table border=1 cellspacing=1 cellpadding=2>\n";
        	echo "<tr>";
        	for ($i = 0; $i < mysql_num_fields($result); $i++) {
            	$field = mysql_fetch_field($result, $i);
            	echo "<td>" . $field->name . "</tb>";
        	}
        	echo "</tr>\n";

        	while ($row = mysql_fetch_row($result)) {
            	echo "<tr>";
            	for ($i = 0; $i < mysql_num_fields($result); $i++) {
                	$val = $row[$i];
                	if (is_null($val)){
                    	$val = "N/A";
                	}
                	echo "<td>" . $val . "</td>";
           		}
            	echo "</tr>\n";
        	}   

        	echo "</table>\n";
			//release result
			mysql_free_result($rs);
			//close datavase
			mysql_close($db_connection);
   		?>
	</p>
</body>>
</html>