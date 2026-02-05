<?php
$patients=[];
$demandes = [];
$typesRV=['Consultation','Prestation'];
$consultations=["Cardiologie","Genaraliste","Ophtalmologie"];
$prestations=["Radio","Analyse"];
$statuts=["ENATTENTE","ACCEPTER","REJETER"];
function addPatient(array $patient) {
    global $patients;
    $patient['id'] = generateID($patients);
    $patient['demandes'] = [];
    $patients[] = $patient;
    echo "Patient ajouté avec succès.\n";
        }   
function getPatientByTel( string $tel):int {
    global $patients;
    foreach ($patients as $index => $patient) {
        if ($patient['telephone'] === $tel) {
            return $index;
        }
    }
    return -1;
}

function getDemandePatientByKey(string $key, string $value):array {
    global $demandes;
    $demandesWithKey=[] ;
    foreach ($demandes as  $demande) {
        if ($demande[$key] === $value) {
            $demandesWithKey[]=$demande;
        }
    }
    return    $demandesWithKey;
}
function isVide(string $champ):bool {
    // Vérifie si une chaîne est vide ou ne contient que des espaces
     return trim($champ) === '';
} 

function  addDemandeRV(int $pos,array $demandeRV) {
    global $patients;
    $demandeRV['id']=generateID($patients[$pos]['demandes']);
    $patients[$pos]['demandes'][]=$demandeRV;
    echo "Demande de rendez-vous ajoutée avec succès.\n";
}

function generateID(array $datas,string $key="id"):int {
    $last= end($datas);
    return $last ? $last[$key] + 1 : 1;
}