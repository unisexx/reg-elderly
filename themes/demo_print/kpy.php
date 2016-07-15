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
				include "modules/kpy/query.php";
			break;
			case 'print4':
				include "modules/kpy/print4.php";
			break;
			case 'print3':
				include "modules/kpy/print3.php";
			break;
			case 'print2':
				include "modules/kpy/print2.php";
			break;
			case 'print':
				include "modules/kpy/print.php";
			break;
			case 'form4':
				include "modules/kpy/form4.php";
			break;
			case 'form3':
				include "modules/kpy/form3.php";
			break;
			case 'form2':
				include "modules/kpy/form2.php";
			break;
			case 'form':
				include "modules/kpy/form.php";
			break;
			case 'list4':
				include "modules/kpy/list4.php";
			break;
			case 'list3':
				include "modules/kpy/list3.php";
			break;
			case 'list2':
				include "modules/kpy/list2.php";
			break;
			default :
				include "modules/kpy/list.php";
 		    break;
	}
?>

</div><!--page-->
<? include '_script_foot.php'?>
</body>
</html>