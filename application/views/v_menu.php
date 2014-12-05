<div class="row">
    <div class="large-12 columns">
        <div class="nav-bar right">
            <ul class="button-group">
                <li><a href="<?= site_url('/article_c/formCreerArticle/');?>" class="button">Créer</a></li>
                <li><a href="<?= site_url('/article_c/afficherArticle/');?>" class="button">Opérations</a></li>
                <?php if ($this->session->userdata('droit') ==1 || $this->session->userdata('droit') ==2 ) echo "blublu";
                        else {?>

                <li><a href="#" class="button">Se connecter</a></li>
                <li><a href="#" class="button">S'inscrire</a></li>
                <?php } ?>
            </ul>
        </div>
        <h1><a href="<?= site_url();?>">Blog </a><small>This is my blog. It's awesome.</small></h1>
        <hr/>
    </div>
</div>