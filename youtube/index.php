<!DOCTYPE html>
<html lang='fr'>
<head>
	<title>YouTube Live > PeerTube</title>
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

<?php include __DIR__."/../header.php" ?>

<?php exec("pgrep ffmpeg", $pids);
if(empty($pids)) { ?>

   <h1 style="text-align:center; margin-top:100px;">Restreamer un live YouTube sur PeerTube</h1>
	
<div class="illustration" style="padding-bottom:75px;">

<form action="golive.php" method="post" enctype="multipart/form-data">

<h3 style="text-align:left; font-family:robotolight; margin-top:75px;">URL de l'instance PeerTube</h3>
<textarea name="instance" class="inputvideo" required></textarea>

<h3 style="text-align:left; font-family:robotolight; margin-top:25px;">Clé de diffusion du direct</h3>
<input name="cledirect" class="inputtitre" rows="1" type="password" required></textarea>

<h3 style="text-align:left; font-family:robotolight; margin-top:25px;">Url du live YouTube</h3>
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

<?php
  } 
else { ?> 

<div style="width:560px; margin:auto; margin-top:150px; text-align:center;"><a href="https://restream.peertube.stream/"><img src="../images/logo-restream.png" alt="Rediffuser un live" style="max-width:560px; margin-bottom:50px;" /></a><br /></div>

<div class="bubble">
<div class="bubble-text-warning">
Un live est déjà en cours. Merci de revenir plus tard (au maximum dans 1 heure).
</div>
</div>

<div style="margin-top:50px; text-align:center;">
Pour me soutenir financièrement :<br />
<a href="https://fr.liberapay.com/raph/" target="_blank" title="Liberapay"><img src="https://img.shields.io/liberapay/goal/raph?label=Objectif%20atteint%20%C3%A0&style=social" alt="Soutien financier" style="padding-top:8px;"/></a>
</div>

<?php } ?>

<?php include __DIR__."/../footer.php" ?>

</body>
</html>