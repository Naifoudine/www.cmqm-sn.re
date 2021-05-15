<?php
try {
  	$db_etb = new PDO('mysql:host=localhost;dbname=cartographie;charset=utf8mb4', 'admin', 'Cmqm&sn974');
  	$db_etb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  	$db_etb->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
  	} catch (PDOException $e) {
  	echo "Connection échouée : ". $e->getMessage();
  	}