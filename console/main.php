<?php 
require_once 'service.php';
require_once 'view.php';
function main() {
    $patients=[];
    $typesRV=['Consultation','Prestation'];
    $consultations=["Cardiologie","Genaraliste","Ophtalmologie"];
    $prestations=["Radio","Analyse"];
    $statuts=["ENATTENTE","ACCEPTER","REJETER"];
    do {
        $choix = menu();
        switch ($choix) {
            case 1:
                echo "Creer un compte\n";
                $patient = saisiePatient($patients);
                addPatient($patients, $patient);
                break;
            case 2:
                echo "Faire une Demande Rv\n";
                $telephone = saisieChaine("Entrez le telephone du patient : ");
                $index = getPatientByTel($patients, $telephone);
                if ($index == -1) {
                    echo "Patient non trouvé.\n";
                    break;
                }
                 $demande=  saisieDemandeRV($typesRV,$consultations,$prestations);  
                 addDemandeRV($patients,$index,$demande);
                break;
            case 3:
                echo "Lister les Demande Rv d'un patient\n";

                $telephone = saisieChaine("Entrez le telephone du patient : ");
                $index = getPatientByTel($patients, $telephone);
                if ($index == -1) {
                    echo "Patient non trouvé.\n";
                    break;
                }
                 $patient=$patients[$index];
                
                 showDemandeRV($patient['demandes']);
                break;
            case 4:
                echo "Lister les Demande Rv d'un patient par type\n";
                $telephone = saisieChaine("Entrez le telephone du patient : ");
                $index = getPatientByTel($patients, $telephone);
                if ($index == -1) {
                    echo "Patient non trouvé.\n";
                    break;
                }
                  $patient=$patients[$index];
                   $valueType = selectEnum($typesRV,"Selectionnez le type de rendez-vous  : ");
                   $demandesByType=getDemandePatientByKey($patient['demandes'],"type",   $valueType);
                   showDemandeRV($demandesByType);
                break;
            case 5:
                echo "Lister les Demande Rv d'un patient par statut\n";
                $telephone = saisieChaine("Entrez le telephone du patient : ");
                $index = getPatientByTel($patients, $telephone);
                if ($index == -1) {
                    echo "Patient non trouvé.\n";
                    break;
                }
                  $patient=$patients[$index];
                    $valueSatut = selectEnum($statuts,"Selection le statut de rendez-vous  : ");
                   $demandesByStatut= getDemandePatientByKey($patient['demandes'],"statut",   $valueSatut);
                    showDemandeRV($demandesByStatut);
                break;
            case 0:
                echo "Quitter\n";
                break;
            default:
                echo "Choix invalide. Veuillez réessayer.\n";
        }
    } while ($choix != 0);
}

main();