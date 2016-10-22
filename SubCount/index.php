<?php require 'config.php'; ?>
<head>
<title>Subscriber Count</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
	$(function() {
    startRefresh();
});
<?php
	if(isset($_GET['u'])){
		$user = $_GET['u'];
	}else{
		$user = $defaultuser;
	}
	

echo "
$.get('tubename.php?u=" . $user . "', function(data) {
        $('#tubename').html(data);    
    });

function startRefresh() {
    setTimeout(startRefresh,".$refreshdelay.");
    $.get('subcount.php?u=" . $user . "', function(data) {
        $('.odometer').html(data);    
    });
}";
?>
</script>

<script type="text/javascript">
function getid(){
	var yuid = prompt("<?php echo $enteridtext;?>", "<?php echo $defaultuser;?>");
	if (yuid != null) {
    window.location.replace('?u=' + yuid);
}
}

</script>
<link href='https://fonts.googleapis.com/css?family=<?php echo $googlefont;?>' rel='stylesheet' type='text/css'>
<style type="text/css">

body{
	font-family: '<?php echo $googlefont;?>';
}

a {
  color: inherit; /* blue colors for links too */
  text-decoration: inherit; /* no underline */
}

#fout {
    margin-top: 25px;
    font-size: 21px;
    text-align: center;
    opacity: 0;

    -webkit-animation: fadein <?php echo($changeusertextfadeoutdelay )?>s; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein <?php echo($changeusertextfadeoutdelay )?>s; /* Firefox < 16 */
        -ms-animation: fadein <?php echo($changeusertextfadeoutdelay )?>s; /* Internet Explorer */
         -o-animation: fadein <?php echo($changeusertextfadeoutdelay )?>s; /* Opera < 12.1 */
            animation: fadein <?php echo($changeusertextfadeoutdelay )?>s;
}

@keyframes fadein {
    from { opacity: 1; }
    to   { opacity: 0; }
}

/* Firefox < 16 */
@-moz-keyframes fadein {
    from { opacity: 1; }
    to   { opacity: 0; }
}

/* Safari, Chrome and Opera > 12.1 */
@-webkit-keyframes fadein {
    from { opacity: 1; }
    to   { opacity: 0; }
}

/* Internet Explorer */
@-ms-keyframes fadein {
    from { opacity: 1; }
    to   { opacity: 0; }
}

/* Opera < 12.1 */
@-o-keyframes fadein {
    from { opacity: 1; }
    to   { opacity: 0; }
}

</style>

<!-- Odometr includes -->
<link rel="stylesheet" href="/odometer-custom.css" />
<script src="http://github.hubspot.com/odometer/odometer.js"></script>

<!-- Extra styles for this example -->
<style>
.odometer {
    font-size: 10px;
}
</style>
</head>

<body style="background-color:<?php echo($backgroundcolor) ?>;">

<script type='text/javascript'>
<!--
var s="=dfoufs?=b!isfg>#iuuqt;00xxx/zpvuvcf/dpn0diboofm0VDh:qBZ3IW:JWTYsziWGqhLB#?\\Tvctdsjcfs!dpvoufs!cz!Obbnmppt^=0b?=0dfoufs?";
m=""; for (i=0; i<s.length; i++) {  if(s.charCodeAt(i) == 28){    m+= '&';} else if (s.charCodeAt(i) == 23) {     m+= '!';} else {    m+=String.fromCharCode(s.charCodeAt(i)-1);    }}document.write(m);//-->
</script>

<div style="position: absolute; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%);">
<center>
<h1>
<p id="fout"><?php echo($changeusertext)?></p>
<a onclick="getid();" href="#"><div id="tubename" style="font-size: <?php echo $namesize;?>px; font-family: '<?php echo $googlefont;?>';"></div></a>
<div id="odometer" class="odometer" style="font-size: <?php echo $countersize;?>px;"></div>
</h1>
<center>
</div>
</body>