<?php
function afficher_epoques($bdd,$epoques)
{
	?>
	<section>
	<div class="jumbotron">
  <h1>Les époques</h1>   
<!-- Button trigger modal -->
<a type="button" class="btn btn-primary" href="<?= $_SERVER["REQUEST_URI"]?>/new">
  +
</a>


</div>
        <div class="row">
<?php
foreach ($epoques as $epoque)
{
?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <?php
			$filename="tmp/img/epoques/".$epoque['NomEpoque'].".jpg";
			if ( ! file_exists($filename)) {
			$filename="tmp/img/notfound.png";
			}
			?>
              <a href="#"><img class="card-img-top" src="<?= $filename ?>" alt="" width="700" height="200"></a>
			  
              <div class="card-body">
                <h4 class="card-title">
                  <a href="<?=$_SERVER["REQUEST_URI"]?>/show/<?= $epoque['NroEpoque']?>"><?= $epoque['NomEpoque'] ?></a>
                </h4>
                <p class="card-text"><?= $epoque['CommentEp'] ?></p>
              </div>
              <div class="card-footer">
                <!-- Button trigger modal -->
<a href="<?=  $_SERVER["REQUEST_URI"]?>/update/<?= $epoque['NroEpoque']?>" type="button" class="btn btn-success">
  Modifier
</a>

                <!-- Button trigger modal -->
<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete<?= $epoque['NroEpoque'] ?>" >
  Supprimer
</a>

<!-- Modal -->
<div class="modal fade" id="ModalDelete<?= $epoque['NroEpoque'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Vous Voulez vraiment supprimer  <span class="font-weight-bold" ><?= $epoque['NomEpoque'] ?> </span> ?
 
      </div>
      <div class="modal-footer">
	  <form method="post">
        <a  class="btn btn-secondary" data-dismiss="modal" href="/delete">Fermer</a>
        <a  href="<?=  $_SERVER["REQUEST_URI"]?>/delete/<?= $epoque['NroEpoque']?>" class="btn btn-danger">Supprimer</a>
		
		</form>
      </div>
    </div>
  </div>
</div>

			</div>
            </div>
          </div>
<?php
}
?>		  
      </div>
        <!-- /.row -->
		</section>
<?php
}
function form_add_epoque($bdd)
{
	?>
	<section>
	<div class="jumbotron">
  <h1>Ajouter une époque</h1>   

</div>
<form  method="post">
  <div class="form-group">
    <label for="NomEpoque">Nom de l'époque</label>
    <input type="text" class="form-control" id="NomEpoque" name ="NomEpoque" aria-describedby="NomEpoque" placeholder="Tapez le nom de l'époque" />
  </div>
<div class="form-group">
    <label for="nomEpoque">Commentaire de l'époque</label>
    <textarea type="text" class="form-control" id="CommentEp" name ="CommentEp" aria-describedby="CommentEp" placeholder="Tapez un commentaire de l'époque">
	
	</textarea>
  </div>
     
     <div class="modal-footer">
        <button  type="submit" class="btn btn-primary">Ajouter</button>
		</form>
      </div>
        <!-- /.row -->
		</section>
		
	<?php
}
function form_update_epoque($bdd,$id)
{
	require_once ('Models/epoquesModel.php');
	$epoque=get_epoque($bdd,$id);
	?>
	<section>
	<div class="jumbotron">
  <h1>Modifier une époque</h1>   

</div>
<form  method="post">
  <div class="form-group">
    <label for="NomEpoque">Nom de l'époque</label>
    <input type="text" class="form-control" id="NomEpoque" name ="NomEpoque" aria-describedby="NomEpoque" value="<?= $epoque['NomEpoque'] ?>" />
  </div>
<div class="form-group">
    <label for="CommentEp">Commentaire de l'époque</label>
    <textarea type="text" class="form-control" id="CommentEp" name ="CommentEp" aria-describedby="CommentEp">
	<?= $epoque['CommentEp'] ?>
	</textarea>
  </div>
 
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
		<input type="hidden" name="module" value="epoques" />
		<input type="hidden" name="NroEpoque" value="<?= $epoque['NroEpoque'] ?>" /></form>
		<!-- /.row -->
		</section>
	<?php
}
function show_epoque($bdd, $id)
{
	$epoque=get_epoque($bdd,$id);
	?>
	<section>
	<div class="jumbotron">
  <h1>Détails de l'époque <span> <?= $epoque['NomEpoque'];?><span></h1>   
</div>
        <div class="row">
		<div class="col-md-4">
		<?php
		$baseURL=dirname($_SERVER['SCRIPT_NAME']);
			$filename="tmp/img/epoques/".$epoque['NomEpoque'].".jpg";
			if ( ! file_exists($filename)) {
			$filename="tmp/img/notfound.png";
			}
			?>
			<img class="card-img-top" src="<?=$baseURL."/".$filename ?>" alt="" width="100%" height="100%">
		</div>
		<div>
		N° <span class="font-weight-bold" ><kbd><?=$epoque['NroEpoque']; ?></kbd></span>
		<h5>Epoque : <?=$epoque['NomEpoque']; ?></h5>
		<p><?= $epoque['CommentEp']?></p>
		<h5>Liste des dynasties</h5>
		<ul class="list-group list-group-flush">
		<?php
		$details=details_epoque($bdd,$epoque['NroEpoque']);
		foreach($details as $detail)
		{
			?>
			  <li class="list-group-item"><a href="<?=$baseURL;?>/dynasties/show/<?=$detail['NroDynastie']?>"><?= $detail['NomDynastie'] ?></a></li>
			<?php
		}
		?>
		</ul>
		</div>
		</div>
	
	<?php
	
}
?>
