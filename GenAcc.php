<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
//$q = intval($_GET['q']);
$username = @$_GET['u']; 
$password = @$_GET['p']; 
$paimon = @$_GET['c']; 

echo "<table>
<tr>
<th>NO</th>
<th>ACCOUNT ID</th>
<th>USERNAME</th>
<th>PASSWORD</th>
<th>COUNTRY</th>
<th>SAFE LEVEL</th>
<th>WEBLOGIN TOKEN</th>
<th>MESSAGE</th>
<th>STATUS</th>
</tr><br />";
for ($i = 1; $i <= $paimon; $i++) {

   $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://webapi-os.account.mihoyo.com/Api/regist_by_account");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "is_crypto=false&not_login=0&username=".$username."".$i."&password=".$password."".$i);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
  $json = json_decode($server_output, true);
  if ($json['data']['status'] == -404) {
    echo $json['data']['info']."<br />";
    }elseif ($json['code'] == 204) {
    echo $username."".$i." - ENGLISH: ".$json['data']['msg']." / INDO: Nama akun sudah ada!<br />";
    }elseif ($json['code'] == 200) {

    
    echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".@$json['data']['account_info']['account_id']."</td>";
  echo "<td>".$username."".$i."</td>";
  echo "<td>".$password."</td>";
  echo "<td>".@$json['data']['account_info']['country']."</td>";
  echo "<td>".@$json['data']['account_info']['safe_level']."</td>";
  echo "<td>".@$json['data']['account_info']['weblogin_token']."</td>";
  echo "<td>".$json['data']['msg']."</td>";
  echo "<td>".$json['data']['status']."</td>";
  echo "</tr>";
    }
}
echo "</table>";
curl_close ($ch);
?>
</body>
</html>
