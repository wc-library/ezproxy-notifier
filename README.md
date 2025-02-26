# ezproxy-notifier

Archived since we no longer use EZProxy and are not maintaining this tool. 
____
## Two variants
There are two versions. One is an iframe embed version. This is discouraged because it requires you to use a less strict cross site scripting setting. The other is a webhook version. 

## Setup webhook version
1. Put the `hook.php` file on a webserver that can be reached by your ezproxy users
2. Change the email address variables at the top. `emailAddresses` are where a needhost notification will be sent. `adminEmail` is notified when someone triggers the form by directly visiting the form. This was primarily to avoid false positives, but still be made aware if the form was somehow being made available. 
3. Add the contents of `emailNotice.js` to your `docs/needhost.htm` inside a `<script>` tag. Update the `webhook` variable to point at your `hook.php` file. 
4. Now, whenever the needhost.htm file is triggered, the hook.php file will send an email to alert staff. 
## Setup iframe version
1. Put the `emailNotice.php` file on a web server that can be reached from your ezproxy host.
2. Change the email address variables at the top. `emailAddresses` are where a needhost notification will be sent. `adminEmail` is notified when someone triggers the form by directly visiting the form. This was primarily to avoid false positives, but still be made aware if the form was somehow being made available. 
3. Add ```<iframe id="emailNotice"  src="//example.edu/ezproxyHostNeeded/emailNotice.php" frameboarder="0" style="display:none" referrerPolicy="unsafe-url"></iframe>``` to the bottom of your `docs/needhost.htm` file, making sure the src attribute points to the `emailNotice.php` file you just customized and made available. 
