	<div class="jumbotron">
  <h1>Les pharaons</h1>   
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  +
</button>
<div class="float-right ">
  <a href="?module=pharaons&action=par_dynaste" class="float-right"><i class="fa fa-list"></i> Liste par dynastes</a>
    <a href="?module=pharaons&action=par_site" class="float-right"><i class="fa fa-list"></i> Liste par sites</a>

  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un pharaon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form>
<div class="form-group">
    <label for="NomPh">Nom du pharaon</label>
    <input type="text" class="form-control" id="NomPh" name ="NomPh" aria-describedby="NomPh" placeholder="Tapez le nom du phharaon" />
  </div>
  <div class="form-group">
    <label for="NomUsuel">Nom usuel du pharaon</label>
    <input type="text" class="form-control" id="NomUsuel" name ="NomUsuel" aria-describedby="NomPh" placeholder="Tapez le nom usuel du pharaon" />
  </div>
<div class="form-group">
    <label for="commentPh">Commentaire</label>
    <input type="text" class="form-control" id="commentPh" name ="commentPh" aria-describedby="commentPh" placeholder="Tapez le commentaire" />
  </div>
  <div class="form-group">
    <label for="NroOrdre">N° d'ordre</label>
    <input type="text" class="form-control" id="NroOrdre" name ="NroOrdre" aria-describedby="NroOrdre" placeholder="Tapez le Nmuéro d'ordre" />
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Dynastie</label>
    <select class="form-control" id="NroDynastie" name ="NroDynastie" aria-describedby="NroDynastie">
	<?php 
	include 'models/dynastiesModel.php';
	$dynasties = liste_dynasties($bdd);
	foreach ($dynasties as $dynastie)
	{
	?>
      <option value="<?=$dynastie['NroDynastie']?>"><?=$dynastie['NomDynastie']?></option>
	<?php } ?>
    </select>
  </div>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
		<input type="hidden" name="module" value="pharaons" />
		<input type="hidden" name="action" value="add" />
		</form>
		
      </div>
	  </div>
    </div>
  </div>
 
<?php
function afficher_pharaons($bdd,$pharaons)
{
	?>
	 
      <div class="row">
<?php
foreach ($pharaons as $pharaon)
{
?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <?php
			$filename="tmp/img/pharaons/".$pharaon['NomPh'].".jpg";
			if ( ! file_exists($filename)) {
			$filename="tmp/img/notfound.png";
			}
			?>
              <a href="#"><img class="card-img-top" src="<?= $filename ?>" alt="" width="700" height="200"></a>
			  
              <div class="card-body">
                <h4 class="card-title">
                  <a data-toggle="modal" data-target="#exampleModalLong<?= $pharaon['NroDynastie'].$pharaon['NroOrdre']?>" href=""><?= $pharaon['NomPh'] ?> </a> 
				  


<!-- Modal -->
<div class="modal fade" id="exampleModalLong<?= $pharaon['NroDynastie'].$pharaon['NroOrdre']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Pharaon : <span class="font-weight-bold" ><?= $pharaon['NomPh'] ?></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><?php
				$dynastie = get_dynastie($bdd,$pharaon['NroDynastie']);
				?>
	  <img src="<?= $filename ?>" alt="" width="200" height="200" class="img-rounded" alt="">

        <p> Dynastie : <span class="font-weight-bold" ><?= $dynastie['NomDynastie'] ?></span></p>
		<p><u>Liste des sites:</u></p>
		 <?php
		$details= details_pharaon($bdd,$pharaon['NroDynastie'],$pharaon['NroOrdre']);
		?>
		<ul class="list-group list-group-flush">
		<?php
		foreach($details as $detail)
		{
			?>
			<li class="list-group-item"><div class="alert alert-danger" role="alert"><?= $detail['NomSite'].' à <kbd>'.$detail['NomLieu'].'</kbd></div> <p>'.$detail['decouverte'].'</p>' ?></li>
			<?php
		}
		?>
		</ul>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
                </h4>
                <p class="card-text"><?= $pharaon['NomUsuel'] ?> - <?= $pharaon['commentPh'] ?></p>
				
				<p>Dynastie: <span class="font-weight-bold" ><?= $dynastie['NomDynastie'] ?></span></p>
              </div>
              <div class="card-footer">
                <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalUpdate<?= $pharaon['NroDynastie'].$pharaon['NroOrdre']?>">
  Modifier
</button>

<!-- Modal -->
<div class="modal fade" id="ModalUpdate<?= $pharaon['NroDynastie'].$pharaon['NroOrdre']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier <span class="font-weight-bold" ><?= $pharaon['NomPh'] ?></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
		<div class="form-group">
    <label for="NomPh">Nom du pharaon</label>
    <input type="text" class="form-control" id="NomPh" name ="NomPh" aria-describedby="NomPh" value="<?= $pharaon['NomPh']?>" />
  </div>
  <div class="form-group">
    <label for="NomUsuel">Nom usuel du pharaon</label>
    <input type="text" class="form-control" id="NomUsuel" name ="NomUsuel" aria-describedby="NomUsuel" value="<?= $pharaon['NomUsuel']?>" />
  </div>
<div class="form-group">
    <label for="commentPh">Commentaire</label>
    <input type="text" class="form-control" id="commentPh" name ="commentPh" aria-describedby="commentPh" value="<?= $pharaon['commentPh']?>" />
  </div>
 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
		<input type="hidden" name="module" value="pharaons" />
		<input type="hidden" name="action" value="modifier" />
		<input type="hidden" name="NroDynastie" value="<?= $pharaon['NroDynastie'] ?>" />
		<input type="hidden" name="NroOrdre" value="<?= $pharaon['NroOrdre'] ?>" />
		</form>
      </div>
    </div>
  </div>
</div>
            


                <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete<?= $pharaon['NroDynastie'].$pharaon['NroOrdre']?>">
  Supprimer
</button>

<!-- Modal -->
<div class="modal fade" id="ModalDelete<?= $pharaon['NroDynastie'].$pharaon['NroOrdre']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalDelete<?= $pharaon['NroDynastie'].$pharaon['NroOrdre']?>">Confirmation de suppression</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Vous Voulez vraiment supprimer  <span class="font-weight-bold" ><?= $pharaon['NomPh'] ?> </span> ?
 
      </div>
      <div class="modal-footer">
	  <form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-danger">Supprimer</button>
		<input type="hidden" name="module" value="pharaons" />
		<input type="hidden" name="action" value="delete" />
		<input type="hidden" name="NroPharaon" value="<?= $pharaon['NroPharaon'] ?>" />
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
?>