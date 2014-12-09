<div id="zone-travail">
    <div id="article_formulaire">
        <form method="post" action="<?= site_url('/article_c/valideCreerArticle/');?>" >
            <fieldset>
                <legend>Ajouter un article</legend>
                <label for="article_titre">Titre (*) : </label>
                <input type="text" name="article_titre" value="" />
                <?= form_error('article_titre'); ?>
                <label for="article_themes">Theme (*):</label>
                <select name="themes" required="true" class="form-control">
                    <option selected value="NULL"></option>
                    <?php if(isset($themes)): ?>
                        <?php foreach ($themes as $value): ?>
                            <option value="<?= $value->id; ?>"><?= $value->libelle; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <?= form_error('article_theme'); ?>
                <label for="article_contenu">Contenu (*):</label>
                <textarea name="article_contenu" style="width:100%; height:200px"></textarea>
                <?= form_error('article_contenu'); ?>
                <p id="article_information"> * : champs obligatoires </p>
                <input  class="button" type="submit"  name="article_soumettre" value="Valider" onclick="return(confirm('Êtes-vous sûr de vouloir créer cet article ?'));"/>
            </fieldset>
        </form>
    </div>
</div>

