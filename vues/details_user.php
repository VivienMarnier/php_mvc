<?php
$titre = "Vous êtes sur le profil de " .$user->getUser_name();
ob_start();
?>
<h1>Vidéos de : <?php echo $user->getUser_name(); ?></h1>
<div class="row">
	<div class="col-md-12">
		<div class="row text-center">
		<?php
			if(count($videos)> 0)
			{
				foreach($videos as $video)
				{
		?>
					<div class="col-md-4 col-sm-6 hero-feature">
						<div class="thumbnail">
							<a href='index.php?action=video&video_id=<?php echo $video->getVideo_id(); ?>'><img src="http://img.youtube.com/vi/<?php echo $video->getVideo_youtube_id(); ?>/mqdefault.jpg" alt=""></a>
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