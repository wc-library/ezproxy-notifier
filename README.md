#ezproxy-notifier

## Setup
1. Put the `emailNotice.php` file on a web server that can be reached from your ezproxy host.
2. Change the email address variables at the top. `emailAddresses` are where a needhost notification will be sent. `adminEmail` is notified when someone triggers the form by directly visiting the form. This was primarily to avoid false positives, but still be made aware if the form was somehow being made available. 
3. Add ```<iframe id="emailNotice" src="//example.edu/ezproxyHostNeeded/emailNotice.php" frameboarder="0" style="display:none"></iframe>``` to the bottom of your `docs/needhost.htm` file, making sure the src attribute points to the `emailNotice.php` file you just customized and made available. 