<?php

/* Listed below are the variables that contain form item names, price, and description. */
/* These are all serving samples - feel free to rename and reprice in a fashion that works for you. */

$mycompanyname = 'My Company Yo';
$mycompanyaddress '123 Main St';


$item1name = 'Monitored Computers';
$item1price = 10;
$item1description = 'Active monitoring for impending failure for each computer with Watchman Monitoring.';

$item2name = 'Family Pack';
$item2price = 15;
$item2description = "Monitoring for a household's computers.";

$item3name = 'Managed Computers';
$item3price = 35;
$item3description = "Active monitoring for pending failures, as well as system & application patch management.";

$item4name = 'Managed Mac Servers';
$item4price = 100;
$item4description = "Active monitoring, maintenance updates & manual verification of backup systems.";

$item5name = 'Managed Windows Servers';
$item5price = 150;
$item5description = "Active monitoring, maintenance updates, verification of backup systems and antivirus.";

$item6name = 'Personal Support Users';
$item6price = 25;
$item6description = "The total number of people who will be contacting <?php echo $mycompanyname; ?> for technical support.";

$item7name = 'Premier Support Users';
$item7price = 70;
$item7description = "(Per Person, 5 User minimum) <br />All needed email, phone, and remote support.";

$item8name = 'Monthly Prepaid Hours';
$item8price = 100;
$item8description = "(2 hours per month minimum) <br />1/3 off our stock hourly rate.<br />";

$annualdiscountmultiplier = '0.90'; // enter the value of any annual discount, 0.90 = 10% off
$annualdiscountpercent = '10'; // you'll want this to match annualdiscountmultiplier

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (isset($_POST["firstname"]) && empty($_POST["firstname"]) ){
		$error .= "Please fill out your first name";

}

if (isset($_POST["lastname"]) && empty($_POST["lastname"]) ){
		if (!$error == "") {
			$error .='<br />';
		}
		$error .= "Please fill out your last name";
}

if (isset($_POST["email"]) && empty($_POST["email"]) ){
		if (!$error == "") {
					$error .='<br />';
		}
		$error .= "Please enter an email address";
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
		if (!$error == "") {
					$error .='<br />';
		}
		$error .= "Please enter a valid email address";
}

}



if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error) ){






								if (!empty($_POST["billAnnually"]))
								{
									$agreementText = 'Annual Total';
									$agreementAmount = $_POST["annuallyTotal"];
									}
								else
								{
									$agreementText = 'Monthly Total';
									$agreementAmount = $_POST["grandTotal"];
									}

							?>
							<?php
$to = "watchman@watchmanmonitoring.com";
$subject = "Website Agreement Form";
$company = $_POST["company"];
$name = $_POST["firstname"] . " " . $_POST["lastname"];
$email = $_POST["email"];
$address1 = $_POST["address1"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$phone = $_POST["phone"];

$qty_item_1 = $_POST["qty_item_1"];
$qty_item_2 = $_POST["qty_item_2"];
$qty_item_3 = $_POST["qty_item_3"];
$qty_item_4 = $_POST["qty_item_4"];
$qty_item_5 = $_POST["qty_item_5"];
$qty_item_6 = $_POST["qty_item_6"];
$qty_item_7 = $_POST["qty_item_7"];
$qty_item_8 = $_POST["qty_item_8"];

$message = "
--Personal Information--
Company: $company
Name: $name
E-Mail: $email
Address: $address1
City: $city
State: $state
Zip: $zip
Phone: $phone

--Agreement Information--
<?php echo $item1name; ?>:  $qty_item_1
<?php echo $item2name; ?>:  $qty_item_2
<?php echo $item3name; ?>:  $qty_item_3
<?php echo $item4name; ?>:  $qty_item_4
<?php echo $item5name; ?>:  $qty_item_5
<?php echo $item6name; ?>:  $qty_item_6
<?php echo $item7name; ?>:  $qty_item_7
<?php echo $item8name; ?>:  $qty_item_8
Amount to be billed: $agreementAmount
Billing interval: $agreementText
";
$from = $_POST["email"];
$headers = "From:" . $from;


mail($to,$subject,$message,$headers);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<title>
			<?php echo $mycompanyname; ?> Service Agreement Signup Form
		</title><!-- Framework CSS -->
		<link rel="stylesheet" href="jquery.tooltip.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" href="screen.css" type="text/css" media="print, screen, projection">
		<!--[if lt IE 8]><link rel="stylesheet" href="ie.css" type="text/css" media="screen, projection"><![endif]-->
		<style type="text/css" media="screen">
			div fieldset.sigbox {
				background-color: transparent;
/*				border-bottom: 1px solid #999;*/
				height: 70px;
			}
			div.thecontainer {
				position: relative;
			}
			.nobreak {
				white-space: nowrap;
				overflow: hidden;
			}
			body div.container h2#mylogo {
/*				height: 162px;*/

				display: block;
				list-style-image: url(logo.png);
				list-style-position: inside;

/*				letter-spacing: -1000em;*/
/*				font-size: 1pt; */
/*				position: relative;*/
			}
			body div.container h2#mylogo .loseit {
				display: none!important;
				position: absolute;
				color: #FFF;
				text-indent: -999999px;
			}
			#mylogo img {
/*				position: absolute;*/
				position: relative;
				text-indent: 0px!important;
				top: 0px;
			}
		</style>

		<script src="jquery.min.js" type="text/javascript"></script>
		<script src="jquery.dimensions.min.js" type="text/javascript"></script>
		<script src="jquery.tooltip.js" type="text/javascript"></script>
	</head>
	<body id="index" class="index" onload="document.forms.pay.company.focus()">
		<div class="container">
			<!-- inactive class - showgrid -->
			<h4 class="printme">My Company, Inc.<br />123 Main Street<br />Anytown, Anywhere<br />+1-408-352-6145</h4>
			<h2 id="mylogo">
				<img src="logo.png" alt="" class="imageo" />
				<br>
				<small>Support Agreement</small>
			</h2>
			<hr>
			<div>
				<p>Your Support Agreement has been submitted. <p>
				<strong>As a subscriber to our support package, you receive:</strong>
				<ul>
				<li>Brief emails and calls, under 15 minutes per incident, are covered by your agreement.</li>
					<li>The rate for labor will be discounted from &#36;150 to &#36;120 an hour</li>
					<li>Hardware and software sales will enjoy a 5.5% discount</li>
				</ul>
				<p>
				<strong>Your Monitored Computers will have:</strong>
				</p>
				<ul>
					<li>Automated monitoring and reporting on the overall health of your computer</li>
					<li>A chance to identify small problems before they get develop to large ones, or to data loss.</li>
					<li>Active notification of issues Watchman Monitoring finds as it checks your backup status, hard drive, and more.</li>
					<li>You get peace of mind knowing that <?php echo $mycompanyname; ?> will contact you if your computer is showing signs of failure.</li>
				</ul>
				<p>
				We will enter your agreement into our system, send your invoice, and coordinate payment information with you directly.
				Phone and email support is available immediately, and we will coordinate a time to install our monitoring software.
				Thank you for your business and continued support.
				</p>

				<p style="text-align: right;"><em>Sincerely,</em><br> <strong>Allen Hancock</strong> and the <strong><?php echo $mycompanyname; ?></strong></p>

			</div>
			<hr>
			<div class="thecontainer">
				<div class="span-8">
					<fieldset>
						<legend>Your Billing Information</legend>
						<table border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><label class="span-2" for="company">Company</label></td>
								<td style="text-align: right;" align="right"><?php echo $_POST["company"]; ?></td>
							</tr>
							<tr>
								<td><label class="span-2" for="firstname">Name</label></td>
								<td style="text-align: right;"  align="right"><?php echo $_POST["firstname"] . " " . $_POST["lastname"]; ?></td>
							</tr>
							<tr>
								<td><label class="form-label" for="email">Email</label></td>
								<td style="text-align: right;"  align="right"><?php echo $_POST["email"]; ?></td>
							</tr>
							<tr>
								<td><label class="span-2" for="address1">Address</label></td>
								<td style="text-align: right;"  align="right"><?php echo $_POST["address1"]; ?></td>
							</tr>
							<tr>
								<td><label class="form-label" for="city"></label></td>
								<td style="text-align: right;"  align="right"><?php echo $_POST["city"] . ", " . $_POST["state"] . ", " . $_POST["zip"]; ?></td>
							</tr>
							<tr>
								<td><label class="form-label" for="phone">Phone</label></td>
								<td style="text-align: right;"  align="right"><?php echo $_POST["phone"]; ?></td>
							</tr>
						</table>
					</fieldset>
				</div>
				<div class="span-8">
					<fieldset>
						<legend>Monthly Agreement Quantities</legend>
						<table border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><label class="form-label" for="qty_item_2">Personal Support</label></td>
								<td style="text-align: right;"  align="right"><?php echo $_POST["qty_item_1"]; ?></td>
							</tr>
							<tr>
								<td><label class="form-label" for="qty_item_1">Monitored Computers</label></td>
								<td style="text-align: right;"  align="right"><?php echo $_POST["qty_item_2"]; ?></td>
							</tr>
							<tr>
								<td><label class="form-label" for="qty_item_3">Monitored Servers</label></td>
								<td style="text-align: right;"  align="right"><?php echo $_POST["qty_item_3"]; ?></td>
							</tr>
							<tr>
								<td><label class="form-label" for="qty_item_4">Managed Clients</label></td>
								<td style="text-align: right;"  align="right"><?php echo $_POST["qty_item_4"]; ?></td>
							</tr>
							<tr>
								<td><label class="form-label" for="qty_item_5">Windows Servers</label></td>
								<td style="text-align: right;"  align="right"><?php echo $_POST["qty_item_5"]; ?></td>
							</tr>
							<tr>
								<td><label class="form-label" for="qty_item_6">Prepaid Hours</label></td>
								<td style="text-align: right;"  align="right"><?php echo $_POST["qty_item_6"]; ?></td>
							</tr>
							<tr>
								<td><label class="form-label" for="qty_item_7">Premier Support</label></td>
								<td style="text-align: right;"  align="right"><?php echo $_POST["qty_item_7"]; ?></td>
							</tr>
							<tr>

								<td><label class="form-label"><?php echo $agreementText; ?></label></td>
								<td style="text-align: right;"  align="right"><?php echo $agreementAmount; ?></td>
							</tr>
						</table>
					</fieldset>
				</div>
				<div class="span-8 last nobreak" style="height: 238px; position: relative">
					<fieldset class="sigbox" style="margin-left: 20px;">
						<legend>Authorized Signature</legend>
						<p style="margin-top: 40px;">____________________________________</p>
					</fieldset>
				</div>
			</div>
			<br><br>
		</div><!-- close: content -->
		<div class="container">
			<p><strong>Please print, sign, and return this form. Either in person, mail, or fax to +1-408-352-6145<strong></p>
		</div>
		<div id="footer">
			<!-- Footer Stuff -->
		</div><!-- close: footer -->
		<!-- close: kontainer -->

	</body>
</html>
<?php

}
else {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<title>
			Support Agreement
		</title><!-- Framework CSS -->
		<link rel="stylesheet" href="jquery.tooltip.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" href="screen.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" href="print.css" type="text/css" media="print"><!--[if lt IE 8]><link rel="stylesheet" href="ie.css" type="text/css" media="screen, projection"><![endif]-->
		<style type="text/css" media="screen">
			table, td, th {
				vertical-align: baseline;
			}
			table.bvalign, td.bvalign, th.bvalign {
				vertical-align: bottom;
			}
			#grandTotal {
				margin: 2px 0px;
			}
		</style>
		<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8.4.custom.min.js"></script>
		<script type="text/javascript" src="jquery.field.js"></script>
		<script type="text/javascript" src="jquery.calculation.js"></script>
		<script type="text/javascript" src="jquery.validate.js"></script>
		<script type="text/javascript" src="jquery.supportform.js"></script>
		<link rel="shortcut icon" href="favicon.ico" />

	</head>
	<body id="index" class="index">
		<div class="container">
			<!-- inactive class - showgrid -->
			<h4 class="printme"><?php echo $mycompanyname; ?><br />123 Main Street<br />Anytown, Anywhere<br />+1-408-352-6145</h4>
			<h2 id="mylogo">
				<br>
				<small>Monthly Support Agreement</small>
			</h2>
<?php
	if (!$error == "") { ?>
					<div style="font-family:Arial, Helvetica, sans-serif; font-size:13px;color: #D8000C;background-color: #FFBABA;border: 1px solid;margin: 10px 0px;padding:15px 10px 15px 10px;background-repeat: no-repeat;background-position: 10px center;"><?php echo $error?></div>

<?php	} ?>

			<hr>
			<div>
				<h3 id=""><strong>Thank you for choosing <?php echo $mycompanyname; ?></strong></h3>
				<p>
				This Monthly Support Agreement sign-up form creates an agreement between <?php echo $mycompanyname; ?> and you, the Client.
				</p>

				<h3 id=""><strong>Members of our Personal Support agreement receive:</strong></h3>
				<ul>
					<li>Brief emails and calls, under 15 minutes per incident, are covered by your agreement.</li>
					<li>The rate for labor will be discounted from &#36;150 to &#36;120 an hour</li>
					<li>Hardware and software sales will enjoy a 5.5% discount</li>
				</ul>

				<h3 id=""><strong>Monitored Computers have:</strong></h3>
				<ul>
					<li>Automated monitoring and reporting on the overall health of your computer, via Watchman Monitoring</li>
					<li>A chance to identify small problems before they get develop to large ones, or to data loss.</li>
					<li>Active notification of issues discovered by Watchman Monitoring, as it checks your backup status, hard drive, and more.</li>
					<li>You get peace of mind knowing that the <?php echo $mycompanyname; ?> will contact you if your computer is showing signs of failure.</li>
				</ul>

			<h3 id=""><strong>To create your support agreement</strong></h3>
				<p font size="11">
					<strong>Enter your billing contact information</strong><br>
					We will email PDF copies of your invoice to this address. Please contact us if you prefer copies to be mailed or faxed.
					<br><br>
					<strong>Adjust the quantities for each category of support</strong><br>
					See the notes by each category to tailor the support agreement for your needs.<br>
					We recommend adding Personal Support for each person who enjoys having our services available.<br>
					Pre-payment for hours on a monthly basis is requested by some clients, however this is not a requirement for our services.<br>
					We understand choosing the right agreement for you can be complex. <br>
		        	We are happy to speak with you to create your agreement. Call +1-408-352-6145.
				</p>

				<p style="text-align: right;"><em>Sincerely,</em><br> <strong>Allen Hancock</strong> and <strong><?php echo $mycompanyname; ?></strong></p>

			</div>
			<hr>
			<!-- <div class="span-8"> -->
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" accept-charset="utf-8" name="pay" id="pay">
				<div class="span-9">
					<fieldset>
						<legend><span class="order_num">1</span> Your Contact Information</legend>

						<div class="span-8">
							<label class="span-2" for="company">Company (if applicable)</label><br>
							<input type="text" name="company" value="<?php if (isset($_GET["company"])){echo $_GET["company"];} ?><?php if (isset($_POST["company"])){echo $_POST["company"];}?>" id="company" style="width: 300px;" class="text"><br>
						</div>
						<div class="span-4">
							<label class="span-2" for="firstname">First Name <span style="color:red;">*</span></label><br>
							<input type="text" name="firstname" value="<?php if (isset($_GET["firstname"])){echo $_GET["firstname"];} ?><?php if (isset($_POST["firstname"])){echo $_POST["firstname"];}?>" id="firstname" class="text"><br>
						</div>
						<div class="span-4">
							<label class="span-2" for="lastname">Last Name <span style="color:red;">*</span></label><br>
							<input type="text" name="lastname" value="<?php if (isset($_GET["lastname"])){echo $_GET["lastname"];} ?><?php if (isset($_POST["lastname"])){echo $_POST["lastname"];}?>" id="lastname" class="text"><br>
						</div>
						<div class="span-8">
							<label class="form-label" for="email">Billing Email Address <span style="color:red;">*</span></label><br>
							<input type="text" name="email" value="<?php if (isset($_GET["email"])){echo $_GET["email"];} ?><?php if (isset($_POST["email"])){echo $_POST["email"];}?>" id="email" style="width: 300px!important;" class="text"><br>
						</div>
						<div class="span-8">
							<label class="span-2" for="address1">Address</label><br>
							<input type="text" name="address1" value="<?php if (isset($_GET["address"])){echo $_GET["address"];} ?><?php if (isset($_POST["address1"])){echo $_POST["address1"];}?>" id="address1" style="width: 300px!important;" class="text"><br>
						</div>
						<div class="span-4">
							<label class="form-label" for="city">City</label><br>
							<input type="text" name="city" value="<?php if (isset($_GET["city"])){echo $_GET["city"];} ?><?php if (isset($_POST["city"])){echo $_POST["city"];}?>" id="city" class="text"><br>
						</div>
						<div class="span-2">
							<label class="form-label" for="state">State</label><br>
							<input type="text" name="state" value="<?php if (isset($_GET["state"])){echo $_GET["state"];} ?><?php if (isset($_POST["state"])){echo $_POST["state"];}?>" id="state" style="width: 25px!important;" class="text"><br>
						</div>
						<div class="span-2">
							<label class="form-label" for="zip">Zip</label><br>
							<input type="text" name="zip" value="<?php if (isset($_GET["zip"])){echo $_GET["zip"];} ?><?php if (isset($_POST["zip"])){echo $_POST["zip"];}?>" id="zip" style="width: 75px!important;" class="text"><br>
						</div>
						<div class="span-4">
							<label class="form-label" for="phone">Phone</label><br>
							<input type="text" name="phone" value="<?php if (isset($_GET["phone"])){echo $_GET["phone"];} ?><?php if (isset($_POST["phone"])){echo $_POST["phone"];}?>" id="phone" style="width: 120px!important;" class="text">
						</div>
						<div class="span-4">
							<label class="form-label" for="fax">Fax</label><br>
							<input type="text" name="fax" value="<?php if (isset($_GET["fax"])){echo $_GET["fax"];} ?><?php if (isset($_POST["fax"])){echo $_POST["fax"];}?>" id="fax" style="width: 120px!important;" class="text">
						</div>
					</fieldset>
				</div>
				<div class="span-14">
					<fieldset>
						<legend><span class="order_num">2</span> Monitoring and Management</legend>

						<table width="400">
							<col style="width: 276px;" />
							<col />
							<col style="width: 40px;" />
							<col style="width: 72px;" />
							<tr>
								<th align="left">
								</th>
								<th align="right" style="padding-right: 10px; text-align: right;">
								</th>
								<th align="right" style="text-align: right;">
									Qty
								</th>
								<th align="right" style="text-align: right;" >
									Total
								</th>
							</tr>
							<tr>
								<td valign="top">
									<a style="color:black; text-decoration: none;" target=_blank href="http://www.watchmanmonitoring.com/sample-offering/"><strong><?php echo $item1name; ?></strong></a><br>
									<?php echo $item1description; ?>
								</td>
								<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
									<span id="price_item_1">&#36;<?php echo $item1price; ?></span>
								</td>
								<td valign="top" align="center" style="text-align: right;">
									<input type="text" name="qty_item_2" id="qty_item_2" value="<?php if (isset($_GET["monitoring"])){echo $_GET["monitoring"];} ?><?php if (isset($_POST["qty_item_2"])){echo $_POST["qty_item_2"];}?>" size="2" style="text-align: right;"/>
								</td>
								<td valign="top" style="text-align: right;" align="right" id="total_item_2">
								</td>
							</tr>
							<tr>
								<td valign="top">
									<a style="color:black; text-decoration: none;" target=_blank href="http://www.watchmanmonitoring.com/sample-offering/"><strong><?php echo $item2name; ?></strong></a><br>
										<?php echo $item2description; ?>
									</td>
									<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
											<span id="price_item_8">&#36;<?php echo $item2price; ?></span>
									</td>
									<td valign="top" align="center" style="text-align: right;">
										<input type="text" name="qty_item_8" id="qty_item_8" value="<?php if (isset($_GET["monitoring-family"])){echo $_GET["monitoring-family"];} ?><?php if (isset($_POST["qty_item_8"])){echo $_POST["qty_item_8"];}?>" size="2" style="text-align: right;"/>
									</td>
									<td valign="top" style="text-align: right;" align="right" id="total_item_8">
								</td>
							</tr>
							<tr >
								<td valign="top">
									<strong><?php echo $item3name; ?></strong><br>
									<?php echo $item3description; ?>
								</td>
								<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
									<span id="price_item_4">&#36;<?php echo $item3price; ?></span>
								</td>
								<td valign="top" align="center" style="text-align: right;">
									<input type="text" name="qty_item_4" id="qty_item_4" value="<?php if (isset($_GET["managed"])){echo $_GET["managed"];} ?><?php if (isset($_POST["qty_item_4"])){echo $_POST["qty_item_4"];}?>" size="2" style="text-align: right;"/>
								</td>
								<td valign="top" style="text-align: right;" align="right" id="total_item_4">
								</td>
							</tr>
							<tr>
								<td valign="top">
									<strong><?php echo $item4name; ?></strong><br>
									<?php echo $item4description; ?>
								</td>
								<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
									<span id="price_item_3">&#36;<?php echo $item4price; ?></span>
								</td>
								<td valign="top" align="center" style="text-align: right;">
									<input type="text" name="qty_item_3" id="qty_item_3" value="<?php if (isset($_GET["servers"])){echo $_GET["servers"];} ?><?php if (isset($_POST["qty_item_3"])){echo $_POST["qty_item_3"];}?>" size="2" style="text-align: right;"/>
								</td>
								<td valign="top" style="text-align: right;" align="right" id="total_item_3">

								</td>
							</tr>
							<tr >
								<td valign="top">
									<strong><?php echo $item5name; ?></strong><br>
									<?php echo $item5description; ?>
								</td>
								<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
									<span id="price_item_5">&#36;<?php echo $item5price; ?></span>
								</td>
								<td valign="top" align="center" style="text-align: right;">
									<input type="text" name="qty_item_5" id="qty_item_5" value="<?php if (isset($_GET["winservers"])){echo $_GET["winservers"];} ?><?php if (isset($_POST["qty_item_5"])){echo $_POST["qty_item_5"];}?>" size="2" style="text-align: right;"/>
								</td>
								<td valign="top" style="text-align: right;" align="right" id="total_item_5">

								</td>
							</tr>
							</table>
							<legend><span class="order_num">3</span> Support</legend>

						<table width="400">
							<col style="width: 276px;" />
							<col />
							<col style="width: 40px;" />
							<col style="width: 72px;" />
							<tr>
								<td valign="top">
									<a style="color:black; text-decoration: none;" target=_blank href="http://www.watchmanmonitoring.com/sample-offering/"><strong><?php echo $item6name; ?></strong></a><br>
									<?php echo $item6description; ?><br>
								</td>
								<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
									<span id="price_item_2">&#36;<?php echo $item6price; ?></span>
								</td>
								<td valign="top" align="center" style="text-align: right;">
									<input type="text" name="qty_item_1" id="qty_item_1" value="<?php if (isset($_GET["personal"])){echo $_GET["personal"];} ?><?php if (isset($_POST["qty_item_1"])){echo $_POST["qty_item_1"];}?>" size="2" style="text-align: right;"/>
								</td>
								<td valign="top" style="text-align: right;" align="right" id="total_item_1">
								</td>
							</tr>
							<tr>
								<td valign="top">
										<a style="color:black; text-decoration: none;" target=_blank href="http://www.watchmanmonitoring.com/sample-offering/"><strong><?php echo $item7name; ?></strong></a><br>
									<?php echo $item7description; ?>
								</td>
								<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
									<span id="price_item_7">&#36;<?php echo $item7price; ?></span>
								</td>
								<td valign="top" align="center" style="text-align: right;">
									<input type="text" name="qty_item_7" id="qty_item_7" value="<?php if (isset($_GET["premier"])){echo $_GET["premier"];} ?><?php if (isset($_POST["qty_item_7"])){echo $_POST["qty_item_7"];}?>" size="2" style="text-align: right;"/>
								</td>
								<td valign="top" style="text-align: right;" align="right" id="total_item_7">
								</td>
							</tr>
							<tr >
								<td valign="top">
									<strong><?php echo $item8name; ?></strong><br>
									<?php echo $item8description; ?>
								</td>
								<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
									<span id="price_item_6">&#36;<?php echo $item8price; ?></span>
								</td>
								<td valign="top" align="center" style="text-align: right;">
									<input type="text" name="qty_item_6" id="qty_item_6" value="<?php if (isset($_GET["hours"])){echo $_GET["hours"];} ?><?php if (isset($_POST["qty_item_6"])){echo $_POST["qty_item_6"];}?>" size="2" style="text-align: right;"/>
								</td>
								<td valign="top" style="text-align: right;" align="right" id="total_item_6">
								</td>
							</tr>
							<tr>
								<td valign="bottom" colspan="3" align="right" style="text-align: right;" class="bvalign">
									<span style="font-size: 17px; ">Monthly Total</span>
								</td>
								<td valign="bottom" align="right" class="bvalign">
									<input type="text" style="width: 72px; text-align: right; font-size: 15px; border: none; background-color: transparent!important;" READONLY name="grandTotal" value="" id="grandTotal"/>
								</td>
							</tr>
								</td>
								<td valign="bottom" align="right" class="bvalign">
									<br>
								</td>
							</tr>
							<tr>

								<td valign="bottom" colspan="1" align="left" style="text-align: left;" class="bvalign">
									<span style="font-size: 10px;"><input type="checkbox" style="" name="billAnnually" value=<?php echo $annualdiscountmultiplier; ?> id="billAnnually"/>If you would prefer to pay annually,<br>we offer a <?php echo $annualdiscountpercent; ?>% convenience discount.</span>
								</td>
								<td valign="middle" colspan="2" align="right" style="text-align: right;" class="bvalign" id="annually_spot">
									<span id="annually_total_label" style="font-size: 17px; ">Annual Total</span>
								</td>
								<td valign="bottom" align="right" class="bvalign" id="annually_placeholder">
									<input type="text" style="width: 72px; text-align: right; font-size: 15px; border: none; background-color: transparent!important;" READONLY name="annuallyTotal" id="annuallyTotal" value="0.00" />
						</table>
						<input id="the_email" value="" type="text">
						<!--                                     V - Height adjustment below submit button -->
						<p class="right" style="margin-bottom: 85px;">
									<input type="submit" id="thesubmitbutton" value="Submit Agreement Request &rarr;" class="order">
						</p>
					</fieldset>
				</div>
			</form><br />
		</div><!-- close: content -->
		<div id="footer">
			<!-- Footer Stuff -->
		</div><!-- close: footer -->
		<!-- close: kontainer -->
	</body>
</html>

<?php } ?>