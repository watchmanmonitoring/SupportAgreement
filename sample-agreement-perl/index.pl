#! /usr/bin/perl

use CGI;
use strict;

my $query = new CGI;
my ($output, $buffer, @pairs, %vars);
my $fullAmtChecked = 'checked';
my $otherAmtChecked = '';

print $query->header ("text/html");

$buffer = $ENV{'QUERY_STRING'};
@pairs = split (/&/, $buffer);
foreach my $pair (@pairs) {
	my ($key, $val) = split (/=/, $pair);
	$vars{lc ($key)} = $val;
	if (lc ($key) == 'amount') {
		$vars{'amt'} = 'other';
		($fullAmtChecked, $otherAmtChecked) = ($otherAmtChecked, $fullAmtChecked);
	}
}

# 
#  The screen.css file is the primary stylesheet  (where style.css would normally be)
#

$output = qq|
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
			<h4 class="printme">MyCompany, Inc.<br />123 Main Street<br />Anytown, Anywhere<br />+1-408-352-6145</h4>
			<h2 id="mylogo">
				<br>
				<small>Monthly Support Agreement</small>
			</h2>
			<hr>
			<div>
				<h3 id=""><strong>Thank you for choosing the MyCompany, Inc.</strong></h3>
				<p>
				This Monthly Support Agreement sign-up form creates an agreement between MyCompany, Inc. and you, the Client.
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
					<li>You get peace of mind knowing that the MyCompany, Inc. will contact you if your computer is showing signs of failure.</li>
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

				<p style="text-align: right;"><em>Sincerely,</em><br> <strong>Allen Hancock</strong> and <strong>MyCompany, Inc.</strong></p>

			</div>
			<hr>
			<!-- <div class="span-8"> -->
			<form action="agreement.pl" method="post" accept-charset="utf-8" name="pay" id="pay">
				<div class="span-9">
					<fieldset>
						<legend><span class="order_num">1</span> Your Contact Information</legend>
							
						<div class="span-8">	
							<label class="span-2" for="company">Company (if applicable)</label><br>
							<input type="text" name="company" value="$vars{'company'}" id="company" style="width: 300px;" class="text"><br>
						</div>
						<div class="span-4">	
							<label class="span-2" for="firstname">First Name</label><br>
							<input type="text" name="firstname" value="$vars{'firstname'}" id="firstname" class="text"><br>
						</div>
						<div class="span-4">	
							<label class="span-2" for="lastname">Last Name</label><br>
							<input type="text" name="lastname" value="$vars{'lastname'}" id="lastname" class="text"><br>
						</div>
						<div class="span-8">	
							<label class="form-label" for="email">Billing Email Address</label><br>
							<input type="text" name="email" value="$vars{'email'}" id="email" style="width: 300px!important;" class="text"><br>
						</div>
						<div class="span-8">	
							<label class="span-2" for="address1">Address</label><br>
							<input type="text" name="address1" value="$vars{'address1'}" id="address1" style="width: 300px!important;" class="text"><br>
						</div>
						<div class="span-4">	
							<label class="form-label" for="city">City</label><br>
							<input type="text" name="city" value="$vars{'city'}" id="city" class="text"><br>
						</div>
						<div class="span-2">	
							<label class="form-label" for="state">State</label><br>
							<input type="text" name="state" value="$vars{'state'}" id="state" style="width: 25px!important;" class="text"><br>
						</div>
						<div class="span-2">	
							<label class="form-label" for="zip">Zip</label><br>
							<input type="text" name="zip" value="$vars{'zip'}" id="zip" style="width: 75px!important;" class="text"><br>
						</div>
						<div class="span-4">	
							<label class="form-label" for="phone">Phone</label><br>
							<input type="text" name="phone" value="$vars{'phone'}" id="phone" style="width: 120px!important;" class="text">
						</div>
						<div class="span-4">	
							<label class="form-label" for="fax">Fax</label><br>
							<input type="text" name="fax" value="$vars{'fax'}" id="fax" style="width: 120px!important;" class="text">
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
									<a style="color:black; text-decoration: none;" target=_blank href="http://www.watchmanmonitoring.com/sample-offering/"><strong>Monitored Computers</strong></a><br>
									Active monitoring for impending failure for each computer with Watchman Monitoring. 
								</td>
								<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
									<span id="price_item_1">&#36;10</span>
								</td>
								<td valign="top" align="center" style="text-align: right;">
									<input type="text" name="qty_item_2" id="qty_item_2" value="$vars{'monitoring'}" size="2" style="text-align: right;"/>
								</td>
								<td valign="top" style="text-align: right;" align="right" id="total_item_2">
								</td>
							</tr>
							<tr>
								<td valign="top">
									<a style="color:black; text-decoration: none;" target=_blank href="http://www.watchmanmonitoring.com/sample-offering/"><strong>Family Pack</strong></a><br>
										Monitoring for a household's computers. 
									</td>
									<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
											<span id="price_item_8">&#36;15</span>
									</td>
									<td valign="top" align="center" style="text-align: right;">
										<input type="text" name="qty_item_8" id="qty_item_8" value="$vars{'monitoring-family'}" size="2" style="text-align: right;"/>
									</td>
									<td valign="top" style="text-align: right;" align="right" id="total_item_8">
								</td>
							</tr>
							<tr >
								<td valign="top">
									<strong>Managed Computers</strong><br>
									Active monitoring for pending failures, as well as system & application patch management.
								</td>
								<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
									<span id="price_item_4">&#36;35</span>
								</td>
								<td valign="top" align="center" style="text-align: right;">
									<input type="text" name="qty_item_4" id="qty_item_4" value="$vars{'managed'}" size="2" style="text-align: right;"/>
								</td>
								<td valign="top" style="text-align: right;" align="right" id="total_item_4">
								</td>
							</tr>
							<tr>
								<td valign="top">
									<strong>Managed Mac Servers</strong><br>
									Active monitoring, maintenance updates &amp; manual verification of backup systems.
								</td>
								<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
									<span id="price_item_3">&#36;100</span>
								</td>
								<td valign="top" align="center" style="text-align: right;">
									<input type="text" name="qty_item_3" id="qty_item_3" value="$vars{'servers'}" size="2" style="text-align: right;"/>
								</td>
								<td valign="top" style="text-align: right;" align="right" id="total_item_3">
						
								</td>
							</tr>
							<tr >
								<td valign="top">
									<strong>Managed Windows Servers</strong><br>
									Active monitoring, maintenance updates, verification of backup systems and antivirus.
								</td>
								<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
									<span id="price_item_5">&#36;150</span>
								</td>
								<td valign="top" align="center" style="text-align: right;">
									<input type="text" name="qty_item_5" id="qty_item_5" value="$vars{'winservers'}" size="2" style="text-align: right;"/>
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
									<a style="color:black; text-decoration: none;" target=_blank href="http://www.watchmanmonitoring.com/sample-offering/"><strong> Personal Support Users</strong></a><br>
									The total number of people who will be contacting MyCompany, Inc. for technical support.<br>
								</td>
								<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
									<span id="price_item_2">&#36;25</span>
								</td>
								<td valign="top" align="center" style="text-align: right;">
									<input type="text" name="qty_item_1" id="qty_item_1" value="$vars{'personal'}" size="2" style="text-align: right;"/>
								</td>
								<td valign="top" style="text-align: right;" align="right" id="total_item_1">
								</td>
							</tr>
							<tr>
								<td valign="top">
										<a style="color:black; text-decoration: none;" target=_blank href="http://www.watchmanmonitoring.com/sample-offering/"><strong>Premier Support Users</strong></a><br>
									(Per Person, 5 User minimum)<br/>
									All needed email, phone, and remote support
								</td>
								<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
									<span id="price_item_7">&#36;70</span>
								</td>
								<td valign="top" align="center" style="text-align: right;">
									<input type="text" name="qty_item_7" id="qty_item_7" value="$vars{'premier'}" size="2" style="text-align: right;"/>
								</td>
								<td valign="top" style="text-align: right;" align="right" id="total_item_7">
								</td>
							</tr>
							<tr >
								<td valign="top">
									<strong>Monthly Prepaid Hours</strong><br>
									(2 hours per month minimum)<br/>
									1/3 off our stock hourly rate<br>
								</td>
								<td valign="top" align="right" style="padding-right: 10px; text-align: right;">
									<span id="price_item_6">&#36;100</span>
								</td>
								<td valign="top" align="center" style="text-align: right;">
									<input type="text" name="qty_item_6" id="qty_item_6" value="$vars{'hours'}" size="2" style="text-align: right;"/>
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
									<span style="font-size: 10px;"><input type="checkbox" style="" name="billAnnually" value="0.90" id="billAnnually"/>If you would prefer to pay annually,<br>we offer a 10% convenience discount.</span>
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
|;

print $output;
