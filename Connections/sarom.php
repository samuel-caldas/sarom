<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_sarom = "localhost";
$database_sarom = "floresde_sarom";
$username_sarom = "floresde_sarom";
$password_sarom = "sabedoria";
$sarom = mysql_pconnect($hostname_sarom, $username_sarom, $password_sarom) or trigger_error(mysql_error(),E_USER_ERROR); 
?>