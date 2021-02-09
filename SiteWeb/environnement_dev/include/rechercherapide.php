
<!--inspiration sur le travail de Tiago -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!-- Barre de recheche-->
<script>
$(document).ready(function(){
	$("#myInput").on("keyup", function() {
	var value = $(this).val().toLowerCase();
	$("#ListeClient *").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	});
	});
});
</script>

<div class="container">
	<div class="row">
		<div class="col blog-main">
			<input class="form-control my-2" id="myInput" type="text" placeholder="Search..">
			<div class="border border-warning rounded" id="ListeClient">
				<div class="row">
				<?php
					//$clients = CréerListeClient();
					try {
						$clients = myConnection()->prepare("SELECT ID_CLI, NOM_CLI FROM db_client ORDER BY NOM_CLI ASC");
						$clients->bindParam(':id', $id, PDO::PARAM_STR);
						$clients->execute();
					} catch (PDOException $e) {
						header("Location:error.php?message=".$e->getMessage());
						exit();
					}

					foreach ($clients as $client) {
						$id         = $client['ID_CLI'];
						$nom        = $client['NOM_CLI'];
					?>
						<div class="col-md-3 m-2">
							<a   
								href="client.php?id=<?=$id?>#ficheClient"
								class   ="btn btn-warning "
								type    ="button"
								size 	="20"
								onclick ="afficherClient(<?php echo($id) ?>)"
								style 	="width: 250px"
								><?php echo($nom) ?>
							</a>
						</div>
					<?php
					} // fin foreach
					?>
				</div>
			</div>
		</div>
	</div>
</div><!-- /.container -->