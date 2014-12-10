<div id="zone-travail">
    <div id="article_formulaire">
        <form method="post" action="<?= site_url('/article_c/valideCreerArticle/');?>" >
            <fieldset>
                <legend>Ajouter un article</legend>
                <label for="article_titre">Titre (*) : </label>
                <input type="text" name="article_titre" value="" />
                <?php echo form_error('article_titre','<span class="error">',"</span>");?>
                <label for="article_themes">Theme (*):</label>
                <select name="themes" required="true" class="form-control">
                    <option selected value="NULL"></option>
                    <?php if(isset($themes)): ?>
                        <?php foreach ($themes as $value): ?>
                            <option value="<?= $value->id; ?>"><?= $value->libelle; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <?= form_error('article_theme','<span class="error">',"</span>"); ?>
                <label for="article_contenu">Contenu (*):</label>
                <textarea name="article_contenu" style="width:100%; height:200px"></textarea>
                <?= form_error('article_contenu','<span class="error">',"</span>"); ?>
                <p id="article_information"> * : champs obligatoires </p>

                <?php if(isset($erreur))echo '<span class="error">'.$erreur."</span>";?>
                <input  class="button" type="submit"  name="article_soumettre" value="Valider" onclick="return(confirm('Êtes-vous sûr de vouloir créer cet article ?'));"/>

                <?php echo form_close(); ?>

            </fieldset>
        </form>
    </div>
</div>

