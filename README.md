SupportAgreement
================

Simple agreement form / idea starter. Fork &amp; branch to see what works for you

A version of this agreement form is posted here:  
* http://www.watchmanmonitoring.com/sample-agreement



This agreement form is meant to be a launching board for your own offering.


* [Branch](https://help.github.com/articles/fork-a-repo#create-branches) this to help add features.  
* [Fork](https://help.github.com/articles/fork-a-repo) this to make your own copy.  
* [Create pull requests](https://help.github.com/articles/using-pull-requests) to help improve it later on.

Wish this would do something it didn't? [Create an issue!](https://github.com/watchmanmonitoring/SupportAgreement/issues)


System Requirements
==================
Any PHP capable web server (Apache, Nginx, IIs, etc)

Sendmail configured for outbound delivery.

A copy of this repo, edited to your liking.



Sample Installation Instructions
=================

Assumes you are starting with an existing website, which is only lacking this printable form.

Your mileage will vary, but these will work for a common Virtual Private Servers which are readily available from [Linode.com](https://www.linode.com/?r=ea518eaa5998a73ab056c3f5065607a3c55ff7f5) and [MediaTemple](http://www.mediatemple.net) etc


* Create a new folder named `agreement`
* [Download](https://github.com/watchmanmonitoring/SupportAgreement/releases/latest) a version of this form.
* Unzip and upload the contents into the `agreement` folder.
* Edit the [index.php](https://github.com/watchmanmonitoring/SupportAgreement/blob/master/sample-agreement-php/index.php) so that the words make sense to you, and the pricing is what you desire.
* Edit the words in the [agreement.php](https://github.com/watchmanmonitoring/SupportAgreement/blob/master/sample-agreement-php/agreement.php) file to match.
* Edit the email address near line 15 of `agreement.php` to send the agreements an address of your choosing.
* Ensure the agreement folder's permissions are 755 (owner can write, everyone else can read & open)
* Ensure the files in the folder are 744 (owner can write, everyone else can read)
* Test the site by filling out the form. Notice that name and email address are required, and test that the page carries out the math you desire.
* Ensure that you get copies of emails as you test the form.
* Direct your end users to `http://yourwebsite.com/agreement` - in most cases this will not effect your current site.
* Instruct your ends users to fill in the form with the agreement of their choosing, or [prefill](https://github.com/watchmanmonitoring/SupportAgreement/blob/master/README.md#prefilling-the-fields) the fields with a custom URL.
* Your end users can print the resulting page to paper or PDF, sign it, and send it in.
* Enter the agreement into your [Recurring Billing](http://www.watchmanmonitoring.com/community-access) solution.
* [Tell a friend.](http://www.watchmanmonitoring.com/refer)


Prefilling the fields #TODO
===============

These work in our Perl form, will be added to the PHP version.

Values:

monitoring  
monitoring-family  
managed  
servers  
winservers  
personal  
premier  
hours  




Examples:  
https://www.watchmanmonitoring.com/sample-agreement/?personal=2  
https://www.watchmanmonitoring.com/sample-agreement/?personal=2&monitoring=10  
https://www.watchmanmonitoring.com/sample-agreement/?personal=1&servers=2  
https://www.watchmanmonitoring.com/sample-agreement/?personal=2&monitoring=5&servers=1&hours=10  



