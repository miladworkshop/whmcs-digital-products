<?php
if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

function whmcs_digital_products_config() {
    $configarray = array(
        "name" 				=> "فروش محصولات دیجیتال",
        "description" 		=> "فروش محصولات دیجیتال مانند شماره سریال, کارت شارژ, اکانت و ...",
        "version" 			=> "1.1",
        "author" 			=> "<a href='http://miladworkshop.ir' target='_blank' style='color:#0000FF'>میلاد مالدار</a>",
		"language" 			=> "english",
);
    return $configarray;
}

function whmcs_digital_products_activate() {
	$query_01 = "CREATE TABLE `mod_whmcs_digital_cats` (
	  `id` int(255) NOT NULL AUTO_INCREMENT,
	  `name` varchar(255) COLLATE utf8mb4_persian_ci DEFAULT NULL,
	  `message` text COLLATE utf8mb4_persian_ci,
	  `field_name_01` varchar(255) COLLATE utf8mb4_persian_ci DEFAULT NULL,
	  `field_name_02` varchar(255) COLLATE utf8mb4_persian_ci DEFAULT NULL,
	  `field_name_03` varchar(255) COLLATE utf8mb4_persian_ci DEFAULT NULL,
	  `field_name_04` varchar(255) COLLATE utf8mb4_persian_ci DEFAULT NULL,
	  KEY `id` (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;";
    $result = full_query($query_01);
	
	$query_02 = "CREATE TABLE `mod_whmcs_digital_products` (
	  `id` int(255) NOT NULL AUTO_INCREMENT,
	  `cat` int(255) DEFAULT '0',
	  `field_01` varchar(255) COLLATE utf8mb4_persian_ci DEFAULT NULL,
	  `field_02` varchar(255) COLLATE utf8mb4_persian_ci DEFAULT NULL,
	  `field_03` varchar(255) COLLATE utf8mb4_persian_ci DEFAULT NULL,
	  `field_04` varchar(255) COLLATE utf8mb4_persian_ci DEFAULT NULL,
	  `create_date` int(11) DEFAULT '0',
	  `sale` int(11) DEFAULT '0',
	  `sale_date` int(255) DEFAULT '0',
	  `pid` int(255) DEFAULT '0',
	  KEY `id` (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;";
    $result = full_query($query_02);
	
	$query_03 = "DELETE FROM `tblemailtemplates` WHERE `name` = 'DigitalProducts'";
    $result = full_query($query_03);

	$query_04 = "aW5zZXJ0IGludG8gYHRibGVtYWlsdGVtcGxhdGVzYCAoYHR5cGVgLCBgbmFtZWAsIGBzdWJqZWN0YCwgYG1lc3NhZ2VgLCBgYXR0YWNobWVudHNgLCBgZnJvbW5hbWVgLCBgZnJvbWVtYWlsYCwgYGRpc2FibGVkYCwgYGN1c3RvbWAsIGBsYW5ndWFnZWAsIGBjb3B5dG9gLCBgcGxhaW50ZXh0YCwgYGNyZWF0ZWRfYXRgLCBgdXBkYXRlZF9hdGApIHZhbHVlcygncHJvZHVjdCcsJ0RpZ2l0YWxQcm9kdWN0cycsJ9in2LfZhNin2LnYp9iqINmF2K3YtdmI2YQgLyDYp9qp2KfZhtiqINiu2LHbjNiv2KfYsduMINi02K/ZhycsJzxwPtio2Kcg2LPZhNin2YU8L3A+XHJcbjxwPtin2LfZhNin2LnYp9iqINmF2K3YtdmI2YQgLyDYp9qp2KfZhtiqINiu2LHbjNiv2KfYsduMINi02K/ZhyDYtNmF2Kog2KjZhyDYtNix2K0g2LLbjNixINmF24zYqNin2LTYrzwvcD5cclxuPGJyIC8+XHJcbjxwPntpZiAhZW1wdHkoJGZpZWxkX25hbWVfMDEpfXskZmllbGRfbmFtZV8wMX06IHskZmllbGRfMDF9ey9pZn08L3A+XHJcbjxwPntpZiAhZW1wdHkoJGZpZWxkX25hbWVfMDIpfXskZmllbGRfbmFtZV8wMn06IHskZmllbGRfMDJ9ey9pZn08L3A+XHJcbjxwPntpZiAhZW1wdHkoJGZpZWxkX25hbWVfMDMpfXskZmllbGRfbmFtZV8wM306IHskZmllbGRfMDN9ey9pZn08L3A+XHJcbjxwPntpZiAhZW1wdHkoJGZpZWxkX25hbWVfMDQpfXskZmllbGRfbmFtZV8wNH06IHskZmllbGRfMDR9ey9pZn08L3A+XHJcbjxiciAvPlxyXG48cD57JG1lc3NhZ2V9PC9wPlxyXG48YnIgLz4gPGJyIC8+XHJcbjxwPtmH2YXahtmG24zZhiDYp9iyINi32LHbjNmCINmE24zZhtqpINiy24zYsSDZhduM2KrZiNin2YbbjNivINiv2LEg2b7ZhtmEINqp2KfYsdio2LHbjCDYrtmI2K8g2KfYt9mE2KfYudin2Kog2YXYrdi12YjZhCAvINin2qnYp9mG2Kog2K7YsduM2K/Yp9ix24wg2LTYr9mHINix2Kcg2YXYtNin2YfYr9mHINqp2YbbjNivIDo8L3A+XHJcbjxwPjxhIGhyZWY9XCJ7JHdobWNzX3VybH0vY2xpZW50YXJlYS5waHA/YWN0aW9uPXByb2R1Y3RkZXRhaWxzJmFtcDtpZD17JHNlcnZpY2VfaWR9XCI+eyR3aG1jc191cmx9L2NsaWVudGFyZWEucGhwP2FjdGlvbj1wcm9kdWN0ZGV0YWlscyZhbXA7aWQ9eyRzZXJ2aWNlX2lkfTwvYT48L3A+JywnJywnJywnJywnMCcsJzEnLCcnLCcnLCcwJywnMjAxNy0wMi0xMCAyMjowOTo0NScsJzIwMTctMDItMTAgMjI6MTA6MjEnKQ==";
    $result = full_query(base64_decode($query_04));

    return array('status' => 'success', 'description' => 'فروش محصولات دیجیتال با موفقیت فعال شد');
}

function whmcs_digital_products_deactivate()
{
	
		$query_01 = "DROP TABLE `mod_whmcs_digital_cats`";
		$result = full_query($query_01);
		
		$query_02 = "DROP TABLE `mod_whmcs_digital_products`";
		$result = full_query($query_02);
	

    return array('status' => 'success', 'description' => 'فروش محصولات دیجیتال غیر فعال شد');
}

function whmcs_digital_products_output($vars) {

	if (isset($_GET['do']) && $_GET['do'] == "optimize")
	{
		
		$optimize_nocat_select 		= mysql_query("SELECT * FROM `mod_whmcs_digital_products` WHERE `cat` = 0 AND `sale` = 0");
		$optimize_empty_select_01 	= mysql_query("SELECT * FROM `mod_whmcs_digital_products` WHERE `field_01` IS NULL AND  `field_02` IS NULL AND  `field_03` IS NULL AND  `field_04` IS NULL AND `sale` = 0");
		$optimize_empty_select_02 	= mysql_query("SELECT * FROM `mod_whmcs_digital_products` WHERE `field_01` = '(NULL)' AND `field_02` = '(NULL)' AND `field_03` = '(NULL)' AND `field_04` = '(NULL)' AND `sale` = 0");
		$optimize_empty_select_03 	= mysql_query("SELECT * FROM `mod_whmcs_digital_products` WHERE `field_01` = null AND `field_02` = null AND `field_03` = null AND `field_04` = null AND `sale` = 0");

		$optimize_nocat 			= mysql_query("DELETE FROM `mod_whmcs_digital_products` WHERE `cat` = 0 AND `sale` = 0");
		$optimize_empty_01 			= mysql_query("DELETE FROM `mod_whmcs_digital_products` WHERE `field_01` IS NULL AND  `field_02` IS NULL AND  `field_03` IS NULL AND  `field_04` IS NULL AND `sale` = 0");
		$optimize_empty_02 			= mysql_query("DELETE FROM `mod_whmcs_digital_products` WHERE `field_01` = '(NULL)' AND `field_02` = '(NULL)' AND `field_03` = '(NULL)' AND `field_04` = '(NULL)' AND `sale` = 0");
		$optimize_empty_03 			= mysql_query("DELETE FROM `mod_whmcs_digital_products` WHERE `field_01` = null AND `field_02` = null AND `field_03` = null AND `field_04` = null AND `sale` = 0");

		$optimize_empty_num 		= 0 + mysql_num_rows($optimize_empty_select_01) + mysql_num_rows($optimize_empty_select_02) + mysql_num_rows($optimize_empty_select_03);
		$optimize_nocat_num 		= 0 + mysql_num_rows($optimize_nocat_select);
		$optimize_total 			= 0 + $optimize_empty_num + $optimize_nocat_num;
		
		$message = "<div class='alert alert-success'>بهینه سازی پایگاه داده با موفقیت انجام شد. ". $optimize_total ." محصول شامل ". $optimize_empty_num ." محصول فاقد محتوا و ". $optimize_nocat_num ." محصول فاقد دسته بندی حذف شد</div>";
	}
	
	if (isset($_GET['cr']) && $_GET['cr'] > 0)
	{
		$cr = $_GET['cr'];
		
		$cat_remove_check = mysql_query("SELECT * FROM `mod_whmcs_digital_products` WHERE `cat` = $cr");
		
		if (mysql_num_rows($cat_remove_check) > 0)
		{
			$message = "<div class='alert alert-danger'>این دسته دارای ". mysql_num_rows($cat_remove_check) ." محصول می باشد, امکان حذف دسته هایی که شامل محصول هستند فراهم نیست</div>";
		} else {
			mysql_query("DELETE FROM `mod_whmcs_digital_cats` WHERE `id` = $cr");

			$message = "<div class='alert alert-success'>محصول مورد نظر با موفقیت حذف شد</div>";
		}
	}
	
	if (isset($_GET['pr']) && $_GET['pr'] > 0)
	{
		$pr = $_GET['pr'];

		mysql_query("DELETE FROM `mod_whmcs_digital_products` WHERE `id` = $pr");

		$message = "<div class='alert alert-success'>محصول مورد نظر با موفقیت حذف شد</div>";
	}

	if ($_POST['do'] == 'create_cat')
	{
		$name 			= $_POST['name'];
		$field_name_01 	= $_POST['field_name_01'];
		$field_name_02 	= $_POST['field_name_02'];
		$field_name_03 	= $_POST['field_name_03'];
		$field_name_04 	= $_POST['field_name_04'];
		$message 		= $_POST['message'];

		if (empty($name))
		{
			$message = "<div class='alert alert-danger'>وارد کردن نام نمایشی الزامیست</div>";
		} else {
			$create_cat_sql = "insert into `mod_whmcs_digital_cats` (`name`, `message`, `field_name_01`, `field_name_02`, `field_name_03`, `field_name_04`) values('{$name}','{$message}','{$field_name_01}','{$field_name_02}','{$field_name_03}','{$field_name_04}')";
			
			if (mysql_query($create_cat_sql) === TRUE)
			{
				$message = "<div class='alert alert-success'>دسته مورد نظر با موفقیت ایجاد شد</div>";
			} else {
				$message = "<div class='alert alert-danger'>خطا در ایجاد دسته</div>";
			}
		}
	}

	if ($_POST['do'] == 'create_product')
	{
		$cat 			= $_POST['cat'];
		$field_01 		= $_POST['field_01'];
		$field_02 		= $_POST['field_02'];
		$field_03 		= $_POST['field_03'];
		$field_04 		= $_POST['field_04'];
		$create_time 	= time();

		if (empty($cat))
		{
			$message = "<div class='alert alert-danger'>دسته محصول را انتخاب کنید</div>";
		} else {
		$create_product_sql = "insert into `mod_whmcs_digital_products` (`cat`, `field_01`, `field_02`, `field_03`, `field_04`, `create_date`, `sale`, `sale_date`, `pid`) values('{$cat}','{$field_01}','{$field_02}','{$field_03}','{$field_04}','{$create_time}','0','0','0')";
			
			if (mysql_query($create_product_sql) === TRUE)
			{
				$message = "<div class='alert alert-success'>محصول مورد نظر با موفقیت افزوده شد</div>";
			} else {
				$message = "<div class='alert alert-danger'>خطا در ایجاد محصول</div>";
			}
		}
	}

	if ($_POST['do'] == 'upload_product')
	{
		$cat 			= $_POST['cat'];
		$separator 		= $_POST['separator'];
		$create_time 	= time();
		
		$fp      		= fopen($_FILES['file']['tmp_name'], 'r');
		$content 		= fread($fp, filesize($_FILES['file']['tmp_name']));
		$lines 			= split("\n", $content);
		
		if (empty($cat))
		{
			$message = "<div class='alert alert-danger'>دسته محصول را انتخاب کنید</div>";
		} else {

			foreach($lines as $line)
			{
				$splited 	= split($separator, $line);
				$field_01	= trim($splited[0]);
				$field_02	= trim($splited[1]);
				$field_03	= trim($splited[2]);
				$field_04	= trim($splited[3]);

				mysql_query("insert into `mod_whmcs_digital_products` (`cat`, `field_01`, `field_02`, `field_03`, `field_04`, `create_date`, `sale`, `sale_date`, `pid`) values('{$cat}','{$field_01}','{$field_02}','{$field_03}','{$field_04}','{$create_time}','0','0','0')");
				
				$uploadPlus++;
			}
			
			$message = "<div class='alert alert-success'>{$uploadPlus} محصول در درسته انتخاب شده ایمپورت شد</div>";

		}
	}

	if ($_POST['do'] == 'paste_product')
	{
		$cat 			= $_POST['cat'];
		$paste 			= $_POST['paste'];
		$separator 		= $_POST['separator'];
		$create_time 	= time();

		$lines 			= split("\n", $paste);
		
		if (empty($cat))
		{
			$message = "<div class='alert alert-danger'>دسته محصول را انتخاب کنید</div>";
		} else {

			foreach($lines as $line)
			{
				$splited 	= split($separator, $line);
				$field_01	= trim($splited[0]);
				$field_02	= trim($splited[1]);
				$field_03	= trim($splited[2]);
				$field_04	= trim($splited[3]);

				mysql_query("insert into `mod_whmcs_digital_products` (`cat`, `field_01`, `field_02`, `field_03`, `field_04`, `create_date`, `sale`, `sale_date`, `pid`) values('{$cat}','{$field_01}','{$field_02}','{$field_03}','{$field_04}','{$create_time}','0','0','0')");
				
				$uploadPlus++;
			}
			
			$message = "<div class='alert alert-success'>{$uploadPlus} محصول در درسته انتخاب شده ایمپورت شد</div>";

		}
	}

	echo $message .'
	<ul class="nav nav-tabs" id="myTab" style="font-size:13px;">
	   <li class="active"><a data-toggle="tab" href="#dashboard">داشبورد</a></li>
	   <li><a data-toggle="tab" href="#category">مدیریت دسته ها</a></li>
	   <li><a data-toggle="tab" href="#create">ایجاد دسته جدید</a></li>
	   <li><a data-toggle="tab" href="#products">مدیریت محصولات</a></li>
	   <li><a data-toggle="tab" href="#new">ایجاد محصول جدید</a></li>
	   <li><a data-toggle="tab" href="#import">ایمپورت محصولات از طریق فایل</a></li>
	   <li><a data-toggle="tab" href="#paste">ایمپورت محصولات از طریق Copy / Paste</a></li>
	</ul>

	<div class="tab-content" style="padding-top:10px;">
		<div id="dashboard" class="tab-pane fade in active">
			<div class="col-lg-5">
				<table class="table table-bordered table-striped">
					<tbody>
						<tr>
							<td width="80%">تعداد دسته های ایجاد شده</td>
							<td width="20%"><center>'. mysql_num_rows(mysql_query('SELECT * FROM `mod_whmcs_digital_cats`')) .'</center></td>
						</tr>
						<tr>
							<td width="80%">تعداد کل محصولات دیجیتال</td>
							<td width="20%"><center>'. mysql_num_rows(mysql_query('SELECT * FROM `mod_whmcs_digital_products`')) .'</center></td>
						</tr>
						<tr>
							<td width="80%">تعداد محصولات دیجیتال فروخته شده</td>
							<td width="20%"><center>'. mysql_num_rows(mysql_query('SELECT * FROM `mod_whmcs_digital_products` WHERE `sale` = 1')) .'</center></td>
						</tr>
						<tr>
							<td width="80%">تعداد محصولات دیجیتال باقی مانده و قابل فروش</td>
							<td width="20%"><center>'. mysql_num_rows(mysql_query('SELECT * FROM `mod_whmcs_digital_products` WHERE `sale` = 0')) .'</center></td>
						</tr>
						<tr>
							<td width="80%">آخرین نسخه منتشر شده</td>
							<td width="20%"><center><a href="https://miladworkshop.ir/blog/whmcs-digital-products" target="_blank" style="color:#0000FF">'. file_get_contents("https://miladworkshop.ir/blog/whmcs-digital-products") .'</a></center></td>
						</tr>
						<tr>
							<td width="80%">نسخه افزونه نصب شده فروش محصولات دیجیتال</td>
							<td width="20%"><center>'. $whmcs_dp_version .'</center></td>
						</tr>
					</tbody>
				</table>
			</div>
			
			<div class="col-lg-7" style="background:#F7F7F7; padding:10px; line-height:190%;">
				<div class="col-lg-5">
					<p style="text-align: justify;">ماژول پیشرفته فروش محصولات دیجیتال WHMCS این امکان را به شما می دهد تا از طریق WHMCS اقدام به فروش محصولات دیجیتال مانند کارت شارژ, شماره سریال, کد لایسنس, اکانت های مختلف و ... نمایید</p>
				</div>
				
				<div class="col-lg-7">
					<a class="btn btn-warning btn-block" href="https://miladworkshop.ir/blog/whmcs-digital-products" role="button" target="_blank">نمایش سایت برنامه نویس این افزونه</a>
					<a class="btn btn-danger  btn-block" href="https://miladworkshop.ir/blog/whmcs-digital-products" role="button" target="_blank">نمایش انجمن پرسش و پاسخ این افزونه</a>
					<a class="btn btn-primary btn-block" href="https://miladworkshop.ir/blog/whmcs-digital-products" role="button" target="_blank">نمایش صفحه افزونه در فروشگاه زیپ مارکت</a>
					<a class="btn btn-success btn-block" href="https://miladworkshop.ir/blog/whmcs-digital-products" role="button" target="_blank">ارسال درخواست پشتیبانی در خصوص این محصول</a>
					<a class="btn btn-default btn-block btn-lg" style="font-size:14px;" href="addonmodules.php?module=whmcs_digital_products&do=optimize" role="button">بهینه سازی پایگاه داده و حذف محصولات فاقد محتوا</a>
				</div>	

			</div>
			
			<div class="col-lg-12" style="line-height:200%; text-align: justify;">
				<hr />
				آموزش و نحوه استفاده :
				<br /><br />ابتدا وارد بخش " ایجاد دسته جدید " شده و یک دسته با عنوان فیلدهای مورد نیاز خود ایجاد کنید.
				<br />سپس وارد یکی از بخش های " ایجاد محصول جدید " یا " ایمپورت محصولات از طریق فایل " یا " ایمپورت محصولات از طریق Copy / Paste " شده و محصولات دیجیتال خود را ایجاد / ایمپورت کنید.
				<br />سپس وارد بخش محصولات / خدمات WHMCS شده و یک محصول جدید ایجاد کنید, تنظیمات مربوط به قیمت و ... را طبق روال انجام دهید, وارد تب " تنظیمات ماژول " شده و ماژول " Digitalproducts " را انتخاب کنید و در نهایت پس از انتخاب ماژول کافیست در بخش " دسته محصول دیجیتال " دسته مورد نظر را انتخاب کرده و محصول را ذخیره کنید.
			</div>	
			
		</div>
	
		<div id="category" class="tab-pane fade in">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td width="5%"><center><b>#</b></center></td>
						<td width="23%"><center><b>نام دسته</b></center></td>
						<td width="10%"><center><b>فیلد 1</b></center></td>
						<td width="10%"><center><b>فیلد 2</b></center></td>
						<td width="10%"><center><b>فیلد 3</b></center></td>
						<td width="10%"><center><b>فیلد 4</b></center></td>
						<td width="10%"><center><b>تعداد محصولات</b></center></td>
						<td width="10%"><center><b>فروخته شده</b></center></td>
						<td width="8%"><center><b>باقی مانده</b></center></td>
						<td width="5%"><center><b>مدیریت</b></center></td>
					</tr>';
					
					$categorys = mysql_query('SELECT * FROM `mod_whmcs_digital_cats` ORDER BY `id` DESC');
					while ($category = mysql_fetch_array($categorys))
					{
						$categoryPlus++;
						
						echo '<tr>
							<td><center>'. $categoryPlus .'</center></td>
							<td><a href="javascript:void(0)" style="color:#0094FF;">'. $category["name"] .'</a></td>
							<td><center>'. $category["field_name_01"] .'</center></td>
							<td><center>'. $category["field_name_02"] .'</center></td>
							<td><center>'. $category["field_name_03"] .'</center></td>
							<td><center>'. $category["field_name_04"] .'</center></td>
							<td><center>'. mysql_num_rows(mysql_query("SELECT * FROM `mod_whmcs_digital_products` WHERE `cat` = '$category[id]'")) .'</center></td>
							<td><center>'. mysql_num_rows(mysql_query("SELECT * FROM `mod_whmcs_digital_products` WHERE `cat` = '$category[id]' AND `sale` = 1")) .'</center></td>
							<td><center>'. mysql_num_rows(mysql_query("SELECT * FROM `mod_whmcs_digital_products` WHERE `cat` = '$category[id]' AND `sale` = 0")) .'</center></td>
							<td><center><a href="addonmodules.php?module=whmcs_digital_products&cr='. $category["id"] .'" style="color:#FF0000">حذف</a></center></td>
						</tr>';
					}
					
				echo '</tbody>
			</table>
		</div>
			
		<div id="create" class="tab-pane fade in">
			<form method="post" action="">
				<input type="hidden" name="do" value="create_cat" />
				<div class="form-group">
					<label for="name">نام نمایشی دسته</label>
					<input type="text" class="form-control" id="name" name="name" tabindex="1">
					<p class="help-block" style="font-size:12px;">این نام به مشتری نمایش داده نمیشود و فقط در مدیریت نمایش داده میشود</p>
				</div>

				<table border="0" style="width:100%">
					<tbody>
						<tr>
							<td style="padding-left:5px;">
								<div class="form-group">
									<label for="field_name_01">عنوان فیلد 1</label>
									<input type="text" class="form-control" id="field_name_01" name="field_name_01" tabindex="2">
									<p class="help-block" style="font-size:12px;">عنوان نمایشی فیلد را وارد کنید, به عنوان مثال : رمز شارژ, پین کد, نام کاربری, کلمه عبور و ...</p>
								</div>
								<div class="form-group">
									<label for="field_name_03">عنوان فیلد 3</label>
									<input type="text" class="form-control" id="field_name_03" name="field_name_03" tabindex="4">
									<p class="help-block" style="font-size:12px;">عنوان نمایشی فیلد را وارد کنید, به عنوان مثال : رمز شارژ, پین کد, نام کاربری, کلمه عبور و ...</p>
								</div>
							</td>
							<td style="padding-right:5px;">
								<div class="form-group">
									<label for="field_name_02">عنوان فیلد 2</label>
									<input type="text" class="form-control" id="field_name_02" name="field_name_02" tabindex="3">
									<p class="help-block" style="font-size:12px;">عنوان نمایشی فیلد را وارد کنید, به عنوان مثال : رمز شارژ, پین کد, نام کاربری, کلمه عبور و ...</p>
								</div>
								<div class="form-group">
									<label for="field_name_04">عنوان فیلد 4</label>
									<input type="text" class="form-control" id="field_name_04" name="field_name_04" tabindex="5">
									<p class="help-block" style="font-size:12px;">عنوان نمایشی فیلد را وارد کنید, به عنوان مثال : رمز شارژ, پین کد, نام کاربری, کلمه عبور و ...</p>
								</div>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="form-group">
					<label for="message">توضیحات دلخواه</label>
					<textarea class="form-control" rows="5" id="message" name="message" tabindex="6"></textarea>
					<p class="help-block" style="font-size:12px;">در این بخش میتوانید متن راهنما و توضیحات دلخواه را وارد کنید, این متن در صفحه نمایش مشخصات محصول و ایمیل اطلاعات سرویس نمایش داده میشود</p>
				</div>

				<button type="submit" class="btn btn-success">ثبت و ایجاد دسته</button>
			</form>
		</div>
		
		<div id="products" class="tab-pane fade in">
			<div class="table-responsive">';
				
				if (mysql_num_rows(mysql_query('SELECT * FROM `mod_whmcs_digital_products`')) > 100) {
					echo '<div class="alert alert-info">توجه داشته باشید تعداد کل محصولات <b>'. mysql_num_rows(mysql_query('SELECT * FROM `mod_whmcs_digital_products`')) .'</b> محصول می باشد, اما در این بخش تنها 100 محصول آخر نمایش داده میشود</div>';
				}
				
				echo '<table class="table table-bordered">
					<tbody>
						<tr>
							<td><center><b>#</b></center></td>
							<td><center><b>دسته</b></center></td>
							<td><center><b>فیلد 1</b></center></td>
							<td><center><b>فیلد 2</b></center></td>
							<td><center><b>فیلد 3</b></center></td>
							<td><center><b>فیلد 4</b></center></td>
							<td><center><b>تاریخ ایجاد</b></center></td>
							<td><center><b>فروخته شده</b></center></td>
							<td><center><b>تاریخ فروش</b></center></td>
							<td><center><b>کد سفارش</b></center></td>
							<td><center><b>مدیریت</b></center></td>
						</tr>';
						
						$products = mysql_query('SELECT * FROM `mod_whmcs_digital_products` ORDER BY `id` DESC LIMIT 100');
						while ($product = mysql_fetch_array($products))
						{
							$productPlus++;
							
							$categorys 	= mysql_query("SELECT * FROM `mod_whmcs_digital_cats` WHERE `id` = {$product[cat]}");
							$category 	= mysql_fetch_array($categorys);
							
							if ($product["create_date"] > 0)
							{
								$create_date = gmdate("Y/m/d", $product["create_date"]);
							} else {
								$create_date = "---";
							}
							
							if ($product["sale_date"] > 0)
							{
								$sale_date = gmdate("Y/m/d", $product["sale_date"]);
							} else {
								$sale_date = "---";
							}
							
							if ($product["sale"] == 1)
							{
								$sale = "<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAZdEVYdFNvZnR3YXJlAHBhaW50Lm5ldCA0LjAuMTM0A1t6AAABC0lEQVQ4T5WRsStFYRjGfylRMhis/gBWWSxkUhb/gU0xsgi971GSJOlOMjL6K+w2C4uSxWZT4rrvuedx+s69bvecXz19fc/zPm+d79CYS8ZwWhhrchrinId+pQu5NTGWovSTLHhSUoNTJqPwUpaNNhnLSmvgXJflQi0lNchYjUI7KT+zw4TSIZwwFYW3pPwdCxeVCmM2zBXdqjg3STnXmRJhLIQ+Ishfd1NuQcZ6Usz1GLPjSoXxWg7kL2tsdf1jpsN7LzPnK7L5blbB2E2GiiXOdpx3Pb6r8Q/OfmW4Xw9cMarpATiHPaU/fXLEnKaGYBz0Lcg/sRHOXlK+D40oaYCxEb/wNs4ZOQOADutCgszT508uAAAAAElFTkSuQmCC' />";
							} else {
								$sale = "---";
							}
							
							echo '<tr>
								<td><center>'. $productPlus .'</center></td>
								<td>'. $category["name"] .'</td>
								<td><center>'. $product["field_01"] .'</center></td>
								<td><center>'. $product["field_02"] .'</center></td>
								<td><center>'. $product["field_03"] .'</center></td>
								<td><center>'. $product["field_04"] .'</center></td>
								<td><center>'. $create_date .'</center></td>
								<td><center>'. $sale .'</center></td>
								<td><center>'. $sale_date .'</center></td>
								<td><center>'. $product["pid"] .'</center></td>
								<td><center><a href="addonmodules.php?module=whmcs_digital_products&pr='. $product["id"] .'" style="color:#FF0000">حذف</a></center></td>
							</tr>';
						}
						
					echo '</tbody>
				</table>
			</div>
		</div>
		
		<div id="new" class="tab-pane fade in">
			<form method="post" action="">
				<input type="hidden" name="do" value="create_product" />
				<div class="form-group">
					<label for="cat">دسته</label>
					<select class="form-control" id="cat" name="cat" tabindex="1">
						<option value="">دسته مرتبط با این محصول را انتخاب کنید</option>';

						$categorys = mysql_query('SELECT * FROM `mod_whmcs_digital_cats` ORDER BY `id` DESC');
						while ($category = mysql_fetch_array($categorys))
						{							
							echo '<option value="'. $category['id'] .'">'. $category['name'] .'</option>';
						}
					
					echo '</select>
					<p class="help-block" style="font-size:12px;">دسته مربوط به محصولی که قصد افزودن آن را دارید را انتخاب کنید</p>
				</div>

				<table border="0" style="width:100%">
					<tbody>
						<tr>
							<td style="padding-left:5px;">
								<div class="form-group">
									<label for="field_01">فیلد 1</label>
									<input type="text" class="form-control" id="field_01" name="field_01" tabindex="2">
									<p class="help-block" style="font-size:12px;">در این بخش محصول دیجیتال را وارد کنید, این بخش میتواند شامل آیپی, نام کاربری, کلمه عبور و ... باشد</p>
								</div>
								<div class="form-group">
									<label for="field_03">فیلد 3</label>
									<input type="text" class="form-control" id="field_03" name="field_03" tabindex="4">
									<p class="help-block" style="font-size:12px;">در این بخش محصول دیجیتال را وارد کنید, این بخش میتواند شامل آیپی, نام کاربری, کلمه عبور و ... باشد</p>
								</div>
							</td>
							<td style="padding-right:5px;">
								<div class="form-group">
									<label for="field_02">فیلد 2</label>
									<input type="text" class="form-control" id="field_02" name="field_02" tabindex="3">
									<p class="help-block" style="font-size:12px;">در این بخش محصول دیجیتال را وارد کنید, این بخش میتواند شامل آیپی, نام کاربری, کلمه عبور و ... باشد</p>
								</div>
								<div class="form-group">
									<label for="field_04">فیلد 4</label>
									<input type="text" class="form-control" id="field_04" name="field_04" tabindex="5">
									<p class="help-block" style="font-size:12px;">در این بخش محصول دیجیتال را وارد کنید, این بخش میتواند شامل آیپی, نام کاربری, کلمه عبور و ... باشد</p>
								</div>
							</td>
						</tr>
					</tbody>
				</table>

				<button type="submit" class="btn btn-success">افزودن این محصول</button>
			</form>
		</div>
		
		<div id="import" class="tab-pane fade in">
			<form method="post" action="" enctype="multipart/form-data">
				<input type="hidden" name="do" value="upload_product" />
				<div class="form-group">
					<label for="cat">دسته</label>
					<select class="form-control" id="cat" name="cat" tabindex="1">
						<option value="">دسته مرتبط با این محصول را انتخاب کنید</option>';

						$categorys = mysql_query('SELECT * FROM `mod_whmcs_digital_cats` ORDER BY `id` DESC');
						while ($category = mysql_fetch_array($categorys))
						{							
							echo '<option value="'. $category['id'] .'">'. $category['name'] .'</option>';
						}
					
					echo '</select>
					<p class="help-block" style="font-size:12px;">دسته مربوط به محصولی که قصد افزودن آن را دارید را انتخاب کنید</p>
				</div>

				<table border="0" style="width:100%">
					<tbody>
						<tr>
							<td style="padding-left:5px;">
								<div class="form-group">
									<label for="separator">جدا کننده</label>
									<select class="form-control" id="separator" name="separator" tabindex="1" style="direction:ltr;">
										<option value=",">,</option>
										<option value=":">:</option>
										<option value="-">-</option>
										<option value=";">;</option>
									</select>
									<p class="help-block" style="font-size:12px;">جداکننده بین فیلدها را انتخاب کنید</p>
								</div>
							</td>
							<td style="padding-right:5px;">
								<div class="form-group">
									<label for="file">انتخاب فایل</label>
									<input type="file" class="form-control" id="file" name="file" tabindex="4">
									<p class="help-block" style="font-size:12px;">فایل محصولات دیجیتال را انتخاب کنید</p>
								</div>
							</td>
						</tr>
					</tbody>
				</table>

				<button type="submit" class="btn btn-success">ایمپورت محصولات</button>
			</form>
		</div>
		
		<div id="paste" class="tab-pane fade in">
			<form method="post" action="">
				<input type="hidden" name="do" value="paste_product" />
				<div class="form-group">
					<label for="cat">دسته</label>
					<select class="form-control" id="cat" name="cat" tabindex="1">
						<option value="">دسته مرتبط با این محصول را انتخاب کنید</option>';

						$categorys = mysql_query('SELECT * FROM `mod_whmcs_digital_cats` ORDER BY `id` DESC');
						while ($category = mysql_fetch_array($categorys))
						{							
							echo '<option value="'. $category['id'] .'">'. $category['name'] .'</option>';
						}

					echo '</select>
					<p class="help-block" style="font-size:12px;">دسته مربوط به محصولی که قصد افزودن آن را دارید را انتخاب کنید</p>
				</div>


				<div class="form-group">
					<label for="separator">جدا کننده</label>
					<select class="form-control" id="separator" name="separator" tabindex="2" style="direction:ltr;">
						<option value=",">,</option>
						<option value=":">:</option>
						<option value="-">-</option>
						<option value=";">;</option>
					</select>
					<p class="help-block" style="font-size:12px;">جداکننده بین فیلدها را انتخاب کنید</p>
				</div>

				<div class="form-group">
					<label for="paste">محصولات دیجیتال</label>
					<textarea class="form-control" rows="15" id="paste" name="paste" tabindex="3" style="direction:ltr;" placeholder="FIELD1,FIELD2,FIELD3,FIELD4"></textarea>
					<p class="help-block" style="font-size:12px;" >محصولات دیجیتال را وارد کنید, هر محصول در یک خط قرار داشته باشد</p>
				</div>

				<button type="submit" class="btn btn-success">ایمپورت محصولات</button>
			</form>
		</div>

	</div>';
}