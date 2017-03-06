<?php 
$titre = "Vous regardez - " .$video->getVideo_title();
ob_start();

?>
<h1>Vous regardez :</h1>
<h2><?php echo $video->getVideo_title();?></h2>
<iframe width="750" height="450" src="<?php echo $video->getIframeLink(); ?>" frameborder="0"></iframe>
<h3><a href="<?php echo $video_author->getUrl();?>"><?php echo $video_author->getUser_name(); ?></a></h3>
<?php 
$contenu = ob_get_clean();
require('gabarit.php');
?>