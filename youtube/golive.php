<?php
$heures   = 1;  // les heures < 24
$minutes  = 0;   // les minutes  < 60
$secondes = 0;  // les secondes  < 60

$annee = date("Y");  // par defaut cette année
$mois  = date("m");  // par defaut ce mois
$jour  = date("d");  // par defaut aujourd'hui

// quand le compteur arrive à 0
// -> redirection
$redirection = 'https://restream.peertube.stream/';

/*******************************************************************************
    * calcul des secondes
    ***************************************************************************/

$secondes = mktime(date("H") + $heures,
                            date("i") + $minutes,
                            date("s") + $secondes,
                            $mois,
                            $jour,
                            $annee
                            ) - time();
?>
<head>
	<title>YouTube Live > PeerTube</title>
    <meta http-equiv="Content-Language" content="fr-FR">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="../style.css" type="text/css" />
	<link rel="stylesheet" href="../pace.css" type="text/css" />
	<link rel="icon" type="image/png" href="../images/favicon.png" />
	<script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
	<script src="../pace.min.js"></script>
	<script>
paceOptions = {
   ajax: {
         trackMethods: ['GET', 'POST', 'DELETE', 'PUT', 'PATCH']
   }
}
	</script>

<script type="text/javascript">
var temps = <?php echo $secondes;?>;
var timer =setInterval('CompteaRebour()',1000);
function CompteaRebour(){

  temps-- ;
  j = parseInt(temps) ;
  h = parseInt(temps/3600) ;
  m = parseInt((temps%3600)/60) ;
  s = parseInt((temps%3600)%60) ;
  document.getElementById('minutes').innerHTML= (h<10 ? "0"+h : h) + '  h :  ' +
                                                (m<10 ? "0"+m : m) + ' mn : ' +
                                                (s<10 ? "0"+s : s) + ' s ';
if ((s == 0 && m ==0 && h ==0)) {
   clearInterval(timer);
   url = "<?php echo $redirection;?>"
   Redirection(url)
}
}
function Redirection(url) {
setTimeout("window.location=url", 500)
}
</script>

<!-- Matomo -->
<script type="text/javascript">
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//stats.4prod.com/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

</head>

<body onload="timer">

<div class="header">
  <p><a href="https://tooter.social/@raph" id="headerlink">Mastodon</a> <a href="https://peertube.stream/accounts/raph" id="headerlink">PeerTube</a></p>
</div>

<div style="width:560px; margin:auto; margin-top:150px; text-align:center;"><img src="../images/logo-restream.png" alt="Restream" style="max-width:560px;" /><br /></div>

<div class="illustration">


<?php

function cq($v){
        return htmlentities(addslashes($v));
}

$instance = cq("".$_POST['instance']."");
$cledirect = cq("".$_POST['cledirect']."");
$lienyoutube = cq("".$_POST['lienyoutube']."");

$contenu = 'ffmpeg -i "$(yt-dlp --no-part -g ' . $lienyoutube . ')" -c:v copy -c:a copy -f flv rtmp://' .$instance .':1935/live/' .$cledirect.'';


$filename = 'youtube-live.sh';
$somecontent = "Ajout de chaîne dans le fichier\n";
 
// Assurons nous que le fichier est accessible en écriture
if (is_writable($filename)) {
 
	// Dans notre exemple, nous ouvrons le fichier $filename en mode d'ajout
	// Le pointeur de fichier est placé à la fin du fichier
	// c'est là que $somecontent sera placé
	if (!$handle = fopen($filename, 'w')) {
		 echo "Impossible d'ouvrir le fichier ($filename)";
		 exit;
	}
 
	// Ecrivons quelque chose dans notre fichier.
	if (fwrite($handle, $contenu) === FALSE) {
		echo "Impossible d'écrire dans le fichier ($filename)";
		exit;
	}
 
	fclose($handle);
	
	$pid = exec("sh /home/stream/youtube/youtube-live.sh> /dev/null 2>&1 & echo $!; ", $output); ?>

<?php
// la condition est que le nombre de seconde soit etre superieur a 24 heures
if ($secondes <= 3600*24) {
?>

<div class="bubble">
<div class="bubble-text-golive" style="text-align:center;">
Votre restream a bien démarré et s'arrêtera dans
<div id="minutes" style="font-weight:bold;"></div>
</div>

<div class="bubble-text-youtube" style="margin-top:25px;">
<a href="stop.php" title="Arrêter le restream">Arrêter le restream</a>
</div>
</div>

<?php
 }
?>
	
<?php  
} else {
	echo "Le fichier $filename n'est pas accessible en écriture.";
}

?>

<script>
// Javascript code
window.onclose = closing;

function closing(){
  $.ajax({
     url: 'stop.php',
     data: yourdata,
     success: function(content){
          // empty
     }
  })
}

</script>

</div>

<div style="text-align:center;">
Pour me soutenir financièrement :<br />
<a href="https://fr.liberapay.com/raph/" target="_blank" title="Liberapay"><img src="https://img.shields.io/liberapay/goal/raph?label=Objectif%20atteint%20%C3%A0&style=social" alt="Soutien financier" style="padding-top:8px;"/></a>
</div>

<div class="footer">
  <p><img src="../images/peertube.png" style="height:25px; vertical-align:-7px; margin-right:5px;" /> <a href="https://joinpeertube.org/instances" id="footerlink">Trouver une instance PeerTube</a></p>
</div>

</body>
</html>