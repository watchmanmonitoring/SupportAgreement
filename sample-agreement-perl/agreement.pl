#! /usr/bin/perl

use CGI;
use strict;
use Net::SMTP;
use MIME::Lite;
use POSIX qw (strftime);

# Initiate needed variables
my %vars;
my $query = new CGI;


# Determine if this is spammy via the the_email variable
# if ($vars{'the_email'} ne '') {
# exit;
# }


# now make something required
# then apply to three other 

# Print the appropriate content-type header
print $query->header ("text/html");

# Pull the POST variables into a hash (%vars)
foreach my $key ($query->param) {
	$vars{$key} = $query->param ($key);
}

# Prepare the email
my $ccData;
my $pubMsg;
my $pubData;
my $privMsg;
my $smtpServer = 'localhost';
my $pubRecip = 'watchman@watchmanmonitoring.com';
my $sender = 'watchman@watchmanmonitoring.com';
my $subject = "Sample Agreement Signup for " . ($vars{'docid'} or $vars{'company'} or "$vars{'firstname'} $vars{'lastname'}" or "Unknown");
my $time = strftime "%a %b %e, %Y %H:%M:%S", localtime;
send ('smtp', $smtpServer, Timeout => 60);


# Determine the method they wish to pay
if ($vars{'billAnnually'}) {
	$vars{'agreementText'} = "Annual Billing";
} else {
	$vars{'agreementText'} = "Monthly Billing";
}

# Determine the method they wish to pay
if ($vars{'billAnnually'}) {
	$vars{'agreementAmount'} = "$vars{'annuallyTotal'}";
} else {
	$vars{'agreementAmount'} = "$vars{'grandTotal'}";
}


# Segregate the data for easier emailing
$pubData = qq|A Monthly Agreement Request was Submitted at $time:
--Agreement Information--
Company: $vars{'company'}
Name: $vars{'firstname'} $vars{'lastname'}
E-Mail: $vars{'email'}
Address: $vars{'address1'}
City: $vars{'city'}
State: $vars{'state'}
Zip: $vars{'zip'}
Phone: $vars{'phone'}

--Agreement Information--
Personal Support Users:  $vars{'qty_item_1'}
Monitored Computers:  $vars{'qty_item_2'}
Monitoring Family Pack: $vars{'qty_item_8'}
Monitored Servers:  $vars{'qty_item_3'}
Managed Clients:  $vars{'qty_item_4'}
Windows Servers:  $vars{'qty_item_5'}
Prepaid Hours:  $vars{'qty_item_6'}
Premier Support: $vars{'qty_item_7'}
Amount to be billed: $vars{'agreementAmount'}
Billing interval: $vars{'agreementText'}
|;

# Send the messages
 $pubMsg = MIME::Lite->new (
	From    => $sender,
	To      => $sender,
	Cc      => $pubRecip,
	Subject => $subject,
	Type    => 'multipart/mixed'
);
$pubMsg->attach (
	Type => 'TEXT',
	Data => $pubData
);
$pubMsg->send;


# Print receipt
my $output = qq|<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<title>
			MyCompany Service Agreement Signup Form
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
				<img src="logo.png" alt="My Company Logo" class="imageo" />
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
					<li>You get peace of mind knowing that MyCompany, Inc. will contact you if your computer is showing signs of failure.</li>
				</ul>
				<p>
				We will enter your agreement into our system, send your invoice, and coordinate payment information with you directly.
				Phone and email support is available immediately, and we will coordinate a time to install our monitoring software.
				Thank you for your business and continued support.
				</p>
				
				<p style="text-align: right;"><em>Sincerely,</em><br> <strong>Allen Hancock</strong> and the <strong>MyCompany, Inc.</strong></p>
								
			</div>
			<hr>
			<div class="thecontainer">
				<div class="span-8">
					<fieldset>
						<legend>Your Billing Information</legend>
						<table border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><label class="span-2" for="company">Company</label></td>
								<td style="text-align: right;" align="right">$vars{'company'}</td>
							</tr>
							<tr>
								<td><label class="span-2" for="firstname">Name</label></td>
								<td style="text-align: right;"  align="right">$vars{'firstname'} $vars{'lastname'}</td>
							</tr>
							<tr>
								<td><label class="form-label" for="email">Email</label></td>
								<td style="text-align: right;"  align="right">$vars{'email'}</td>
							</tr>
							<tr>
								<td><label class="span-2" for="address1">Address</label></td>
								<td style="text-align: right;"  align="right">$vars{'address1'}</td>
							</tr>
							<tr>
								<td><label class="form-label" for="city"></label></td>
								<td style="text-align: right;"  align="right">$vars{'city'}, $vars{'state'} $vars{'zip'}</td>
							</tr>
							<tr>
								<td><label class="form-label" for="phone">Phone</label></td>
								<td style="text-align: right;"  align="right">$vars{'phone'}</td>
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
								<td style="text-align: right;"  align="right">$vars{'qty_item_1'}</td>
							</tr>
							<tr>
								<td><label class="form-label" for="qty_item_1">Monitored Computers</label></td>
								<td style="text-align: right;"  align="right">$vars{'qty_item_2'}</td>
							</tr>
							<tr>
								<td><label class="form-label" for="qty_item_3">Monitored Servers</label></td>
								<td style="text-align: right;"  align="right">$vars{'qty_item_3'}</td>
							</tr>
							<tr>
								<td><label class="form-label" for="qty_item_4">Managed Clients</label></td>
								<td style="text-align: right;"  align="right">$vars{'qty_item_4'}</td>
							</tr>
							<tr>
								<td><label class="form-label" for="qty_item_5">Windows Servers</label></td>
								<td style="text-align: right;"  align="right">$vars{'qty_item_5'}</td>
							</tr>
							<tr>
								<td><label class="form-label" for="qty_item_6">Prepaid Hours</label></td>
								<td style="text-align: right;"  align="right">$vars{'qty_item_6'}</td>
							</tr>
							<tr>
								<td><label class="form-label" for="qty_item_7">Premier Support</label></td>
								<td style="text-align: right;"  align="right">$vars{'qty_item_7'}</td>
							</tr>
							<tr>
								<td><label class="form-label">$vars{'agreementText'}</label></td>
								<td style="text-align: right;"  align="right">$vars{'agreementAmount'}</td>
							</tr>
						</table>
					</fieldset>
				</div>
				<div class="span-8 last nobreak" style="height: 238px; position: relative">
					<fieldset class="sigbox">
						<legend>Authorized Signature</legend>
						<p style="margin-top: 40px">____________________________________</p>
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
</html>|;

print $output;
