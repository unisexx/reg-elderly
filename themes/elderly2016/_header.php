<!-- Fixed navbar -->

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="color:#06C">Reg-elderly</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">บันทึกข้อมูล <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="home/projects">รายงานผลการดำเนินงานโครงการ (คปญ. ๒)</a></li>
                <li><a href="home/swots">ตารางวิเคราะห์ SWOT (คปญ. ๓)</a></li>
                <li><a href="home/plans">แผนการดำเนินงาน (คปญ. ๔)</a></li>
                </ul>
            </li>
          </ul>
           <ul class="nav navbar-nav">
          	<li><a href="home/histories">ประวัติคลังปัญญาผู้สูงอายุ (คปญ.๑)</a></li>
          </ul>	
          <?if(user_login()->is_admin == 1):?>
          <ul class="nav navbar-nav">
          	<li><a href="home/users">ผู้ใช้งาน</a></li>
          </ul>	
          <?endif;?>
          <ul class="nav navbar-nav">
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">รายงาน <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="home/report/report_1">รายชื่อผู้ขึ้นทะเบียน</a></li>
                <li><a href="home/report/report_2">จำนวนผู้ขึ้นทะเบียน</a></li>
                <li><a href="home/report/report_3">รายงานผล คปญ.</a></li>
                <li><a href="home/report/report_4">ผู้ขึ้นทะเบียนเสียชีวิต</a></li>
                </ul>
            </li>
          </ul>
          <?if(user_login()->is_admin == 1):?>
          <ul class="nav navbar-nav">
          	<li><a href="home/logs">Log file</a></li>
          </ul>	
          <?endif;?>
          
         <ul class="nav navbar-nav navbar-right">
          	<!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ตั้งค่า <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="user.php">ผู้ใช้งาน</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="purchase.php">รายการจัดซื้อ/จัดจ้าง</a></li>
                <li><a href="department.php">หน่วยงาน</a></li>
                <li><a href="group.php">กลุ่ม / ฝ่าย</a></li>
                <li><a href="utility.php">หน่วยงาน รายงานการใช้จ่ายสาธารณูปโภค</a></li>
                <li><a href="dep_province.php">หน่วยงาน [จังหวัด]</a></li>
              </ul>
            </li>-->
          <li><a href="home/users/form/<?=user_login()->id?>" class="vtip" title="<?=user_login()->name?> (จังหวัด<?=get_province_name(user_login()->province_id)?>)"><img src="themes/elderly2016/images/user.png" width="24" height="24" /></a></li>
            <li><a href="home/logout" style="color:#C30">Log out</a></li>
          </ul>
          
          <!--<ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li><a href="../navbar-static-top/">Static top</a></li>
            <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>
          </ul>-->
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="clear" style="margin-bottom:20px;"></div>

