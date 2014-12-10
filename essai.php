<?php
session_start();

require "vendor/autoload.php";

use Gregwar\Captcha\CaptchaBuilder;

$builder = new CaptchaBuilder;
$builder->build();

//$builder->save('out.jpg');



echo $_SESSION['phrase'];
if(isset($_POST['entree']))
	{
		if($_SESSION['phrase']==$_POST['entree']) {
    			echo "ok";
			}
		else {
   				echo "**pas ok**";

			}
	}

$_SESSION['phrase'] = $builder->getPhrase();
echo $_SESSION['phrase'];

?>

<img src="<?php echo $builder->inline(); ?>" />

<form action"essai.php" method="post">
	<input name="entree" type="text">
	<input name="valider" type="submit">
</form>