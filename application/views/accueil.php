<div class="row" xmlns="http://www.w3.org/1999/html">

    <div class="large-9 columns" role="content">
       <article>
            <?php if($articles != null): ?>
                <?php foreach ($articles as $r): ?>
                <fieldset class="article">
                    <h3 class="titre-article"><?= $r->titre ?></h3>
                    <h6>Written by <kbd><?= $r->login; ?></kbd> on <kbd><?= $r->date_creation; ?></kbd></h6>
                    <hr />
                    <div class="row">
                        <?php echo ellipsize($r->contenu, 500, .30); ?>

                        <br /><br /><a class="left" href="<?= site_url('/article_c/afficherUnArticle/'.$r->id); ?>"><i class="fi-arrow-right"></i> Lire en entier</a><br />
                    </div>
                    <?php if ($this->session->userdata('droit') ==1 || $this->session->userdata('login') == $r->login) { ?>

                    <hr />
                    <div class="options"><div class="row">
                        <div class="small-2 large-4 columns"><a class="lienOption" href="<?= site_url('/article_c/formModifierArticle/'.$r->id); ?>"><i class="fi-widget"></i> Modifier</a></div>
                        <div class="small-4 large-4 columns"><a class="lienOption" href="<?= site_url('/article_c/supprimerArticle/'.$r->id);?>" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cet article ?'));"><i class="fi-trash"></i> Supprimer</a></div>
                        <div class="small-6 large-4 columns"><div class="lienOption modif">Dernière modification : <?= $r->date_modification ?></div></div>
                    </div></div>
                    <?php } else { ?>
                    <hr />
                    <div class="ModifOnLeft">Dernière modification : <?= $r->date_modification ?></div>
                    <?php } ?>
                </fieldset>
                <?php endforeach; ?>
            <?php endif; ?>
        </article>
    </div>


    <aside class="large-3 columns">
        <h5>Catégories</h5>
        <ul class="side-nav">
        <?php if(isset($themes)): ?>
            <?php foreach ($themes as $value): ?>
                <li><a href="#"><?= $value->libelle; ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
        </ul>
        <div class="panel">
            <h4>Le saviez-vous ?</h4>
            <p class="dyk"><?= $didyouknow[0]->contenu; ?></p>
        </div>
    </aside>

</div>
