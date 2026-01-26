<?php 
require_once dirname(__DIR__) . '/data/fichier.php';
function selectPatientByTel(string $tel):array|null {
    $patients=loadData()['patients'];
     
     foreach ($patients as $patient) {
        if ($patient['telephone'] === $tel) {
            return $patient;
        }
    }
    return null;
}
function selectPatientByTelAndType(string $tel,string $type):array|null {
    $patient=selectPatientByTel($tel);
    if ($patient==null) {
         return null;
    }
    $demandesWithType=[];
     foreach ($patient['demandes'] as $demande) {
        if ($demande['type'] === $type) {
             $demandesWithType[]=$demande;
        }
    }
    $patient["demandes"]= $demandesWithType;
    return $patient;

}

function insertPatient(array $patients):bool{
     return saveData($patients);
}

function selectAllPatient():array {
    return loadData()['patients'];
      
}