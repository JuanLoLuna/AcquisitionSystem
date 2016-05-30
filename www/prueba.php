<html>

<head>
<title>Data Acquisition System</title>
</head>

<body>
<h1 style="font-family:helvetica">Data Aquisition System </h1>

<p style="font-family:helvetica">
<a href="prueba.php?op=1">Configure the data acquisition system</a>
<br>
<a href="prueba.php?op=2">RAM pool size</a>
<br>
<a href="prueba.php?op=3">Run</a>
<br>
<a href="prueba.php?op=4">Export data</a>
</p>

<?php
switch ($_GET['op']) {
	case 1: echo "Setting up the Acquisition System";
		$output = shell_exec('./php_root2');
		echo "<pre>$output</pre>";
		break;
	case 2:
		echo "Setting up RAM pool size";
		$output = shell_exec('./RAMConfiguration');
		echo "<pre>$output</pre>";
		break;
	case 3:
		echo "Sampling data";
		$output = shell_exec('./php_root');
		echo "<pre>$output</pre>";
		break;
	case 4:
		echo "Export sampled data";
//		readfile('/usr/share/nginx/www/Prueba01.dat');
		echo "<br />";
//		header('Content-Type: text/cvs; charset=utf-8');
//		header('Content-Disposition: attachment; filename=data.csv');

		$handle = fopen("/usr/share/nginx/www/Prueba01.dat","r");
		while($i<10000){
			echo fgets($handle)."<br />";
			$i=$i+1;
		}
		fclose($handle);
		break;
}
?>

</body>
</html>
