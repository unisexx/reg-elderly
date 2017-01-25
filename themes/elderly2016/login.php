<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<title>ระบบทะเบียนข้อมูลคลังปัญญาผู้สูงอายุ</title>
<link rel="stylesheet" href="themes/elderly2016/css/bootstrap.min.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
<style>
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="themes/elderly2016/js/cufon/cufon-yui.js"></script>
<script type="text/javascript" src="themes/elderly2016/js/cufon/supermarket_400.font.js"></script>
<script type="text/javascript">
	Cufon.replace('h1, h2, h3, h4, #menu');
</script>


<div class="container">

<div class="text-center">
	<h2>ระบบทะเบียนข้อมูลคลังปัญญาผู้สูงอายุ</h2>
</div>

  <form class="form-signin" method="post" action="home/check_login">
    <h2 class="form-signin-heading">Login</h2>
    <label for="inputUsername" class="sr-only">Username</label>
    <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <!-- <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
  </form>

</div> <!-- /container -->