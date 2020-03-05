<?php
function afficher_lieux($bdd,$lieux)
{
	?>
	<section>
	<div class="jumbotron">
  <h1>Les lieux</h1>   
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  +
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un lieu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form>
  <div class="form-group">
    <label for="NomLieu">Nom du lieu</label>
    <input type="text" class="form-control" id="NomLieu" name ="NomLieu" aria-describedby="NomLieu" placeholder="Tapez le nom du lieu" />
  </div>
<div class="form-group">
    <label for="NomLieu">Commentaire du lieu</label>
    <textarea type="text" class="form-control" id="description" name ="description" aria-describedby="description" placeholder="Tapez un commentaire du lieu"></textarea>
  </div>
  <div class="form-group">
    <label for="situation">Situation du lieu</label>
    <textarea type="text" class="form-control" id="situation" name ="situation" aria-describedby="situation" placeholder="Tapez la situation du lieu"></textarea>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
		<input type="hidden" name="module" value="lieux" />
		<input type="hidden" name="action" value="add" />
		</form>
		
      </div>
    </div>
  </div>
</div>  
</div>
        <div class="row">
<?php
foreach ($lieux as $lieu)
{
?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
			<?php
			$filename="tmp/img/lieux/".$lieu['NomLieu'].".jpg";
			if ( ! file_exists($filename)) {
			$filename="tmp/img/notfound.png";
			}
			?>
              <a href="#"><img class="card-img-top" src="<?= $filename ?>" alt="" width="700" height="200"></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?= $lieu['NomLieu'] ?></a>
                </h4>
                <p class="card-text"><?= $lieu['description'] ?></p>
				<p class="card-text"><?= $lieu['situation'] ?></p>
			  </div>
              <div class="card-footer">
                <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalUpdate<?= str_replace(' ', '-', $lieu['NomLieu']) ?>">
  Modifier
</button>

<!-- Modal -->
<div class="modal fade" id="ModalUpdate<?= str_replace(' ', '-', $lieu['NomLieu'])  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier <span class="font-weight-bold" ><?= $lieu['NomLieu'] ?></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
  <div class="form-group">
    <label for="NomLieu">Nom du lieu</label>
    <input type="text" class="form-control" id="NomLieu" name ="NomLieu" aria-describedby="NomLieu" value="<?= $lieu['NomLieu'] ?>" />
  </div>
<div class="form-group">
    <label for="description">Description du lieu</label>
    <textarea type="text" class="form-control" id="description" name ="description" aria-describedby="description">
	<?= $lieu['description'] ?>
	</textarea>
  </div>
 <div class="form-group">
    <label for="situation">Situation du lieu</label>
    <textarea type="text" class="form-control" id="situation" name ="situation" aria-describedby="situation">
	<?= $lieu['situation'] ?>
	</textarea>
  </div>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
		<input type="hidden" name="module" value="lieux" />
		<input type="hidden" name="action" value="modifier" />
		<input type="hidden" name="NomLieu" value="<?= $lieu['NomLieu'] ?>" /></form>
      </div>
    </div>
  </div>
</div>
            


                <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete<?= $lieu['NomLieu'] ?>">
  Supprimer
</button>

<!-- Modal -->
<div class="modal fade" id="ModalDelete<?= $lieu['NomLieu'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Vous Voulez vraiment supprimer  <span class="font-weight-bold" ><?= $lieu['NomLieu'] ?> </span> ?
 
      </div>
      <div class="modal-footer">
	  <form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-danger">Supprimer</button>
		<input type="hidden" name="module" value="lieux" />
		<input type="hidden" name="action" value="delete" />
		<input type="hidden" name="NomLieu" value="<?= $lieu['NomLieu'] ?>" />
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