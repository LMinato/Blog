<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= $titre?></title>
</head>
<body>

<div id="container">
    <div class="login">
        <?php if($titre=="connexion"):?>
        <h1>Page de connexion</h1>

        <?php echo form_open('users_c/aff_connexion'); ?>
            <label for="login">Login : </label>
            <input type="text" name="login" value="<?php echo set_value('login');?>" />
            <?php echo form_error('login','<span class="error">',"</span>");?>
            <br>
            <label for="pass">Mot de passe : </label>
            <input type="password" name="pass" value="<?= set_value('pass');?>" />
            <?php echo form_error('pass','<span class="error">',"</span>");?>
            <?php if(isset($erreur))echo '<span class="error">'.$erreur."</span>";?>
            <br />

            <input type="submit" value="Connexion" />
            <br />
            <?php echo form_close(); ?>
            <br />
            <p><?= anchor('users_c/inscription','Inscrivez vous!')?></p>
            <p><?= anchor('users_c/mdp_oublie','Mot de passe oublié ?')?></p>
        <?php endif?>
        <?php if($titre=="deconnexion"):?>
            <?php echo form_open('users_c/deconnexion'); ?>
            <input type="submit" value="deconnexion" />
            <?php echo form_close(); ?>
        <?php endif?>

	</div>
</div>

</body>
</html>