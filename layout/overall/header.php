<html><?php
	$time = microtime();
	$time = explode(' ', $time);
	$time = $time[1] + $time[0];
	$start = $time; ?>
	<head>
		<title><?php echo $config['site_title']; ?></title>
		<link rel="shortcut icon" href="layout/images/global/general/favicon.ico" type="image/x-icon">
		<link rel="icon" href="layout/images/global/general/favicon.ico" type="image/x-icon">
		<link href="layout/styles/basic.css" rel="stylesheet" type="text/css">
		<link href="layout/styles/news.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="layout/javascripts/generic.js"></script>
		<script type='text/javascript'>
			var loginStatus=0;
			loginStatus='false';
			var activeSubmenuItem='latestnews';
			var IMAGES=0; IMAGES='layout/images';
			var LINK_ACCOUNT=0;
			LINK_ACCOUNT='{$path}/index.php/account';
			var g_FormName='';
			var g_FormField='';
			var g_Deactivated=false;
		</script>
		<SCRIPT TYPE="text/javascript">
			<!-- // Framekiller
			setTimeout ("changePage()", 6000);
			function changePage()
			{
			  if (parent.frames.length > 2) {
				if (browserTyp == "ie") {
				  parent.location=document.location;
				} else {
				  self.top.location=document.location;
				}
			  }
			}
			// -->
		</SCRIPT>
		<script type="text/javascript" src="layout/javascripts/initialize.js"></script>
	</head>
	<body onBeforeUnLoad="SaveMenu();" onUnload="SaveMenu();" onLoad="SetFormFocus()">
	<div class="">
		<a href="register.php">
			<?php
			$date = 'Aug 14  2020 16:00:00 CET';
			$exp_date = strtotime($date);
			$now = time();

			if ($now < $exp_date) {
			?>
			<script>
			// Count down milliseconds = server_end - server_now = client_end - client_now
			var server_end = <?php echo $exp_date; ?> * 1000;
			var server_now = <?php echo time(); ?> * 1000;
			var client_now = new Date().getTime();
			var end = server_end - server_now + client_now; // this is the real end time

			var _second = 1000;
			var _minute = _second * 60;
			var _hour = _minute * 60;
			var _day = _hour *24
			var timer;

			function showRemaining()
			{
				var now = new Date();
				var distance = end - now;
				if (distance < 0 ) {
					clearInterval( timer );
					document.getElementById('countdown').innerHTML = 'EXPIRED!';

					return;
				}
				var days = Math.floor(distance / _day);
				var hours = Math.floor( (distance % _day ) / _hour );
				var minutes = Math.floor( (distance % _hour) / _minute );
				var seconds = Math.floor( (distance % _minute) / _second );

				var countdown = document.getElementById('countdown');
				countdown.innerHTML = '';
				if (days) {
					countdown.innerHTML += ' <span style="color:black;">' + days + '</span> DAYS ';
				}
				countdown.innerHTML += ' <span style="color:white;">' + hours+ '</span> HOURS';
				countdown.innerHTML += ' <span style="color:white;">' + minutes+ '</span> MINUTES';
				countdown.innerHTML += ' <span style="color:white;">' + seconds+ '</span> SECONDS';
			}

			timer = setInterval(showRemaining, 1000);
			</script>
			Perfect Tibia will start in: <span style="color: white;" id="countdown">loading...</span>
			<?php
			} else {
				echo 'Perfect Tibia e 8.0 Will Start In: <span style="color: black;">SERVER STARTED!</span>';
			}
			?>
		</a>
	</div>
		<a name="top" ></a>
		<div id="ArtworkHelper" style="background-image:url(layout/images/global/header/background-artwork.jpg);">
			<div id="DeactivationContainer" ></div>
			<div id="Bodycontainer" >
				<div id="ContentRow">
					<?php include 'layout/leftside.php'; ?>
					<div id="ContentColumn">
						<div id="Content" class="Content">
							<div id="ContentHelper">
								<div id="news" class="Box">
									<div class="Corner-tl" style="background-image:url(layout/images/global/content/corner-tl.gif);"></div>
									<div class="Corner-tr" style="background-image:url(layout/images/global/content/corner-tr.gif);"></div>
									<div class="Border_1" style="background-image:url(layout/images/global/content/border-1.gif);"></div>
									<div class="BorderTitleText" style="background-image:url(layout/images/global/content/title-background-green.gif);"></div>
									<!-- <img id="ContentBoxHeadline" class="Title" src="layout/images/global/strings/headline-news.gif" alt="Contentbox headline" /> -->
									<div class="Border_2">
										<div class="Border_3">
											<div class="BoxContent" style="background-image:url(layout/images/global/content/scroll.gif);">