<article>

    <fieldset class="article">
        <h3 class="titre-article"><?= $article[0]->titre ?></h3>
        <h6>Written by <?= $article[0]->login ?> on <?= $article[0]->date_creation ?></h6>
        <div class="row">
            <?php echo $article[0]->contenu ?>
        </div>
        <?php if ($this->session->userdata('droit') ==1 || $this->session->userdata('login') == $article[0]->login) { ?>

            <div class="options"><div class="row">
                    <div class="small-2 large-4 columns"><a class="lienOption" href="<?= site_url('/article_c/formModifierArticle/'.$article[0]->id); ?>">Modifier</a></div>
                    <div class="small-4 large-4 columns"><a class="lienOption" href="<?= site_url('/article_c/supprimerArticle/'.$article[0]->id);?>" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cet article ?'));">Supprimer</a></div>
                    <div class="small-6 large-4 columns"><div class="lienOption">Dernière modification : <?= $article[0]->date_modification ?></div></div>
                </div></div>
        <?php } else { ?>
            <div class="ModifOnLeft">Dernière modification : <?= $article[0]->date_modification ?></div>
        <?php } ?>

        <fieldset>
        <legend>Commentaires</legend>

        <?php if($commentaire): ?>
            <table style="width: 100%">
            <?php foreach ($commentaire as $value): ?>
                <tr><td><?= $value->auteur ?> : <?= $value->commentaire ?></td></tr>
            <?php endforeach; ?>
            </table>
        <?php endif; ?>
        <form method="POST" action="<?= site_url('/article_c/validCommentaire/'.$article[0]->id); ?>">
            <textarea name="contenu"></textarea>
            <input type="submit">
        </form>
        </fieldset>

    </fieldset>

</article>