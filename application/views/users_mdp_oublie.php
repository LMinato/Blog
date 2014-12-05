<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= $titre?></title>
	<link rel="stylesheet" href="<?= base_url(); ?>monCSS/mesStyles1.css" >
</head>
<body>

<div id="container">
    <div>
        <h1>Mot de passe oublié</h1>
        <?php echo form_open('users_c/mdp_oublie'); ?>

        <label for="email">email:</label>
        <input type="text" name="email" value="<?php echo set_value('email');?>" />
        <?php echo form_error('email','<span class="error">',"</span>");?>
        <?php if(isset($erreur))echo '<span class="error">'.$erreur."</span>";?> <br>
        <input type="submit" value="Envoyer" />

        <?php echo form_close(); ?>
        <p><?= anchor('users_c','Retour')?></p>
	</div>

	<p class="footer">DUT info Belfort <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>