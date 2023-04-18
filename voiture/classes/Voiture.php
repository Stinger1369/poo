<?php

require_once 'traits/Getters.php';
require_once 'traits/Setters.php';

class Voiture
{
  // attributs privés
  private $immatriculation;
  private $couleur;
  private $poids;
  private $puissance;
  private $capaciteReservoir;
  private $niveauEssence;
  private $nombrePlaces;
  private $assure;
  private $messageTableauBord;



  use Getters;
  use Setters;

  // constructeur
  public function __construct($immatriculation, $couleur, $poids, $puissance, $capaciteReservoir, $nombrePlaces){
    $this->immatriculation = $immatriculation;
    $this->couleur = $couleur;
    $this->poids = $poids;
    $this->puissance = $puissance;
    $this->capaciteReservoir = $capaciteReservoir;
    $this->niveauEssence = 5;
    $this->nombrePlaces = $nombrePlaces;
    $this->assure = false;
    $this->messageTableauBord = "Bienvenue dans votre voiture !";
  }

  public function setAssure($assure){
    $this->assure = $assure;
    if ($assure) {
      $this->messageTableauBord = "Assurance activée";
    } else {
      $this->messageTableauBord = "Assurance désactivée";
    }
  }

  public function setMessageTableauBord($messageTableauBord){

    $this->messageTableauBord = $messageTableauBord;
  }
  // méthode de service : Repeindre
  public function Repeindre($nouvelleCouleur){
    if (!isset($nouvelleCouleur)) {
      $this->messageTableauBord = "Erreur : la nouvelle couleur est manquante.";
    } elseif ($nouvelleCouleur === $this->couleur) {
      $this->messageTableauBord = "Merci pour ce rafraîchissement !";
    } else {
      $this->couleur = $nouvelleCouleur;
      $this->messageTableauBord = "Merci pour ce nouveau look !";
    }
  }

  // méthode pour faire l'appoint d'essence
  public function Mettre_essence($quantite){
    // vérification de la quantité
    if (!is_numeric($quantite) || $quantite <= 0) {
      return 'La quantité doit être un nombre positif';
    }

    // calcul de la nouvelle quantité d'essence
    $nouveauNiveauEssence = $this->niveauEssence + $quantite;

    // vérification de la capacité maximale du réservoir
    if ($nouveauNiveauEssence > $this->capaciteReservoir) {
      return 'Le réservoir ne peut pas contenir autant de carburant';
    }

    // mise à jour du niveau d'essence
    $this->niveauEssence = $nouveauNiveauEssence;

    // message de feedback
    return 'Ajout de ' . $quantite . ' L d\'essence. Nouveau niveau : ' . $this->niveauEssence . ' L';
  }
  // Methode privée pour calculer la consommation en fonction de la vitesse moyenne
  private function calculerConsommation($vitesseMoyenne){
    if (
      $vitesseMoyenne < 50
    ) {
      return 10;
    } elseif ($vitesseMoyenne >= 50 && $vitesseMoyenne <= 90) {
      return 5;
    } elseif ($vitesseMoyenne > 90 && $vitesseMoyenne <= 130) {
      return 8;
    } else {
      return 12;
    }
  }

 
  public function Se_deplacer($distance, $vitesseMoyenne){
    $consommation = $this->calculerConsommation($vitesseMoyenne) * $distance / 100;

    if ($this->niveauEssence < $consommation) {
      return "Erreur: Pas assez de carburant pour ce trajet de {$distance} km.";
    } else {
      $this->niveauEssence -= $consommation;
      return "Trajet de {$distance} km effectué. Consommation : " . $consommation . " L. Niveau d'essence restant : " . $this->niveauEssence . " L";
    }
  }
  // __toString methode
  public function __toString(){
    return sprintf("Immatriculation: %s, Puissance: %d ch, Couleur: %s", $this->immatriculation, $this->puissance, $this->couleur);
  }
}
