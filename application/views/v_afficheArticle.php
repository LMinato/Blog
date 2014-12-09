<article>

    <fieldset class="article">
        <h3 class="titre-article"><?= $titre ?></h3>
        <h6>Written by <?= $login ?> on <?= $date_creation ?></h6>
        <div class="row">
            <?php echo $contenu ?>
        </div>
        <?php if ($this->session->userdata('droit') ==1 || $this->session->userdata('login') == $login) { ?>

            <div class="options"><div class="row">
                    <div class="small-2 large-4 columns"><a class="lienOption" href="<?= site_url('/article_c/formModifierArticle/'.$id); ?>">Modifier</a></div>
                    <div class="small-4 large-4 columns"><a class="lienOption" href="<?= site_url('/article_c/supprimerArticle/'.$id);?>" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cet article ?'));">Supprimer</a></div>
                    <div class="small-6 large-4 columns"><div class="lienOption">Dernière modification : <?= $date_modification ?></div></div>
                </div></div>
        <?php } else { ?>
            <div class="ModifOnLeft">Dernière modification : <?= $date_modification ?></div>
        <?php } ?>

        <fieldset>
        <legend>Commentaires</legend>
        <div class="commentaires">
            <textarea></textarea>
        </div>
        </fieldset>

    </fieldset>

</article>