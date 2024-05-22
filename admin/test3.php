<?php
echo "you have successfully logged-in";
exit;
$cookieName = "user";
$cookieValue = "Sanotsh";

setcookie($cookieName, time()-3600);

echo "cookie is deleted";
"<br>";

// if(!isset($_COOKIE[$cookieName])) 
// {
// / echo "Cookie named" ."<br>". $cookieName ."<br>" ."is not set!";
// } 
// else 
// {
// / echo "Cookie" ." ". $cookieName ." ". "is set!<br>";
// / echo  $_COOKIE[$cookieName];
// }
?>

<?php
setcookie("test_cookie", "test", time() -3600, '/');

if(count($_COOKIE) > 0) {
  echo "Cookies are enabled.";
} else {
  echo "Cookies are disabled.";
}
?>