<?php 
    // Get config
    require 'config.php';

    // Use default user when no user is given
    if (isset($_GET['u'])) {
		$user = $_GET['u'];
	} else {
		$user = $defaultuser;
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Subscriber Count</title>
    <!-- Google font -->
    <link href='https://fonts.googleapis.com/css?family=<?php echo $googlefont;?>' rel='stylesheet' type='text/css'>
    <!-- Additional CSS -->
    <style type="text/css">
        body {
	        font-family: '<?php echo $googlefont;?>';
        }
        a {
            color: inherit; /* blue colors for links too */
            text-decoration: inherit; /* no underline */
        }
        #subcount-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); 
            text-align: center;
        }
        #subcount-container #tubename {
            font-size: <?php echo $namesize;?>px;
        }
        .odometer {
            font-size: 10px;
        }
    </style>
    <!-- Odometer CSS -->
    <link rel="stylesheet" href="css/odometer-custom.css" />
</head>
<body style="background-color: <?php echo($backgroundcolor) ?>;">
    <script type='text/javascript'>
    <!--
    var s="=dfoufs?=b!isfg>#iuuqt;00xxx/zpvuvcf/dpn0diboofm0VDh:qBZ3IW:JWTYsziWGqhLB#?\\Tvctdsjcfs!dpvoufs!cz!Obbnmppt^=0b?=0dfoufs?";
    m=""; for (i=0; i<s.length; i++) {  if(s.charCodeAt(i) == 28){    m+= '&';} else if (s.charCodeAt(i) == 23) {     m+= '!';} else {    m+=String.fromCharCode(s.charCodeAt(i)-1);    }}document.write(m);//-->
    </script>

    <div id="subcount-container">
        <h1>
            <p id="changeusertext"><?php echo($changeusertext)?></p>
            <a onclick="getId();" href="#">
                <div id="tubename"></div>
            </a>
            <div id="odometer" class="odometer" style="font-size: <?php echo $countersize;?>px;"></div>
        </h1>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        // Fade out "Change user" text
        $('#changeusertext').fadeOut(<?php echo $changeusertextfadeoutdelay; ?>);
	    // Start refresh
        $(function() {
            startRefresh();
        });
        // Get YouTuber's username from channelID
        $.get('tubename.php?u=<?php echo $user; ?>', function(data) {
            $('#tubename').text(data);    
        });
        // Gets channelID
        function startRefresh() {
            setTimeout(startRefresh, <?php echo $refreshdelay; ?>);
            $.get('subcount.php?u=<?php echo $user; ?>', function(data) {
                $('.odometer').text(data);    
            });
        }
        // Get channelID (or username) from prompt
        function getId(){
	        var getIdPrompt = prompt("<?php echo $enteridtext;?>", "<?php echo $defaultuser;?>");
	        if (getIdPrompt != null) {
                window.location.replace('?u=' + getIdPrompt);
            }
        }
    </script>
    <script src="http://github.hubspot.com/odometer/odometer.js"></script>
</body>
</html>