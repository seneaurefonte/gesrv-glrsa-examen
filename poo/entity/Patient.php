<?php 
/*
Fichier porte le meme nom que la classe qu'il contient
 Nom ==>  PascalCase ==> MaClasse
 nomAttribut ==> camelCase ==> monAttribut
 nomFonction ==> camelCase ==> maMethode()
 NomConstante ==> MA_CONSTANTE
*/
class Patient{
     public string $nomComplet,$numero,$dateNaissance;
     public function __construct()
     {
  
     }
}
$patient = new Patient();
// Initialisation des attributs de l'objet(donner un etat initial)
$patient->nomComplet="Douve Wane";
$patient->numero="221234567";
$patient->dateNaissance="2000-05-15";

echo "Nom complet : ".$patient->nomComplet;
echo "\nNumero : ".$patient->numero;
echo "\nDate de naissance : ".$patient->dateNaissance;

?>