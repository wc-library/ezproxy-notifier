// Wrap this in a <script> tag in your needhost.htm file

// Set webhook to the path where the hook.php lives
var webhook = `https://example.edu/ezproxyHostNeeded/hook.php?url=${window.location}`

fetch(webhook)
    .then(function (response) {
        return response.json();
    })
    .then(function (myJson) {
        console.log(JSON.stringify(myJson));
    });


