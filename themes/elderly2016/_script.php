<link rel="stylesheet" type="text/css" href="themes/elderly2016/css/template.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="media/js/validate/jquery.validate.min.js"></script>
<script type="text/javascript" src="themes/elderly2016/js/cufon/cufon-yui.js"></script>
<script type="text/javascript" src="themes/elderly2016/js/cufon/supermarket_400.font.js"></script>
<script type="text/javascript">
	Cufon.replace('h1, h2, h3, h4, #menu');

</script>

<!-- Colorbox jquery -->
<script src="themes/elderly2016/js/jquery.colorbox.js"></script>
<link media="screen" rel="stylesheet" href="themes/elderly2016/css/colorbox.css" />
<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".inline").colorbox({inline:true, width:"90%"});
				$(".inline2").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
</script>

<!-- Tooltip jquery -->
<script type="text/javascript" src="themes/elderly2016/js/vtip.js"></script>
<link rel="stylesheet" type="text/css" href="themes/elderly2016/css/vtip.css" />

<!-- number format -->
<script type="text/javascript" src="themes/elderly2016/js/jquery.number.js"></script>
<script type="text/javascript">
$(function(){
	$('input.numDecimal').number( true, 2 );
	$('input.numInt').number( true, 0 );
	
	$('input.numOnly').bind('keypress', function(e) {
    	return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
	});
});
</script>

<!-- Input format -->
<script type="text/javascript" src="themes/elderly2016/js/jquery.maskedinput.js"></script>
<script type="text/javascript">
jQuery(function($){
   $(".fdate").mask("99/99/9999");
   $(".fmobile").mask("(999) 999-9999");
   $(".fidcard").mask("9-9999-99999-99-9");
   $(".fnum").mask("999,999,999");
   $(".ftime").mask("99:99");
});
</script>


<!-- bootstrap CSS -->
<link rel="stylesheet" href="themes/elderly2016/css/bootstrap.min.css">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="themes/elderly2016/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="themes/elderly2016/css/navbar-fixed-top.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="themes/elderly2016/js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


<link rel="stylesheet" href="media/js/bootstrap-datepicker-thai-thai/css/datepicker.css" />
<script src="media/js/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker.js"></script>
<script src="media/js/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker-thai.js"></script>
<script src="media/js/bootstrap-datepicker-thai-thai/js/locales/bootstrap-datepicker.th.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$(".datepickerTH").datepicker({ autoclose: true });
	});
</script>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="themes/elderly2016/js/jquery.min.js"><\/script>')</script>
<script src="themes/elderly2016/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="themes/elderly2016/js/ie10-viewport-bug-workaround.js"></script>