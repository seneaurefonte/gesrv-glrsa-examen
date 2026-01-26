<div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1>Filtrer les rendez-vous par statut</h1>
                    <form method="GET" action="lister-statut.php" class="card">
                        <div class="card-body">
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                <div class="form-group">
                                    <label for="telephone" class="form-label">Téléphone du patient</label>
                                    <input type="tel" class="form-control" id="telephone" name="telephone" required>
                                </div>
                                <div class="form-group">
                                    <label for="statut" class="form-label">Statut du rendez-vous</label>
                                    <select class="form-control" id="statut" name="statut" required>
                                        <option value="">-- Sélectionnez --</option>
                                        <option value="en attente">En attente</option>
                                        <option value="accepté">Accepté</option>
                                        <option value="rejeté">Rejeté</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit" style="width: 100%; margin-top: 0.5rem;">Rechercher</button>
                        </div>
                    </form>

                    <div id="resultats" style="margin-top: 2rem;">
                        <!-- Les résultats s'afficheront ici -->
                    </div>
                </div>
 </div>