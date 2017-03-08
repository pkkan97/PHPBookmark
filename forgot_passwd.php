<?php
  require_once("bookmark_fns.php");
  do_html_header("Resetting password");

  // creating short variable name
  $username = $_POST['username'];
 $result = new mysqli('localhost', 'bm_user', 'password', 'bookmarks'); 
 
 if($username){
	 
	   $conn = db_connect();
	 $emk=$conn->query("select email from user
                            where username='$username'");
	
	 
	 if($emk->num_rows!=0)
	 {

$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
$length = rand(10, 16); 
$new_password = substr( str_shuffle(sha1(rand() . time()) . $chars ), 0, 8 );
 
 	
		 
		 
		 //create a copy of the new password
		 $email_password=$new_password;
		  //encrypting the passy
		  
		   //upadte the db
		   $conn->query("update user set passwd='$new_password' where username='$username'");
		   //send the paassword to the user
		   $row = $emk->fetch_object();
      $email = $row->email;
		   $subject="PHPBookmark Login Information";
		   $message="Your password has been set.The password is"."<p>".$new_password;
		   $from="From: phpboookmarkco@gmail.com";
		   mail($email,$subject,$message,$from);
		   echo "your password has been set";
	 }
	 else
	 {
		 echo "sorry could not update the passowrd.try again later";
	 }
 }
  do_html_url('login.php', 'Login');
  do_html_footer();
?>
