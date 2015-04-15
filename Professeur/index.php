<?php
    require "connect.php";

    if (!empty($_POST))
    {
		echo "LSKFJDLKSJMLDSKJLDJSK";
		$user = $_POST['user'];
		$passwd = $_POST['passwd'];
		
        $query = "SELECT * FROM profcodes WHERE username = ";// . $user;

		$login_ok = false;
		
		echo $query;
		
		$result = $link->query($query);
		if ($result == false)
			echo "LKDSJ";
		while ($row = $result->fetch_assoc())
		{
            // Using the password submitted by the user and the salt stored in the database,
            // we now check to see whether the passwords match by hashing the submitted password
            // and comparing it to the hashed version already stored in the database.
/*            $check_password = hash('sha256', $_POST['password']);
            for ($round = 0; $round < 65536; $round++)
            {
                $check_password = hash('sha256', $check_password);
            }
            
            if ($check_password === $row['password'])
            {*/
                $login_ok = true;
/*            }
*/
			echo '<p><strong>' . htmlspecialchars($row['username']) . '</strong> : ' . htmlspecialchars($row['password']) . '</p>';
		}
                
        if ($login_ok)
        {
            // Here I am preparing to store the $row array into the $_SESSION by
            // removing the salt and password values from it.  Although $_SESSION is
            // stored on the server-side, there is no reason to store sensitive values
            // in it unless you have to.  Thus, it is best practice to remove these
            // sensitive values first.
            unset($row['salt']);
            unset($row['password']);
            
            // This stores the user's data into the session at the index 'user'.
            // We will check this index on the private members-only page to determine whether
            // or not the user is logged in.  We can also use it to retrieve
            // the user's details.
            $_SESSION['user'] = $row;
            
            // Redirect the user to the private members-only page.
            header("Location: exhandle.php");
            die("Redirecting to: exhandle.php");
        }
        else
        {
            // Tell the user they failed
            print("Login Failed.");
            
            // Show them their username again so all they have to do is enter a new
            // password.  The use of htmlentities prevents XSS attacks.  You should
            // always use htmlentities on user submitted values before displaying them
            // to any users (including the user that submitted them).  For more information:
            // http://en.wikipedia.org/wiki/XSS_attack
            //$submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
			
        }
    }
?>

<html>
	<title>Balance Roberval - Configuration</title>
	<body>
		Bonjour. Ici la page de configuration
		<div>
			Logo
		</div>
		<form>
			Code : 
			<input type="text" name="user">
			<input type="text" name="passwd">
			<input type="submit" value="Login" action="index.php">
		</form>
	</body>
</html>

		<!-- <script type="text/javascript" src="config.js"></script> -->