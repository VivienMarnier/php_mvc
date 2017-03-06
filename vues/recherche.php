<?php
$titre = $_GET['research'] ." - PartageTaVideo";
ob_start();
?>
<h1>Résultat de votre recherche</h1>
<hr/>
<?php
	if(count($videos)> 0)
	{
		foreach($videos as $video)
		{
?>
			<div class="row text-center">
				<div class="col-md-12 ">
					<div class="col-md-4 col-sm-6 hero-feature">
						<div class="thumbnail">
							<a href='index.php?action=video&video_id=<?php echo $video->getVideo_id(); ?>'><img src="http://img.youtube.com/vi/<?php echo $video->getVideo_youtube_id(); ?>/mqdefault.jpg" alt=""></a>
							<div class="caption">
							<h3><?php echo $video->getVideo_title();?></h3>
							<p><span class="glyphicon glyphicon-time"></span> Postée le <?php echo $video->getVideo_date_upload(); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
		?>
			<nav aria-label="Page navigation">
			<ul class="pagination">
				<li>
					<a href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
			<?php
				for($i=1;$i<=$nb_pages;$i++)
				{
			?>
					<li><a href="#"><?php echo $i; ?></a></li>
			<?php
				}
			?>
				<li>
					<a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
			</ul>
			</nav>
	<?php	
	}
	else
	{
	?>
		<strong>Aucun résultat pour la recherche.</strong>
	<?php
	}
	?>
<?php 
$contenu = ob_get_clean();
require('gabarit.php');
?>