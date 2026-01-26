<?php 
require_once dirname(__DIR__)."/models/model.php";
function addPatient (array $patient):string {
      $patients=selectAllPatient();
      $patient['id'] = generateID($patients);
      $patient['demandes'] = [];
      $patients[]=$patient;
      return insertPatient($patients)?'Patient enregistre avec success':'Erreur insertion';

}   
function getPatientByTel( string $tel):array|null{
   $patient=selectPatientByTel($tel);
    
   return $patient;
}

function getPatientByTelAndType( string $tel,string $type):array|null{
   $patient=selectPatientByTelAndType($tel,$type);
   return $patient;
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