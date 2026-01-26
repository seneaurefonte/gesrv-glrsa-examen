  <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1>Créer un compte patient</h1>
                    <?php if ($errors): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($errors as $error):?>
                                    <li><?php echo $error; ?></li> 
                                <?php endforeach; ?>
                            <ul>
                        </div>
                    <?php endif; ?>
                     <?php if ($message): ?>
                        <div class="alert alert-success"><?php echo $message; ?></div>
                    <?php endif; ?>
                    <form method="POST" action="<?php WEBROOT ?>">
                        <input name="page" type="hidden" value="creer-compte"/>
                        <div class="form-group">
                            <label for="nom" class="form-label">Nom du patient</label>
                            <input type="text" class="form-control" id="nom" name="nom" >
                        </div>

                        <div class="form-group">
                            <label for="prenom" class="form-label">Prénom du patient</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" >
                        </div>

                        <div class="form-group">
                            <label for="date_naissance" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" >
                        </div>

                        <div class="form-group">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone" >
                        </div>

                        <div class="form-group">
                            <label for="maladies" class="form-label">Maladies (séparées par des virgules)</label>
                            <textarea class="form-control" id="maladies" name="maladies" rows="4" placeholder="Ex: Diabète, Hypertension, Asthme"></textarea>
                        </div>

                        <div class="btn-group">
                            <a href="accueil.html" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary"  name="action" value="create-compte">Créer le compte</button>
                        </div>
                    </form>
                </div>
 </div>
