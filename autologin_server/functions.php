<?php

////////////////////////////////////////////////////////////////////////////

function sql_copy_new_into_userData($conn) {
	$sql = "INSERT INTO userData (username, password) SELECT l.username, l.password FROM credentials l WHERE NOT EXISTS (   SELECT 1   FROM userData u   WHERE u.username = l.username )";
	if (mysqli_query($conn, $sql)) {
        } else {
		#echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		echo "error JHR0382thgijof";
	}
}
////////////////////////////////////////////////////////////////////////////

function sql_delete_from_credentials($conn, $username, $password) {
	$sql = "DELETE FROM credentials
		WHERE username='$username' AND password='$password'";
	if (mysqli_query($conn, $sql)) {
        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

////////////////////////////////////////////////////////////////////////////////////

function sql_insert_credentials($conn, $username, $password) {
	$sql = "INSERT into credentials (username, password)
		VALUES ('$username', '$password')";
        if (mysqli_query($conn, $sql)) {
        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
////////////////////////////////////////////////////////////////////////////////////

function print_comments_reverse($conn) {
	$sql = "SELECT comment, timestamp FROM comments";
	$comments = mysqli_query($conn, $sql);
        if (!$comments) {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		die;
	}
	if (mysqli_num_rows($comments) > 0) {
		// reverse array
		$reverseArray = array();
		while ($row = mysqli_fetch_assoc($comments)) {
			array_unshift($reverseArray, $row);
		}
		// done. print reversed array
		foreach ($reverseArray as $row) {
			echo "<p>".$row["timestamp"]."</p>";
			echo "<p>&nbsp".$row["comment"]."</p>";
			echo "<hr>";
		}
	}
}

////////////////////////////////////////////////////////////////////////////////////

function print_comments($conn) {
	$sql = "SELECT comment, timestamp FROM comments";
	$comments = mysqli_query($conn, $sql);
        if (!$comments) {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		die;
	}
	if (mysqli_num_rows($comments) > 0) {
		while($row = mysqli_fetch_assoc($comments)) {
			echo $row["timestamp"]."<br>";
			echo "&nbsp".$row["comment"]."<br>";
			echo "<hr>";
		}
	}
}


////////////////////////////////////////////////////////////////////////////////////

function sql_insert_comment($conn, $comment) {
	$timestamp = date('Y-m-d H:i:s');
	$sql = "INSERT into comments (comment, timestamp)
		VALUES ('$comment', '$timestamp')";
        if (mysqli_query($conn, $sql)) {
        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

////////////////////////////////////////////////////////////////////////////////////
function sql_select_credentials($conn) {
        $sqllistings = "select username 
                from credentials";
        if ( !$resultlistings = mysqli_query($conn, $sqllistings) ) {
                echo "error1: " . $sqllistings . "<br>" . mysqli_error($conn);
                return "error";
        } else {
                $rowlistings = mysqli_fetch_all($resultlistings); 
                return $rowlistings;
        }
}

////////////////////////////////////////////////////////////////////////////////////

function is_in_haystack($needle, $arrayOfHaystacks) {
	if (count($arrayOfHaystacks) == 0) {
		return 0;
	}
        for ($i = 0; $i < count($arrayOfHaystacks); $i++) {
                $haystack[$i] = $arrayOfHaystacks[$i][0];
        }
        if (in_array("$needle", $haystack)) {
                return 1;
        } else {
                return 0;
        }
}

////////////////////////////////////////////////////////////////////////////////////

?>
