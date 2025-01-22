<?php

$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include "connection.php";
    $gmail = $_POST['Mail'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM admin WHERE Gmail='$gmail' and Password='$pass'";

    $data = mysqli_query($conn, $query);
    if($data){
        $total = mysqli_num_rows($data);
        if($total > 0){
            $login = 1;
            session_start();
            $_SESSION['gmail'] = $gmail;
            header('location:frame.php');
            exit();
        } else{
            $invalid = 1;
        }
    }
}

error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
body{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 9rem;   
    margin-bottom: 9.95rem;
    background-image: linear-gradient(to top, #accbee 0%, #e7f0fd 100%);
    /* background-image: linear-gradient(45deg, #93a5cf 0%, #e4efe9 100%); */
    /* background-color: #accbee; */
    
}

.content {
  width: 330px;
  padding: 40px 30px;
  background: #dde1e7;
  border-radius: 10px;
  box-shadow: -3px -3px 7px #ffffff73,
               2px 2px 5px rgba(94,104,121,0.288);
}

.content .text {
  font-size: 33px;
  font-weight: 600;
  margin-bottom: 35px;
  color: #595959;
}

.field {
  height: 50px;
  width: 100%;
  display: flex;
  position: relative;
}

.field:nth-child(2) {
  margin-top: 20px;
}

.field .input {
  height: 100%;
  width: 100%;
  padding-left: 45px;
  outline: none;
  border: none;
  font-size: 18px;
  background: #dde1e7;
  color: #595959;
  border-radius: 25px;
  box-shadow: inset 2px 2px 5px #BABECC,
              inset -5px -5px 10px #ffffff73;
}

.field .input:focus {
  box-shadow: inset 1px 1px 2px #BABECC,
              inset -1px -1px 2px #ffffff73;
}

.field .span {
  position: absolute;
  color: #595959;
  width: 50px;
  line-height: 55px;
}

.field .label {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 45px;
  pointer-events: none;
  color: #666666;
}

.field .input:valid ~ label {
  opacity: 0;
}

.forgot-pass {
  text-align: left;
  margin: 10px 0 10px 5px;
}

.forgot-pass a {
  font-size: 16px;
  color: #666666;
  text-decoration: none;
}

.forgot-pass:hover a {
  text-decoration: underline;
}

.button {
  margin: 15px 0;
  width: 100%;
  height: 50px;
  font-size: 18px;
  line-height: 50px;
  font-weight: 600;
  background: #dde1e7;
  border-radius: 25px;
  border: none;
  outline: none;
  cursor: pointer;
  color: #595959;
  box-shadow: 2px 2px 5px #BABECC,
             -5px -5px 10px #ffffff73;
}

.button:focus {
  color: #3498db;
  box-shadow: inset 2px 2px 5px #BABECC,
             inset -5px -5px 10px #ffffff73;
}

.sign-up {
  margin: 10px 0;
  color: #595959;
  font-size: 16px;
}

.sign-up a {
  color: #3498db;
  text-decoration: none;
}

.sign-up a:hover {
  text-decoration: underline;
}
    </style>
</head>

<body>

<?php

if($login){
    echo '<strong> Success </strong> You are successfully logged in';
}

if ($invalid) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" onclick="return checkDelete()">
            <strong>Error.</strong> Invalid Credentials.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}

?>
    
<div class="content">
         <div class="text">
            Admin Login
         </div>
         <form action="university-admin.php" method="POST">
            <div class="field">
               <input required="" type="text" class="input" name="Mail" required>
               <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path class="" data-original="#000000" fill="#595959" d="M256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135S330.439 0 256 0zM423.966 358.195C387.006 320.667 338.009 300 286 300h-60c-52.008 0-101.006 20.667-137.966 58.195C51.255 395.539 31 444.833 31 497c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15 0-52.167-20.255-101.461-57.034-138.805z"></path></g></svg></span>
               <label class="label">Gmail</label>
            </div>
            <div class="field">
               <input required="" type="password" class="input" name="password" required>
               <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path class="" data-original="#000000" fill="#595959" d="M336 192h-16v-64C320 57.406 262.594 0 192 0S64 57.406 64 128v64H48c-26.453 0-48 21.523-48 48v224c0 26.477 21.547 48 48 48h288c26.453 0 48-21.523 48-48V240c0-26.477-21.547-48-48-48zm-229.332-64c0-47.063 38.27-85.332 85.332-85.332s85.332 38.27 85.332 85.332v64H106.668zm0 0"></path></g></svg></span>
               <label class="label">Password</label>
            </div>
            <div class="forgot-pass">
               <a href="#">Forgot Password?</a>
            </div>
            <button class="button" type="submit" name="submit">Sign in</button>
            
         </form>
      </div>

</body>
</html>