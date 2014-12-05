<div id="zone-travail">
<table>
    <caption>Récapitulatifs des articles</caption>
    <thead>
    <tr height="50">
        <th>Auteur</th>
        <th>Titre</th>
        <th>Thème</th>
        <th>Date de création</th>
        <th>Date de modification</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?php if($articles != null): ?>
        <?php foreach ($articles as $r): ?>
            <tr>
                <td><?= $r->login; ?></td>
                <td><?= $r->titre; ?></td>
                <td><?= $r->libelle;?></td>
                <td><?= $r->date_creation; ?></td>
                <td><?= $r->date_modification; ?></td>
                <td>
                    <a href="<?= site_url('/article_c/formModifierArticle/'.$r->id); ?>"><img src="<?= base_url(); ?>edit.png" /></a>
                </td>
                <td>
                    <a href="<?= site_url('/article_c/supprimerArticle/'.$r->id);?>" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cet article ?'));"><img src="<?= base_url(); ?>delete.png"/></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    <tbody>
</table>
</div>