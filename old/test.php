<!DOCTYPE html>
<html>
    <head>
<script>
// We pre-filled your app ID in the widget URL: 'https://widget.intercom.io/widget/wky5oxpg'
(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/wky5oxpg';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(document.readyState==='complete'){l();}else if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
    </head>
    <body>
        <script>
            window.Intercom("boot", {
              api_base: "https://api-iam.intercom.io",
              app_id: "wky5oxpg",
              name: <?php echo json_encode("Muzahid Islam") ?>, // Full name
              email: <?php echo json_encode("muzahid991@gmail.com") ?>, // the email for your user
              created_at: "<?php echo strtotime("2024-01-02 06:12:34") ?>", // Signup date as a Unix timestamp
            });
       </script>
    </body>
    
</html>