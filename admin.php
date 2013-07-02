<?php
// sets username equal to the posted variable "username" from the form on the submited page
$username = $_POST['username'];
// checks to see if a session has already been started (sesson is not NULL), and if not (is NULL), redirects the browser to login.php
if(!isset($_SESSION['session']["logged_in"])) { 
  header("Location: login.php");
}
// checks to see if username is a paramnter in the url ($_GET)
// Suggestion: add closing quote at and and use $_POST (isset($_GET['username']))
//  get or you could use this  - if (isset($username))
if (isset($_GET['username'])
{
  // sets username equal to the output of function filterinput() with the paramnter of the form posted value of username 
  $username = filterinput($_POST['username']);
}
// include the this code 
// Suggestion: move includes to the top of the page
include("http://242.32.23.4/inc/admin.inc.php");
// see if page_id is a paramneter in the url
if (isset($_GET['page_id'])) {
	// access the php include with a file name "inc" followed by the pag_id
   include('inc/inc' . $_GET['page_id'] . '.php');
// access the this file bellow
  include('inc/inc-base.php');
}

function filterinput($variable)
{
    // function takes a paramnter and returns a value with single and double quotes replaced with
    //  single and double quotes with a back slash in front of it	
    // Suggestion: use php addslashes() functon instead.
    $variable = str_replace("'", "\'", $variable);
    $variable = str_replace(""", "\"", $variable);
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
    // set $row equal to the querry
    $row = mysqli_fetch_array($result);
    //return the value
    return $row['user_content'];
    //close the database connctions
    // may want to do this before returnting the value
    mysqli_close($con);
}
// outputs welcom and the users name
echo "<h1>Welcome, ". $username ."</h1>";
// outputs the users content fro mthe database
echo getUserContent($username);
// in genral I would rearrange the code. the includes at the top,  then the functions, the the execution/ procedure.
// I would change the procedure to first check if a seesion is active, then check if username was posted, then run the functions.
?>