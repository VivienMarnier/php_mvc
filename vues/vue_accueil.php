<?php  
	$titre = "Accueil - Partage ta vidéo";
	ob_start();
?>
<div class="row">
	<div class="col-md-12">
		<div class="row text-center">
		<?php
			if(count($videos) > 0)
			{
				foreach($videos as $video)
				{
		?>
					<div class="col-md-4 col-sm-6 hero-feature">
						<div class="thumbnail">
							<a href=<?php echo $video->getLink(); ?>><img src="<?php echo $video->getThumbnailLink(); ?>" alt=""></a>
							<div class="caption">
							<h3><?php echo $video->getVideo_title();?></h3>
							<p><span class="glyphicon glyphicon-time"></span> Postée le <?php echo $video->getVideo_date_upload(); ?></p>
							</div>
						</div>
					</div>
		<?php
				}
			}
			else
			{
		?>
				<strong>Aucune vidéo disponible.</strong>
		<?php
			}
		?>
		
		</div>
	</div>
</div>

<?php
	$contenu = ob_get_clean();
	require('gabarit.php');
?>

