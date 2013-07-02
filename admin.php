<?php

$username = $_POST['username'];
// sets username equal to the posted variable "username" from the form on the submited page
if(!isset($_SESSION['session']["logged_in"])) {
// checks to see if a session has already been started (sesson is not NULL), and if not (is NULL), redirects the browser to login.php 
  header("Location: login.php");
// redirect to login.php
}
if (isset($_GET['username'])
// checks to see if username is a paramnter in the url ($_GET)
// Suggestion: add closing quote at and and use $_POST (isset($_GET['username']))
//  get or you could use this  - if (isset($username))
{ 
  $username = filterinput($_POST['username']);
  // sets username equal to the output of function filterinput() with the paramnter of the form posted value of username
}
include("http://242.32.23.4/inc/admin.inc.php");
// include the this code at lcation remote location provided remote includes are enabled.
// Suggestion: move includes to the top of the page
if (isset($_GET['page_id'])) {
	// check if page_id is a paramneter in the url
   include('inc/inc' . $_GET['page_id'] . '.php');
  // access the php include with a file name "inc" followed by the pag_id
  include('inc/inc-base.php');
  // access this include
}

function filterinput($variable)
{
    // function takes a paramnter and returns a value with single and double quotes replaced with
    //  single and double quotes with a back slash in front of it	
    // Suggestion: use php addslashes() functon instead.
    $variable = str_replace("'", "\'", $variable);
	// replace single quote with backslash single quote
    $variable = str_replace(""", "\"", $variable);
	// the three double quotes in a row will error better to use php addslashes()
    return $variable;
}

function getUserContent($username)
{
    // set up a connection to the database dbuser
    $con=mysqli_connect("locahost","dbuser","abc123","my_db");
	// Suggestion: You might want to add connection error condition here
	// create a result querry selecting the user_content field(s) from the rows where the username column matches $username 
	// Suggestion: might want to add limit 1 so multiple rows are not selected.
    $result = mysqli_query($con,"SELECT user_content FROM users where username = ". $username);
	// Suggestion: $result = mysqli_query($con,"SELECT user_content FROM users where username = '".$username."'"); 
	// or $result = mysqli_query($con,"SELECT user_content FROM users where username = '$username'"); 
    $row = mysqli_fetch_array($result);
    // set $row equal to the querry assuming there is just one result.  
    return $row['user_content'];
 	//return the value
    mysqli_close($con);
	//close the database connctions
    // you would want to close the database connection before you return the value
}
echo "<h1>Welcome, ". $username ."</h1>";
// outputs welcome and the users name
echo getUserContent($username);
// outputs the users content from the database

// in genral I would rearrange the code. the includes at the top,  then the functions, the the execution / procedure.
// I would change the procedure to first check if a seesion is active, then check if username was posted, then run the functions.
?>