<?php
require_once("conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Basic Chart</title>
</head>
<body>
    
<?php
$pc = new C_PhpChartX(array(array(14, 1, 5, 12, 14)),'basic_chart');
$pc->set_title(array('text'=>'Cable Crossover'));
$pc->draw();
?>

</body>
</html>