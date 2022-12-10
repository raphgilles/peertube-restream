<!DOCTYPE html>
<html lang='fr'>
<head>
	<title>YouTube Playlist > PeerTube</title>
    <meta http-equiv="Content-Language" content="fr-FR">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="../style.css" type="text/css" />
	<link rel="stylesheet" href="../pace.css" type="text/css" />
	<link rel="icon" type="../image/png" href="../images/favicon.png" />
	<script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
	<script src="../pace.min.js"></script>
	<script>
paceOptions = {
   ajax: {
         trackMethods: ['GET', 'POST', 'DELETE', 'PUT', 'PATCH']
   }
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

<body>

<div class="header">
  <p><a href="https://tooter.social/@raph" id="headerlink">Mastodon</a> <a href="https://peertube.stream/accounts/raph" id="headerlink">PeerTube</a></p>
</div>

   <h1 style="text-align:center; margin-top:100px;">Streamer une playlist YouTube sur PeerTube</h1>
	
<div class="illustration" style="padding-bottom:75px;">

<form action="golive.php" method="post" enctype="multipart/form-data">

<h3 style="text-align:left; font-family:robotolight; margin-top:75px;">URL de l'instance (sans https:// et sans le / à la fin)</h3>
<textarea name="instance" class="inputvideo" required></textarea>

<h3 style="text-align:left; font-family:robotolight; margin-top:25px;">Clé de diffusion du direct</h3>
<input name="cledirect" class="inputtitre" rows="1" type="password" required></textarea>

<h3 style="text-align:left; font-family:robotolight; margin-top:25px;">Url de la playlist YouTube</h3>
<textarea name="lienyoutube" class="inputtitre" rows="1" required></textarea>
<div style="margin-top:75px; text-align:left;"><strong>Important :</strong><br />
<ul>
<li>Les restreams sont limités à une durée d'une heure.</li>
<li>Il arrive que YouTube rejette le restream. Si votre live s'arrête sur PeerTube, relancez-le depuis cette page.</li>
<li>Le live doit être déjà lancé sur YouTube avant d'appuyer sur le bouton ci-dessous.</li>
</ul>
</div>
<input type="submit" class="inputsubmit" value="GO !">

</div>

<div style="text-align:center; margin-bottom:100px; ">
Pour me soutenir financièrement :<br />
<a href="https://fr.liberapay.com/raph/" target="_blank" title="Liberapay"><img src="https://img.shields.io/liberapay/goal/raph?label=Objectif%20atteint%20%C3%A0&style=social" alt="Soutien financier" style="padding-top:8px;"/></a>
</div>

<div class="footer">
  <p><img src="../images/peertube.png" style="height:25px; vertical-align:-7px; margin-right:5px;" /> <a href="https://joinpeertube.org/instances" id="footerlink">Trouver une instance PeerTube</a></p>
</div>
</body>
</html>