<!DOCTYPE html>
<html>
  <title>W3.CSS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <body>
    <div class="w3-container w3-black">
      <center>
        <h2>CrimsonFusion.org Atlas Game Panel</h2>
      </center>
      <form action="" method="post" name="Login_Form">
        <?php
          /* Starts the session */
          session_start(); 
          /* Check Login form submitted */
          if(isset($_POST['Submit'])){
            /* Define username and associated password array */
            $logins = array('jwyles' => '21Cannon!');
            /* Check and assign submitted Username and Password to new variable */
            $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
            $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
          
          /* Check Username and Password existence in defined array */
          if (isset($logins[$Username]) && $logins[$Username] == $Password){
            /* Success: Set session variables and redirect to Protected page  */
            $_SESSION['UserData']['Username']=$logins[$Username];
            header("location:/index.php","_self");
            exit;
          } else {
          /*Unsuccessful attempt: Set error message */
          $msg="<span style='color:red'>Invalid Login Details</span>";
            }
          }
          ?>
        <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
          <?php if(isset($msg)){?>
          <tr>
            <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
          </tr>
          <?php } ?>
          <tr>
            <td colspan="2" align="left" valign="top">
              <h3>Login</h3>
            </td>
          </tr>
          <tr>
            <td align="right" valign="top">Username</td>
            <td><input name="Username" type="text" class="w3-input w3-border"></td>
          </tr>
          <tr>
            <td align="right">Password</td>
            <td><input name="Password" type="password" class="w3-input w3-border"></td>
          </tr>
          <tr>
            <td> </td>
            <td><input name="Submit" type="submit" value="Login" class="w3-button w3-blue"></td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>