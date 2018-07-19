<?php if(isset($_GET['view_source'])) return highlight_file(__FILE__); ?>
<html>
<head>
<style>
#flag-box {
  display: flex;
  background-color: #001337;
  width: 40em;
  height: 40em;
  justify-content:center;
}
#flag {
  color: white;
  display: flex;
  flex-direction: column;
  justify-content:center;
  font-weight: bold;
}
body {
  display: flex;
  flex-direction: column;
  justify-content:center;
}
</style>
</head>
<body>
<h1>Bettcha can't guess my 1mp0s5ibl3 password</h1>
<form method="POST">
  <input type="textfield" name="user" placeholder="user">
  <input type="password"  name="password" placeholder=password>
  <input type="submit" value="submit">
</form>

<a href="./?view_source=1">view source</a>

<div id="flag-box">
<div id="flag">
<?php
function super_rand($n_bytes) {
  $urand = fopen('/dev/urandom','r');
  $bs = fread($urand, $n_bytes);
  fclose($urand);
  return $bs;
}
if (isset($_REQUEST['user']) && isset($_REQUEST['password'])) {
  $ps = super_rand(32);
  if ($_REQUEST['user'] == 'admin' && strcmp($_REQUEST['password'], $ps) == 0) {
    passthru('cat flag');
  } else {
    $taunts = [
      'not even close',
      'are you even trying?',
      'you think i would have <b>that</b> password',
      'what kind of a person do you think i am?',
      'wow',
      'i hope thats not <b>your</b> password',
    ];
    print $taunts[array_rand($taunts)];
  }
}
?>
</div>
</div>
</body>
</html>
