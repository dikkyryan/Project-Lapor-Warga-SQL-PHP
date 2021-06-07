<?php
	$cnum = "COM3";
	$cbaud = 9600;
	$com = "\\.\COM3";
	if (isset($_POST["nyala"])){
		$cmd = 'a';
		if ($cmd == "a"){
			exec("mode " . $cnum . " BAUD=" . $cbaud . " PARITY=n DATA=8", $output);
			exec("echo a > " . $com);
			
			//print_r($output);
			echo"<script>alert('Pengumuman berhasil dikirim!');window.location='pengumuman.php';</script>";
		}
	} else if (isset($_POST["mati"])){
		$cmd = 'b';
		if ($cmd == "b"){
				exec("mode " . $cnum . " BAUD=" . $cbaud . " PARITY=n DATA=8", $output);
				exec("echo b > " . $com);
				
				echo"<script>alert('Pengumuman berhasil dihapus!');window.location='pengumuman.php';</script>";
			}
			}