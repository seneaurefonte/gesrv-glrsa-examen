<?php 
class Client{
     public string $nomComplet;
     private int $anneeDeNaissance;
     private int $anneeActuelle=2026;
     public function __construct()
     {
  
     }
    public function getAnneeDeNaissance():int{
        return $this->anneeDeNaissance;
    } 

    public function setAnneeDeNaissance(int $anneeDeNaissance):void{
        if($anneeDeNaissance <0){
            throw new Exception("L'année de naissance ne peut pas être négative.");
        }
        $this->anneeDeNaissance = $anneeDeNaissance;
    }
    public function calculerAge():int{
        return $this->anneeActuelle - $this->anneeDeNaissance;
    }

    public function afficherInfo():void{
        echo "Nom complet : ".$this->nomComplet;
        echo "\nAnnée de naissance : ".$this->anneeDeNaissance;
        echo "\nÂge : ".$this->calculerAge()." ans";
    }

}
$client = new Client();
$client->nomComplet="Douve Wane";
try {
    $client->setAnneeDeNaissance(2000);
    echo "Nom complet : ".$client->nomComplet;
    echo "\nAnnée de naissance : ".$client->getAnneeDeNaissance();
    echo "\nÂge : ".$client->calculerAge()." ans";
} catch (Exception $e) {
    echo "Erreur : ".$e->getMessage();
}