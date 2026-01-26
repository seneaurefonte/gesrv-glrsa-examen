# Gestion de RV 

### Option 1 : Creer un compte
1. Acteur(Vue)
  1.1 saisiePatient():array
2. Systeme(service)
     2.1 addPatient(int &idPatient,array &patients,array patient) 
     2.2  Regles
         - telephone unique ==> getPatientByTel(string $tel):int
          -champ obligatoire ==> isVide(string $champ):bool

### Option 2 : Faire une Demande RV
1. Acteur(Vue)
  1.1 saisieDemandeRV():array
2. Systeme(service)
       2.1 Rechercher patient tel ==> getPatientByTel(string $tel):int
       2.2 addDemandeRV(array &$patients,int $pos,array $demandeRV) 
   



### Option 3 : Lister les  Demandes RV
1. Acteur(Vue)
  1.1 showDemandeRV(array $demandes):void
2. Systeme(service)
       2.1 Rechercher patient tel ==> getPatientByTel(string $tel):int