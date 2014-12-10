<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= $titre?></title>
	<link rel="stylesheet" href="<?= base_url(); ?>monCSS/mesStyles1.css" >
</head>
<body>

<div id="container">
    <div class="login">
        <h1>Inscription</h1>
        <?php echo form_open('users_c/inscription'); ?>

        <label for="login">Login : </label>
        <input type="text" name="login" value="<?php echo set_value('login');?>" />
        <?php echo form_error('login','<span class="error">',"</span>");?>

        <label for="email">E-mail : </label>
        <input type="text" name="email" value="<?php echo set_value('email');?>" />
        <?php echo form_error('email','<span class="error">',"</span>");?>

        <label for="pass">Mot de passe : </label>
        <input type="password" name="pass" value="<?= set_value('pass');?>" />
        <?php echo form_error('pass','<span class="error">',"</span>");?>

        <label for="pass2">Confirmation du mot de passe : </label>
        <input type="password" name="pass2" value="<?= set_value('pass2');?>" />
        <?php echo form_error('pass2','<span class="error">',"</span>");

        require "vendor/autoload.php";
        use Gregwar\Captcha\CaptchaBuilder;

        $builder = new CaptchaBuilder;
        $builder->build();

        $_SESSION['phrase'] = $builder->getPhrase();

        ?>

        <label class="captcha">Entrez le code de l'image ci-dessous : </label>
        <input type="hidden" name="captcha" value="<?= $_SESSION['phrase']; ?>" />
        <img src="<?= $builder->inline(); ?>" />
        <input type="text" name="entree_captcha" />
        <?= form_error('entree_captcha','<span class="error">',"</span>");

        if(isset($erreur))echo '<span class="error">'.$erreur."</span>";?>
        <input type="submit" value="Envoyer" />

        <?php echo form_close(); ?><br />
		<p><?= anchor('users_c/deconnexion','Se connecter')?></p>
        <p><?= anchor('users_c/mdp_oublie','Mot de passe oublié ?')?></p>
	</div>
</div>

</body>
</html>