<?php

define("DBHOST", "localhost");
define("DBUSER", "rum44");
define("DBPASS", "QqQq123QqQq");
define("DB", "rum44_apple");

$connection = @mysqli_connect(DBHOST, DBUSER, DBPASS, DB) or die("Нет соединения с БД");
mysqli_set_charset($connection, "utf8") or die("Не установлена кодировка соединения");