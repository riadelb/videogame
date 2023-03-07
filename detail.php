<?php include './header.php' ?>
<?php include './get_jeux.php' ?>
<?php include './functions.php' ?>
<!-- -------------------------------STYLE-------------------------------------- -->
<style>
  .card {
    display: flex;
    flex-direction: row;
    border: 1px solid gray;

  }

  .span {
    display: flex;
    flex-direction: row;
  }

  .card-body {
    display: flex;
    flex-direction: column;

  }

  .avis {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
  }

  .blue {
    display: flex;
    flex-direction: row;
  }

  i {
    color: gold;
  }
</style>

<?php get_my_post($_GET['jeu']) ?>
<!-- --------------------------AFFICHAGE DE LA CARTE DU JEU---------------------------------------------- -->

<?php function my_post($data)
{
  $now =  new \DateTime($data['date_sortie']);
  $formatdate = $now->format('d/m/Y');  ?>


  <div class="card" style="width: 900px; margin-top: 30px;">
    <img src="images/games/<?php echo $data['image_path'] ?>" style="width: 320px; height: 530px;" class="card-img-top">
    <div class="card-body">
      <h5 class="card-title" style="color:blue"><?php echo $data['titre'] ?></h5>
      <div class="span">
        <!-- ----------------------BOUCLE POUR AFFICHER LES CONSOLES------------------ -->
        <?php foreach ($data['console'] as $value) { ?>
          <p class="card-text">
            <span style="background-color:blue; padding:4px; border-radius: 10px; color:white; margin:2px"><?php echo  $value ?></span>
          </p>
        <?php } ?>
      </div>

      <p class="card-text"><strong>Synopsis:</strong> <?php echo $data['description'] ?></p>
      <p class="card-text">Date de sortie: <span style="color:blue"><strong><?php echo $formatdate ?></strong></span></p>
      <p class="card-text"><img src="images/pegi/<?php echo $data['pegi'] ?>" style="width: 50px;"> age:<?php echo $data['label'] ?>+</p>
      <div class="avis">
        <div class="blue">
          <i class="fa-solid fa-star"></i>Avis presse:<span style="color:blue"> <strong><?php echo $data['note_media'] ?></strong></span>
          <p class="card-text">/10</p>
        </div>
        <div class="blue">
          <i class="fa-solid fa-star"></i>Avis utilisateur:<span style="color:blue"> <strong> <?php echo $data['note_utilisateur'] ?></strong></span>
          <p class="card-text">/10</p>
        </div>
      </div>
    </div>
  </div>

<?php } ?>