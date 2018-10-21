<?php $title = 'Liste des membres'; ?>

<?php ob_start(); ?>

    <h2 class  ='pageList'>Liste des membres</h2>


<div class="container1">

  <div>
      <ul class="pagination1">
        <li id="previous-page"><a href="javascript:void(0)" aria-label=Previous><span aria-hidden=true>&laquo;</span></a></li>
      </ul>
    </div>
<div class="page1">
<?php
while ($user = $users->fetch()) :
?>

<div class="commentaires">
    <a href="javascript:void(0)" class="list-group-item active"></a>

      
        <p>Pseudo : <?= htmlspecialchars($user['pseudo']); ?></p>

        <p>Enregistré le : <?= htmlspecialchars($user['registration_date']); ?></p>

        <p>Adresse email : <?= htmlspecialchars($user['email']); ?></p>

        <div class ="reponse">
            <?php 
            ////////////////////// SUPPRIMER UNIQUEMENT LE GROUPE 2(USER) //////////////////////////
            if(htmlspecialchars($user['id_group'])== 2) :?>
            <em><a href="index.php?action=deleteUser&amp;id_user=<?= $user['id']; ?>" OnClick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">Supprimer</a></em>
            <?php 
            endif;?>

    </div>
</div>
<?php
endwhile;?>
</div>        
</div>
<?php $users->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>