<?php
$host_name = "localhost";
$db_user_id = "root";
$db_pwd = "password";
$db_name = "employees";
$db_port = 3306;

$connect = mysqli_connect($host_name, $db_user_id, $db_pwd, $db_name, $db_port);
/* check connection */
if ($connect->connect_error) {
  printf("Connect failed: %s\n", $connect->connect_error);
  exit();
} else {
  printf("Connection successful!");
  print('<br>');
  printf("client info: %s", mysqli_get_client_info());
  print('<br>');
  printf("host info: %s", mysqli_get_host_info($connect));
  print('<br>');
  printf("protocol version: %d", mysqli_get_proto_info($connect));
  print('<br>');
  printf("server version: %s", mysqli_get_server_info($connect));
}
?>