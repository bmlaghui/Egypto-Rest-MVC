	<div class="jumbotron">
  <h1>Les dynasties</h1>   
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  +
</button>
<section class="float-right ">
  <a href="?module=dynasties&action=par_epoque" class="float-right"><i class="fa fa-list"></i> Liste par époques</a>
  </section>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une dynastie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form>
<div class="form-group">
    <label for="NroDynastie">Numéro de la dynestie</label>
    <input type="text" class="form-control" id="NroDynastie" name ="NroDynastie" aria-describedby="NroDynastie" placeholder="Tapez le numéro de la dynestie" />
  </div>
  <div class="form-group">
    <label for="NomDynastie">Nom de la dynestie</label>
    <input type="text" class="form-control" id="NomDynastie" name ="NomDynastie" aria-describedby="NomDynastie" placeholder="Tapez le nom de la dynestie" />
  </div>
<div class="form-group">
    <label for="DebDynastie">Début de la dynestie</label>
    <input type="text" class="form-control" id="DebDynastie" name ="DebDynastie" aria-describedby="DebDynastie" placeholder="Tapez le début de la dynestie" />
  </div>
  <div class="form-group">
    <label for="FinDynastie">Fin de la dynestie</label>
    <input type="text" class="form-control" id="FinDynastie" name ="FinDynastie" aria-describedby="FinDynastie" placeholder="Tapez la fin de la dynestie" />
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Epoque</label>
    <select class="form-control" id="NroEpoque" name ="NroEpoque" aria-describedby="NroEpoque">
	<?php 
	include 'models/epoquesModel.php';
	$epoques = liste_epoques($bdd);
	foreach ($epoques as $epoque)
	{
	?>
      <option value="<?=$epoque['NroEpoque']?>"><?=$epoque['NomEpoque']?></option>
	<?php } ?>
    </select>
  </div>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
		<input type="hidden" name="module" value="dynasties" />
		<input type="hidden" name="action" value="add" />
		</form>
		
      </div>
	  </div>
    </div>
  </div>
 
<?php
function afficher_dynasties($bdd,$dynasties)
{
	?>
	 
      <div class="row">
<?php
foreach ($dynasties as $dynastie)
{
?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <?php
			$filename="tmp/img/dynasties/".$dynastie['NomDynastie'].".jpg";
			if ( ! file_exists($filename)) {
			$filename="tmp/img/notfound.png";
			}
			?>
              <a href="#"><img class="card-img-top" src="<?= $filename ?>" alt="" width="700" height="200"></a>
			  
              <div class="card-body">
                <h4 class="card-title">
                  <a data-toggle="modal" data-target="#exampleModalLong<?= $dynastie['NroDynastie'] ?>" href=""><?= $dynastie['NomDynastie'] ?> - N° <?= $dynastie['NroDynastie'] ?> </a> 
				  


<!-- Modal -->
<div class="modal fade" id="exampleModalLong<?= $dynastie['NroDynastie'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Dynastie : <span class="font-weight-bold" ><?= $dynastie['NomDynastie'] ?></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><?php
				$epoque = get_epoque($bdd,$dynastie['NroEpoque']);
				?>
	  
		<p> Numéro : <span class="font-weight-bold" ><kbd>	<?= $dynastie['NroDynastie'] ?></kbd></span></p>
        <p> Epoque : <span class="font-weight-bold" ><?= $epoque['NomEpoque'] ?></span></p>
		<p><u>Liste des pharaons:</u></p>
		<ul class="list-group list-group-flush">
		<?php
		$details=details($bdd,$dynastie['NroDynastie']);
		foreach($details as $detail)
		{
			?>
			  <li class="list-group-item"><?= $detail['NomPh'] ?></li>
			<?php
		}
		?>
		</ul>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                </h4>
                <p class="card-text"><?= $dynastie['DebDynastie'] ?> - <?= $dynastie['FinDynastie'] ?></p>
				
				<p>Epoque: <span class="font-weight-bold" ><?= $epoque['NomEpoque'] ?></span></p>
              </div>
              <div class="card-footer">
                <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalUpdate<?= $dynastie['NroDynastie'] ?>">
  Modifier
</button>

<!-- Modal -->
<div class="modal fade" id="ModalUpdate<?= $dynastie['NroDynastie'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier <span class="font-weight-bold" ><?= $dynastie['NomDynastie'] ?></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
		<div class="form-group">
    <label for="NroDynastie">Numéro de la dynestie</label>
    <input type="text" class="form-control" id="NroDynastie" name ="NroDynastie" aria-describedby="NroDynastie" value="<?= $dynastie['NroDynastie'] ?>" />
  </div>
  <div class="form-group">
    <label for="NomDynastie">Nom de la dynestie</label>
    <input type="text" class="form-control" id="NomDynastie" name ="NomDynastie" aria-describedby="NomDynastie" value="<?= $dynastie['NomDynastie'] ?>" />
  </div>
<div class="form-group">
    <label for="DebDynastie">Début de la dynestie</label>
    <input type="text" class="form-control" id="DebDynastie" name ="DebDynastie" aria-describedby="DebDynastie" value="<?= $dynastie['DebDynastie'] ?> "/>
  </div>
  <div class="form-group">
    <label for="FinDynastie">Fin de la dynestie</label>
    <input type="text" class="form-control" id="FinDynastie" name ="FinDynastie" aria-describedby="FinDynastie" value="<?= $dynastie['FinDynastie'] ?> "/>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Epoque</label>
    <select class="form-control" id="NroEpoque" name ="NroEpoque" aria-describedby="NroEpoque">
	<?php 
	$epoqueSelected= get_epoque($bdd,$dynastie['NroEpoque']);
	$epoques = liste_epoques($bdd);
	echo ($epoqueSelected['NroEpoque'] == $epoque['NroEpoque']);
	foreach ($epoques as $epoque)
	{
		if ($epoqueSelected['NroEpoque'] == $epoque['NroEpoque'])
		{
	?>
      <option value="<?=$epoque['NroEpoque']?>" selected><?=$epoque['NomEpoque']?></option>
		<?php }
	else {
	?>
 <option value="<?=$epoque['NroEpoque']?>"><?=$epoque['NomEpoque']?></option>
	<?php }
	} ?>
    </select>
  </div>
 
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
		<input type="hidden" name="module" value="dynasties" />
		<input type="hidden" name="action" value="modifier" />
		<input type="hidden" name="NroDynastie" value="<?= $dynastie['NroDynastie'] ?>" /></form>
      </div>
    </div>
  </div>
</div>
            


                <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete<?= $dynastie['NroDynastie'] ?>">
  Supprimer
</button>

<!-- Modal -->
<div class="modal fade" id="ModalDelete<?= $dynastie['NroDynastie'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Vous Voulez vraiment supprimer  <span class="font-weight-bold" ><?= $dynastie['NomDynastie'] ?> </span> ?
 
      </div>
      <div class="modal-footer">
	  <form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-danger">Supprimer</button>
		<input type="hidden" name="module" value="dynasties" />
		<input type="hidden" name="action" value="delete" />
		<input type="hidden" name="NroDynastie" value="<?= $dynastie['NroDynastie'] ?>" />
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
function afficher_dynasties_epoques($bdd)
{
	?>
	 
      
<?php
include_once('models/epoquesModel.php');
$epoques=liste_epoques($bdd);
foreach($epoques as $epoque)
{
	?>
	
	<div class="row">
	<h4 class="h4">
Epoque : <span class="font-weight-bold" > <?= $epoque['NomEpoque']; ?></span></h4>
</div>
<div class="row">
	<?php

$dynasties=par_epoque($bdd,$epoque['NroEpoque']);
?>
<?php
foreach ($dynasties as $dynastie)
{
?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <?php
			$filename="tmp/img/dynasties/".$dynastie['NomDynastie'].".jpg";
			if ( ! file_exists($filename)) {
			$filename="tmp/img/notfound.png";
			}
			?>
              <a href="#"><img class="card-img-top" src="<?= $filename ?>" alt="" width="700" height="200"></a>
			  
              <div class="card-body">
                <h4 class="card-title">
                  <a data-toggle="modal" data-target="#exampleModalLong<?= $dynastie['NroDynastie']?>" href=""><?= $dynastie['NomDynastie'] ?> - N° <?= $dynastie['NroDynastie'] ?> </a> 
				 
				 


<!-- Modal -->
<div class="modal fade" id="exampleModalLong<?= $dynastie['NroDynastie']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Dynastie : <span class="font-weight-bold" ><?= $dynastie['NomDynastie'] ?> - N° <?= $dynastie['NroDynastie'] ?> </span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> Numéro : <span class="font-weight-bold" ><kbd>	<?= $dynastie['NroDynastie'] ?></kbd></span></p>
        <p> Epoque : <span class="font-weight-bold" ><?= $dynastie['NomEpoque'] ?></span></p>
		<p><u>Liste des pharaons:</u></p>
		<ul class="list-group list-group-flush">
		<?php
		$details=details($bdd,$dynastie['NroDynastie']);
		foreach($details as $detail)
		{
			?>
			  <li class="list-group-item"><?= $detail['NomPh'] ?></li>
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
                <p class="card-text"><?= $dynastie['DebDynastie'] ?> - <?= $dynastie['FinDynastie'] ?></p>
				<?php
				$epoque = get_epoque($bdd,$dynastie['NroEpoque']);
				?>
				<p>Epoque: <span class="font-weight-bold" ><?= $epoque['NomEpoque'] ?></span></p>
              </div>
              <div class="card-footer">
                <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalUpdate<?= $dynastie['NroDynastie'] ?>">
  Modifier
</button>

<!-- Modal -->
<div class="modal fade" id="ModalUpdate<?= $dynastie['NroDynastie'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier <span class="font-weight-bold" ><?= $dynastie['NomDynastie'] ?></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
		<div class="form-group">
    <label for="NroDynastie">Numéro de la dynestie</label>
    <input type="text" class="form-control" id="NroDynastie" name ="NroDynastie" aria-describedby="NroDynastie" value="<?= $dynastie['NroDynastie'] ?>" />
  </div>
  <div class="form-group">
    <label for="NomDynastie">Nom de la dynestie</label>
    <input type="text" class="form-control" id="NomDynastie" name ="NomDynastie" aria-describedby="NomDynastie" value="<?= $dynastie['NomDynastie'] ?>" />
  </div>
<div class="form-group">
    <label for="DebDynastie">Début de la dynestie</label>
    <input type="text" class="form-control" id="DebDynastie" name ="DebDynastie" aria-describedby="DebDynastie" value="<?= $dynastie['DebDynastie'] ?> "/>
  </div>
  <div class="form-group">
    <label for="FinDynastie">Fin de la dynestie</label>
    <input type="text" class="form-control" id="FinDynastie" name ="FinDynastie" aria-describedby="FinDynastie" value="<?= $dynastie['FinDynastie'] ?> "/>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Epoque</label>
    <select class="form-control" id="NroEpoque" name ="NroEpoque" aria-describedby="NroEpoque">
	<?php 
	$epoqueSelected= get_epoque($bdd,$dynastie['NroEpoque']);
	$epoques = liste_epoques($bdd);
	echo ($epoqueSelected['NroEpoque'] == $epoque['NroEpoque']);
	foreach ($epoques as $epoque)
	{
		if ($epoqueSelected['NroEpoque'] == $epoque['NroEpoque'])
		{
	?>
      <option value="<?=$epoque['NroEpoque']?>" selected><?=$epoque['NomEpoque']?></option>
		<?php }
	else {
	?>
 <option value="<?=$epoque['NroEpoque']?>"><?=$epoque['NomEpoque']?></option>
	<?php }
	} ?>
    </select>
  </div>
 
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
		<input type="hidden" name="module" value="dynasties" />
		<input type="hidden" name="action" value="modifier" />
		<input type="hidden" name="NroDynastie" value="<?= $dynastie['NroDynastie'] ?>" /></form>
      </div>
    </div>
  </div>
</div>
            


                <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete<?= $dynastie['NroDynastie'] ?>">
  Supprimer
</button>

<!-- Modal -->
<div class="modal fade" id="ModalDelete<?= $dynastie['NroDynastie'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Vous Voulez vraiment supprimer  <span class="font-weight-bold" ><?= $dynastie['NomDynastie'] ?> </span> ?
 
      </div>
      <div class="modal-footer">
	  <form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-danger">Supprimer</button>
		<input type="hidden" name="module" value="dynasties" />
		<input type="hidden" name="action" value="delete" />
		<input type="hidden" name="NroDynastie" value="<?= $dynastie['NroDynastie'] ?>" />
		</form>
      </div>
    </div>
  </div>
</div>

			</div>
            </div>
          </div>
<?php
}?></div><?php
}
?>	
</div>	  
        <!-- /.row -->
<?php
}
?>