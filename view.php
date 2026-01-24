<?php 
function menu():int{
    echo "1-Creer un compte\n";
    echo "2-Faire une Demande Rv\n";
    echo "3-Lister les Demande Rv d'un patient\n";
    echo "4-Lister les  Demande Rv d'un patient par type\n";
    echo "5-Lister les  Demande Rv d'un patient par statut\n";
    echo "0-Quitter\n";
    return (int)readline("Entrez votre choix : ");
}

function saisiePatient(array $patients):array{
       $patient=[];
       $patient['nom']=saisieChaine("Entrez le nom du patient : ");
       $patient['prenom']=saisieChaine("Entrez le prenom du patient : ");
       $patient['date_naissance']=saisieChaine("Entrez la date de naissance du patient (YYYY-MM-DD) : ");

    do{
             $teleinvalid=false;
            $telephone = saisieChaine("Entrez le telephone du patient : ");
            $index = getPatientByTel($patients, $telephone);
            if ($index != -1) {
                $teleinvalid=true;
                echo "Ce numéro de téléphone est déjà utilisé.\n";
         
           }
    } while ($teleinvalid);
    $patient['telephone']=$telephone;
    $maladies=[];
    do {
        $maladie = readline("Entrez la maladie du patient : ");
        $maladies[]=$maladie;
        $choix = readline("Voulez-vous ajouter une autre maladie ? (o/n) : ");
    } while (strtolower($choix) === 'o');
    $patient['maladies']=$maladies;
    return $patient;
}

function saisieChaine(string $message):string {
    $chaine = '';
    do {
        $chaine = readline($message);
        if (isVide($chaine)) {
            echo "Ce champ ne peut pas être vide. Veuillez réessayer.\n";
        }
    } while (isVide($chaine));
    return $chaine;
}

function saisieDemandeRV(array $typesEnum,array $consultationsEnum,array $prestationsEnum):array {  
    $demande = [];
    $demande['date'] = saisieChaine("Entrez la date souhaitée pour le rendez-vous (YYYY-MM-DD) : ");
    $demande['heure'] = saisieChaine("Entrez l' Heure souhaitée pour le rendez-vous (HH:MM)") ;
    $demande['type'] = selectEnum($typesEnum,"Entrez le type de rendez-vous  : ");
    $demande['consultation'] =null;
    $demande['prestation'] =null;
    if ($demande['type']=="Consultation") {
             $demande['consultation'] = selectEnum($consultationsEnum,"Entrez la consultation  : ");
    }else{
            $demande['prestation'] = selectEnum($prestationsEnum,"Entrez la Prestation  : ");
    }
    $demande['statut'] = 'en attente';
    return $demande;
}  

function selectEnum(array $enums,string $message):string
{
    do {
      foreach ($enums as $key => $enum) {
        echo ($key+1) ."-".$enum."\n";
       }
       $indexEnum = (int)saisieChaine($message);
    } while ( $indexEnum <1 ||   $indexEnum >count($enums));
    
    return $enums[$indexEnum-1];
}

function showDemandeRV(array $demandes):void{
   foreach ($demandes as  $demande) {
         echo "Date :".$demande['date']."\n";
         echo "Heure :".$demande['heure']."\n";
         echo "Type  :".$demande['type']."\n";
         echo "Consultation :".$demande['consultation']."\n";
         echo "Prestation :".$demande['prestation']."\n";
         echo "Statut :".$demande['statut']."\n";
   }
}

