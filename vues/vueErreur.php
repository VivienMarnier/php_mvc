<?php 
$titre = "Une erreur est survenue";

ob_start();
?>
<p class='alert alert-danger'>
<?php echo "Une erreur est survenue sur le site internet <br/>" . $erreur;?>
</p>
<?php

$contenu = ob_get_clean();
require('gabarit.php');
?>