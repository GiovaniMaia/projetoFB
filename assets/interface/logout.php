<?php
session_start();
session_destroy();
header("Location: http://localhost/fazendaBerrante/assets/login/view.php"); // substitua "index.php" pela página de login do seu site
?>
