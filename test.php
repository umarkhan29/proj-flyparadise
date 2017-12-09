<html>
<head>
<title>My Great Website</title>
</head>
   <body>
      <div id="fb-root"></div>
      <script src="http://connect.facebook.net/en_US/all.js">
      </script>
      <script>
         FB.init({ 
         appId:'133246520647341', cookie:true, 
                status:true, xfbml:true 
             });
        FB.login(function(response) {
          if (response.session && response.perms) {
            alert(response.perms);
          }
        }, {perms:'user_address, user_mobile_phone'});
        </script>
		
		
		
	<script src="http://connect.facebook.net/en_US/all.js#xfbml=1&
      appId=133246520647341"></script>
      <div id="fb-root"></div>
      <fb:login-button perms="user_address,user_mobile_phone">Login
      </fb:login-button>
	  
      <body>
<html>