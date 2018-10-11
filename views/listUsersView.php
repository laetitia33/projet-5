<?php $title = 'Liste des membres'; ?>

<?php ob_start(); ?>

    <h2 class  ='pageList'>Liste des membres</h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<?php

while ($user = $users->fetch()) :
    ?>
    <div class="commentaires">
      
        <p>
            Pseudo : <?= htmlspecialchars($user['pseudo']); ?>
       
        </p>
        <p>
            Enregistré le : <?= htmlspecialchars($user['registration_date']); ?>
        </p>
        <p>
            Adresse email : <?= htmlspecialchars($user['email']); ?>
        </p>
        <div class ="reponse">
            <em><a href="index.php?action=deleteUser&amp;id_user=<?= $user['id']; ?>">Supprimer</a></em>
        </div>
    </div>

    <?php
endwhile;
$users->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>