<?php
// PATH TO THE FB-PHP-SDK
require_once 'src/facebook.php';
$facebook = new Facebook(array(
  'appId'  => '201415399962503',
	'secret' => 'f96b635e8896fe8cf81b6c366283c14c',
));
 
$user = $facebook->getUser();
$loginUrl = $facebook->getLoginUrl();
 
if ( empty($user) ) {
echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
    echo("<script> top.location.href='" . $loginUrl . "'</script>");
    exit();
}
?>
<!doctype html>
<html>
<head>
<title>How To: Send An Application Request Using The Facebook Graph API - MasteringAPI.com</title>
</head>
<body>

<div id="fb-root"></div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId: '201415399962503',
            status: true,
            cookie: true,
            oauth: true
        });
    };
 


$('a').click(sendRequestToRecipients);
function sendRequestToRecipients() {
  FB.ui({method: 'apprequests',
    message: 'My Great Request',
    to: '100001587775101'
  }, requestCallback);
}
 
 /*
     function sendRequest() {
        FB.ui({
            method: 'apprequests',
            message: 'Check out this application!',
            title: 'Send your friends an application request',
        },
        function (response) {
            $.post('handle_requests.php',{uid: <?php echo $user; ?>, request_ids: requests},function(resp) {
                    // callback after storing the requests
                });
            } else {
                alert('canceled');
            }
        });
        return false;
    }
 
 */
 
      // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     d.getElementsByTagName('head')[0].appendChild(js);
   }(document));
</script>
 
<a href="#">Send Application Request</a>
 
</body>
</html>

