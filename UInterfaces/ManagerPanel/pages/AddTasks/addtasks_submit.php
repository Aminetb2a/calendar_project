<?php
/*** begin our session ***/
session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index.php?err=2');
    }


/*** first check that both the title and desription have been sent ***/
/*if(!isset( $_POST['title'], $_POST['description']))
{
    $message = 'Please enter a valid username and password';
}
/*** check the title is the correct length ***/
/*elseif (strlen( $_POST['title']) > 254 || strlen($_POST['title']) < 2)
{
    echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/addtasks/addtasks.php';</script>");
}
/*** check the desription is the correct length ***/
/*elseif (strlen( $_POST['description']) > 254 || strlen($_POST['description']) < 10)
{
    echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/addtasks/addtasks.php';</script>");
}
*/
if ($_POST['title'] == '' || $_POST['description'] == '' || $_POST['start'] == '' || $_POST['due'] == '' || $_POST['manager'] == '' || $_POST['members'] == '')
{
        /*** if there is no match ***/
        $message = "************Please fill all the fields************";
		include('addtasks.php');
		
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $start = filter_var($_POST['start'], FILTER_SANITIZE_STRING);
    $due = filter_var($_POST['due'], FILTER_SANITIZE_STRING);
	$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
	$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
	$manager = filter_var($_POST['manager'], FILTER_SANITIZE_STRING);
	$members = filter_var($_POST['members'], FILTER_SANITIZE_STRING);
	$myID = filter_var($_SESSION['sess_username'], FILTER_SANITIZE_STRING);




    /*** now we can encrypt the password ***/
    /**$phpro_password = sha1( $phpro_password );*///
    
    /*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';

    /*** mysql username ***/
    $mysql_username = 'root';

    /*** mysql password ***/
    $mysql_password = '';

    /*** database name ***/
    $mysql_dbname = 'phpro_auth';

    try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$myID = $_SESSION['sess_username']	;
        /*** prepare the insert ***/
        $stmt = $dbh->prepare("INSERT INTO task (taskTitle, startDate , dueDate ,description, manager , members ,addedBy) VALUES (:title, :start, :due, :description, :manager, :members ,:myID)");

        /*** bind the parameters ***/
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
		$stmt->bindParam(':start', $start, PDO::PARAM_STR);
		$stmt->bindParam(':due', $due, PDO::PARAM_STR);
		$stmt->bindParam(':manager', $manager, PDO::PARAM_STR);
        $stmt->bindParam(':members', $members, PDO::PARAM_STR);	
		$stmt->bindParam(':myID', $myID, PDO::PARAM_STR);




        /*** execute the prepared statement ***/
        $stmt->execute();


        /*** if all is done, say thanks ***/
			
			echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages';</script>");
    }
    catch(Exception $e)
    {
        /*** check if the username already exists ***/
        if( $e->getCode() == 23000)
        {
            $message = 'Title already exists';
        }
        else
        {
            /*** if we are here, something has gone wrong with the database ***/
            $message = 'We are unable to process your request. Please try again later"';
        }
    }
}
?>

<html>
<head>
<title>PHPRO Login</title>
</head>
<body>
<p><?php echo $message; ?>
</body>
</html>