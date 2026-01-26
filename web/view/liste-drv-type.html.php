 <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1>Filtrer les rendez-vous par type</h1>
                    <form method="GET" action="<?php WEBROOT ?>" class="card">
                           <input name="page" type="hidden" value="liste-drv-type"/>
                        <div class="card-body">
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                <div class="form-group">
                                    <label for="telephone" class="form-label">Téléphone du patient</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" required>
                                </div>
                                <div class="form-group">
                                    <label for="type" class="form-label">Type de rendez-vous</label>
                                    <select class="form-control" id="type" name="type" required>
                                        <option value="">-- Sélectionnez --</option>
                                        <option value="Consultation">Consultation</option>
                                        <option value="Prestation">Prestation</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary"  name="action" value="search-tel-type" type="submit" style="width: 100%; margin-top: 0.5rem;">Rechercher</button>
                        </div>
                    </form>

                    
                    <div id="resultats" style="margin-top: 2rem;">
                         <?php  if(!empty($patient)):?>
                               <div style="margin-top: 2rem; display: flex; gap: 2rem; flex-wrap: wrap;">
                                        <!-- Informations du patient -->
                                            <div style="flex: 0 0 30%; min-width: 280px;">
                                                <div class="card" style="background-color: #f9f9f9; height: 100%;">
                                                    <div class="card-body">
                                                        <h3>Informations du patient</h3>
                                                        <div style="margin-top: 1.5rem;">
                                                            <p><strong>Nom :</strong> <?php echo htmlspecialchars($patient['nom']); ?></p>
                                                            <p style="margin-top: 0.75rem;"><strong>Prénom :</strong> <?php echo htmlspecialchars($patient['prenom']); ?></p>
                                                            <p style="margin-top: 0.75rem;"><strong>Téléphone :</strong> <?php echo htmlspecialchars($patient['telephone']); ?></p>
                                                            <p style="margin-top: 0.75rem;"><strong>Date de naissance :</strong> <?php echo htmlspecialchars($patient['date_naissance']); ?></p>
                                                            <p style="margin-top: 0.75rem;"><strong>Maladies :</strong> <?php echo htmlspecialchars($patient['maladies']); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>
                                    <?php  if(!empty($patient['demandes'])):?>
                                            <!-- Table des demandes de Rv-->
                                             <div style="flex: 1; min-width: 500px;">
                                                
                                                 <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Date</th>
                                                            <th>Heure</th>
                                                            <th>Type</th>
                                                            <th>Statut</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                       <?php
                                                       foreach ($patient['demandes'] as  $demande):?>
                                                           <tr>
                                                            <td><?php echo $demande['id']?></td>
                                                            <td><?php echo $demande['date']?></td>
                                                            <td><?php echo $demande['heure']?></td>
                                                            <td><?php echo $demande['type']?></td>
                                                            <td><?php echo $demande['statut']?></td>
                                                        </tr>
                                                        <?php  endforeach?>
                                                   </tbody>
                                                 </table>
                                             </div>

                                    <?php  else:?>
                                    <div class="alert alert-info">Aucun rendez-vous trouvé pour ce patient.</div>
                                    <?php  endif?>
                               </div>
                         <?php  else:?>
                              <div class="alert alert-info">Aucun patient associe a ce numero.</div>
                        <?php  endif?>


                    </div>
                </div>
</div>