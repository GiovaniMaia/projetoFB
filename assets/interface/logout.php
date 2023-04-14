<?php
session_start();
session_destroy();
header("Location: http://localhost/projetoFB/"); // substitua "index.php" pela página de login do seu site
?>
