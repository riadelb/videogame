<?php

global $connection;
require './get_jeux.php';
require './header.php';
?>

<div class="cartes">
  <?php while ($jeu = mysqli_fetch_assoc($res)) : 

    $prix = $jeu['prix']== 0 ? 'Gratuit' : $jeu['prix']/100 . '€'; 
?>
    <div class="card" style="width: 290px;">
      <img src="images/games/<?php echo $jeu['image_path']; ?>" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"><?php echo $jeu['titre'] ?></h5>
        <p class="card-text"><?php echo $prix ?></p>
        <a href="./detail.php?jeu=<?php echo $jeu['id'] ?>" class="btn btn-primary">Voir détail</a>
      </div>
    </div>
  <?php endwhile; ?>

</div>
</main>
</body>

</html>