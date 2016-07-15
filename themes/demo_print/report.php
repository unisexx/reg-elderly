<? include "include/config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
<? include '_meta.php'?>
<? include '_script.php'?>
</head>

<body>
<? include '_header.php'?>
<div id="page">


<? switch(@$_GET['act'])
	{
			case 'query':
				include "modules/report/query.php";
			break;
			case 'r1':
				include "modules/report/r1.php";
			break;
			case 'r2':
				include "modules/report/r2.php";
			break;
			default :
				include "modules/report/list.php";
 		    break;
	}
?>

</div><!--page-->
<? include '_script_foot.php'?>
</body>
</html>