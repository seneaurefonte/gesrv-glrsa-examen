<?php 
function addPatient(array &$patients, array $patient) {
    $patient['id'] = generateID($patients);
    $patient['demandes'] = [];
    $patients[] = $patient;
    echo "Patient ajouté avec succès.\n";
        }   
function getPatientByTel(array $patients, string $tel):int {
    foreach ($patients as $index => $patient) {
        if ($patient['telephone'] === $tel) {
            return $index;
        }
    }
    return -1;
}

function getDemandePatientByKey(array $demandes,string $key, string $value):array {
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

function  addDemandeRV(array &$patients,int $pos,array $demandeRV) {
    $demandeRV['id']=generateID($patients[$pos]['demandes']);
    $patients[$pos]['demandes'][]=$demandeRV;
    echo "Demande de rendez-vous ajoutée avec succès.\n";
}

function generateID(array $datas,string $key="id"):int {
    $last= end($datas);
    return $last ? $last[$key] + 1 : 1;
}