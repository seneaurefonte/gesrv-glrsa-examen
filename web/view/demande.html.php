 <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1>Faire une demande de rendez-vous</h1>
                    <form method="POST" action="creer-demande.php" class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="telephone" class="form-label">Téléphone du patient</label>
                                <input type="tel" class="form-control" id="telephone" name="telephone" required>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                <div class="form-group">
                                    <label for="date" class="form-label">Date souhaitée</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>
                                <div class="form-group">
                                    <label for="heure" class="form-label">Heure souhaitée</label>
                                    <input type="time" class="form-control" id="heure" name="heure" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="type" class="form-label">Type de rendez-vous</label>
                                <select class="form-control" id="type" name="type" required onchange="updateOptions()">
                                    <option value="">-- Sélectionnez --</option>
                                    <option value="Consultation">Consultation</option>
                                    <option value="Prestation">Prestation</option>
                                </select>
                            </div>

                            <div class="form-group" id="consultation-group" style="display:none;">
                                <label for="consultation" class="form-label">Type de consultation</label>
                                <select class="form-control" id="consultation" name="consultation">
                                    <option value="">-- Sélectionnez --</option>
                                    <option value="Cardiologie">Cardiologie</option>
                                    <option value="Généraliste">Généraliste</option>
                                    <option value="Ophtalmologie">Ophtalmologie</option>
                                </select>
                            </div>

                            <div class="form-group" id="prestation-group" style="display:none;">
                                <label for="prestation" class="form-label">Type de prestation</label>
                                <select class="form-control" id="prestation" name="prestation">
                                    <option value="">-- Sélectionnez --</option>
                                    <option value="Radio">Radio</option>
                                    <option value="Analyse">Analyse</option>
                                </select>
                            </div>

                            <div class="btn-group">
                                <a href="accueil.html" class="btn btn-secondary">Annuler</a>
                                <button type="submit" class="btn btn-primary">Créer la demande</button>
                            </div>
                        </div>
                    </form>
                </div>
</div>