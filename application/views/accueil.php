<div class="row" xmlns="http://www.w3.org/1999/html">

    <div class="large-9 columns" role="content">
       <article>
            <?php if($articles != null): ?>
                <?php foreach ($articles as $r): ?>
                <fieldset class="article">
                    <h3 class="titre-article"><?= $r->titre ?></h3>
                    <h6>Written by <?= $r->login; ?> on <?= $r->date_creation; ?></h6>
                    <div class="row">
                        <?php echo character_limiter($r->contenu,1200); ?>

                        <a href="<?= site_url('/article_c/afficherUnArticle/'.$r->id); ?>">Lire la suite</a>
                    </div>
                    <?php if ($this->session->userdata('droit') ==1 || $this->session->userdata('login') == $r->login) { ?>

                    <div class="options"><div class="row">
                        <div class="small-2 large-4 columns"><a class="lienOption" href="<?= site_url('/article_c/formModifierArticle/'.$r->id); ?>">Modifier</a></div>
                        <div class="small-4 large-4 columns"><a class="lienOption" href="<?= site_url('/article_c/supprimerArticle/'.$r->id);?>" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cet article ?'));">Supprimer</a></div>
                        <div class="small-6 large-4 columns"><div class="lienOption">Dernière modification : <?= $r->date_modification ?></div></div>
                    </div></div>
                    <?php } else { ?>
                    <div class="ModifOnLeft">Dernière modification : <?= $r->date_modification ?></div>
                    <?php } ?>
                </fieldset>
                <?php endforeach; ?>
            <?php endif; ?>
        </article>
    </div>


    <aside class="large-3 columns">
        <h5>Categories</h5>
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
