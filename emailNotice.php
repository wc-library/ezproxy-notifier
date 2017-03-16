<?php

$adminEmail = 'admin@example.edu';
$emailAddresses = 'eresources@example.edu,admin@example.edu';

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    $protocol = 'https://';
}else {
    $protocol = 'http://';
}

$thisServer = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if ($_POST) {
        if($_POST['url']){
                if($_POST['url'] == $thisServer){
                        $message = "Someone went directly to this form: ". $_POST['url'];
                        mail($adminEmail, 'EZProxy Host warning triggered erroneously', $message);
                        exit;
                }else{
                        $message = 'Someone tried to access this address which is not in the host list: '. $_POST['url'];
                        mail($emailAddresses, 'EZProxy Host needed', $message);
                }
        }
}else{

?>

<html>
<head>
<script language="javascript">
function SubmitForm()
{
var url = (window.location != window.parent.location) ? document.referrer: document.location;
document.getElementById('url').value=url;


document.getElementById('frmID').submit();
}
</script>
</head>
<body onload="SubmitForm()">

<form name="frmID" id="frmID" method="post" action="emailNotice.php">
<input type="hidden" name="url" id="url" value="" />
<input type="submit" name="emailNoticeSubmit" id="emailNoticeSubmit" />
</form>

<script type="text/javascript">

</script>
<?php
}
?>