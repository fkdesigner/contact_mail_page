<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CONTACT</title>
</head>
<body>
<?php

############################################################
/*
FK Contact Mail System
Author: Fýrat KOYUNCU
Nick: FK Designer
Website: www.fkdesigner.com
E-Mail: fkdesigner@hotmail.com - iletisim@fkdesigner.com
Facebook Page: www.facebook.com/fkdesigner
Twitter Page: www.twitter.com/fkdesigner
*/
############################################################

//Functions:
//empty_control: The function which I writed to not send mail empty.
function empty_control($valuable){
	if (empty($valuable)){
	echo "<br><center><b><font face='verdana' size='2' color='red'>Fill in all gaps please.</font></b>";
	echo "<br><br><a href='contact.php'>Click to go back.</a></center><br>";
	exit;
	}
return;
}
//security_filter: This function clears all of html codes and some syntaxs which are used to write code.
function security_filter($variable){
	$variable = strip_tags ($variable);
	$variable = eregi_replace ("<", "", $variable);
	$variable = eregi_replace (">", "", $variable);
	$variable = eregi_replace ("/", "", $variable);
	$variable = eregi_replace ("=", "", $variable);
	$variable = eregi_replace ("'", "", $variable);
	$variable = eregi_replace ('"', "", $variable);
	$variable = eregi_replace ("{", "", $variable);
	$variable = eregi_replace ("}", "", $variable);
	$variable = eregi_replace ("&", "", $variable);
	$variable = eregi_replace ("%", "", $variable);
	$variable = eregi_replace ("$", "", $variable);
return $variable;
}

//If the form is sent, the operates which are in below will work.
if (isset($_POST["security"])) {

//We are taking the variables which come from the form and save them the variables.
$name_surname = $_POST['name_surname'];
$e_mail = $_POST['e_mail'];
$subject = $_POST['subject'];
$security = $_POST['security'];
$message = $_POST['message'];

//If the form sent empty, we will give an error.
empty_control($name_surname);
empty_control($e_mail);
empty_control($subject);
empty_control($security);
empty_control($message);

//We are controlling the e-mail form if its form is true or not.
if (eregi("^.+@.+\..+$", $e_mail, $e_mail )){
}
else {
echo '<br><font face="arial" size="3" color="red">Please enter your e-mail adress as correct form.</font><br>';
echo "<br>";
echo '<a href="contact.php">Go Back</a>';
exit;
}
list ($e_mail) = $e_mail;

//We are controlling all of variables in here by security_filter;
security_filter($name_surname);
security_filter($e_mail);
security_filter($subject);
security_filter($security);
security_filter($message);

//We are controlling the answer of security question here, if it is answered as true so the mail will sent.
if ($security == "44"){
//WRITE YOUR MAIL ADRESS TO BELOW THIS SENTENCE INSTEAD OF YOUR@MAIL.ADRESS
$to = 'your@mail.adress';
$headers = 'From:'."$e_mail"."\n";
$headers .= 'Reply-To:'."$e_mail"."\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\n";

$last_message .= '<b>Information of the Sender:</b><br><font color="red">Name Surname : </font>'."$name_surname".'<br><font color="red">E-Mail Adress : </font>'."$e_mail".'<br><font color="red">Subject : </font>'."$subject".'<br><font color="red">Message : </font>';
$last_message .= $message;
$last_message .= '<br><br><font face="verdana" size="1" color="black">This e-mail is sent by Contact Mail System of <b><font face="verdana" size="1" color="red">FK</font> <font face="verdana" size="1" color="blue">Designer</font> Networking Services</b></font><br><br>';
$last_subject = "CONTACT MAIL";
if (mail($to, $last_subject, $last_message, $headers)){
echo '<br><center><b><font face="arial" size="4" color="green">Your message has sent, thanks.</font></b></center><br>';
}
else {
echo '<br><center><font face="arial" size="3" color="red">There is a problem, so your message couldn\'t sent. Please try again later.</font></center><br>';
}
}
else {
echo '<br><font face="arial" size="3" color="red">You answered security question false.</font><br>';
echo "<br>";
echo '<a href="contact.php">Go Back</a>';
exit;
}

}
//If the form is not sent, the guest will show empty form.
else { ?>
<br />
<br />
<br />
<form action="<?php echo $_SERVER["SCRIPT_NAME"] ?>" method="post">
<font face="arial" size"3" color="black">Name Surname : </font><input type="text" name="name_surname" size="25" maxlength = "25"><br>
<br><font face="arial" size"3" color="black">E-Mail Adress : </font><input type="text" name="e_mail" size="25" maxlength = "25"><br>
<br><font face="arial" size"3" color="black">Subject : </font><input type="text" name="subject" size="25" maxlength = "25"><br>
<br><font face="arial" size"3" color="black">Security Question :
<br> 15+22+7 = </font><input type="text" name="security" size="10" maxlength = "10"><br>
<br><font face="arial" size"3" color="black">Your Message : </font><br><textarea name="message" rows="10" cols="40" tabindex="40" maxlength = "500"></textarea><br>
<br><input type="reset" value="CLEAR"> <input type="submit" value="SEND">
</form>



<?php
}
?>
<br>
<br>
<center><font face="verdana" size="1" color="black">FK Contact Mail System</font>
<br><font face="verdana" size="1" color="red">FK </font><font face="verdana" size="1" color="blue">Designer </font><font face="verdana" size="1" color="black">Networking Services: </font> <font face="verdana" size="1" color="blue"><a href="http://www.fkdesigner.com">www.fkdesigner.com</a></font></center>
</body>
</html>
