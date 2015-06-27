<?php

/**
* Purpose: Verifies key in session with the image output from image.php
* By: Matthew L Jones (mljphpdev.com)
* Created: 07/07/2008
* Last Updated: 06/26/2015
*/

session_start();

if (isset($_POST['answer'])) {
    if ($_SESSION['key'] == trim($_POST['answer'])) {
        $html = "<p>You are verified.</p>";
    } else {
        $html = "<p>Incorrect verification entry.</p>";
    }

    //session_destroy();

} else {

    $html = <<<EOD
    <p>
        <img src='image.php' alt='security image'/>
        <br />
        <br />
        Enter the code you see in the image above. (case sensitive)
    </p>
    <form action='index.php' method='post'>
        <p>
            <input type='text' name='answer' value='' />
            <input type='submit' value='Submit' />
        </p>
    </form>
EOD;

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <head>
  <title>Veripic</title>
 </head>
 <body style="background-color: black; color: white;">
  <?php echo $html; ?>
 </body>
</html>