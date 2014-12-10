<div id="zone-travail">
<div id="article_formulaire">

<form method="post" action="<?= site_url('/article_c/valideModifierArticle/');?>" >
<fieldset>
<legend>Modifier un article</legend>

<input type="hidden" name="article_id" value="<?= $id ?>" >
<label for="article_titre">Titre (*):</label>
    <input type="text" name="article_titre" value="<?php echo set_value('article_titre',$titre);?>" />
<?php echo form_error('article_titre','<span class="error">',"</span>"); ?>
<label for="article_themes">Theme (*):</label>
    <select name="themes" required="true" class="form-control">
        <option selected value="<?= $id_theme ?>"><?= $libelle ?></option>
        <?php if(isset($themes)): ?>
            <?php foreach ($themes as $value): ?>
                <option value="<?= $value->id; ?>"><?= $value->libelle; ?></option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
    <?= form_error('article_theme','<span class="error">',"</span>"); ?>
<label for="article_contenu">Contenu (*): </label>
<textarea name="article_contenu" style="height:500px"><?php echo set_value('article_contenu',$contenu);?></textarea>
<?php echo form_error('article_contenu','<span class="error">',"</span>"); ?><br>

<p id="article_information"> * : champs obligatoires </p>
<input type="submit" class="button" name="article_soumettre" value="Valider" onclick="return(confirm('Êtes-vous sûr de vouloir modifier cet article ?'));">
</fieldset>
</form>
</div>
</div>