<div class="row">

    <div class="large-9 columns" role="content">
       <article>
            <?php if($articles != null): ?>
                <?php foreach ($articles as $r): ?>
                <fieldset class="article">
                    <h3 class="titre-article"><?= $r->titre ?></h3>
                    <h6>Written by <?= $r->login; ?> on <?= $r->date_creation; ?></h6>
                    <div class="row">
                        <?= $r->contenu; ?>
                    </div>
                    <div class="ModifOnLeft">Dernière modification : <?= $r->date_modification ?></div>
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
