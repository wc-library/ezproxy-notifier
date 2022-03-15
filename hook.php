<?php

$adminEmail = 'admin@example.edu';
$emailAddresses = 'eresources@example.edu,admin@example.edu';


if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    $protocol = 'https://';
}else {
    $protocol = 'http://';
}

function ignoreMail(){
                $message = "Someone went directly to this form: ". htmlspecialchars($_GET['url']);
                mail($adminEmail, 'EZProxy Host warning triggered erroneously', $message);
                exit;

}

$thisServer = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if ($_GET) {

        switch ($_GET['url']){
                //Add additional cases for other URLS that we don't want
                case $thisServer:
                        ignoreMail();
                
                default:
                        $message = 'Someone tried to access this address which is not in the host list: '. htmlspecialchars($_GET['url']);
                        mail($emailAddresses, 'EZProxy Host needed', $message);
                        return http_response_code(200);

        }
}
?>