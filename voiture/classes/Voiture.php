<?php

require_once 'Getters.php';
require_once 'Setters.php';

class Voiture
{
  // attributs privés
  private string $immatriculation;
  private string $couleur;
  private int $poids;
  private int $puissance;
  private int $capaciteReservoir;
  private int $niveauEssence;
  private int $nombrePlaces;
  private bool $assure;
  private string $messageTableauBord;

  use Getters;
  use Setters;

  // constructeur
  public function __construct(
    string $immatriculation,
    string $couleur,
    int $poids,
    int $puissance,
    int $capaciteReservoir,
    int $nombrePlaces
  ) {
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

  public function setAssure(bool $assure): void
  {
    $this->assure = $assure;
    if ($assure) {
      $this->messageTableauBord = "Assurance activée";
    } else {
      $this->messageTableauBord = "Assurance désactivée";
    }
  }

  public function setMessageTableauBord(string $messageTableauBord): void
  {
    $this->messageTableauBord = $messageTableauBord;
  }

  public function Repeindre(string $nouvelleCouleur): void
  {
    if (!isset($nouvelleCouleur)) {
      $this->messageTableauBord = "Erreur : la nouvelle couleur est manquante.";
    } elseif ($nouvelleCouleur === $this->couleur) {
      $this->messageTableauBord = "Merci pour ce rafraîchissement !";
    } else {
      $this->couleur = $nouvelleCouleur;
      $this->messageTableauBord = "Merci pour ce nouveau look !";
    }
  }

  public function Mettre_essence(int $quantite): string
  {
    if (!is_numeric($quantite) || $quantite <= 0) {
      return 'La quantité doit être un nombre positif';
    }

    $nouveauNiveauEssence = $this->niveauEssence + $quantite;

    if ($nouveauNiveauEssence > $this->capaciteReservoir) {
      return 'Le réservoir ne peut pas contenir autant de carburant';
    }

    $this->niveauEssence = $nouveauNiveauEssence;

    return 'Ajout de ' . $quantite . ' L d\'essence. Nouveau niveau : ' . $this->niveauEssence . ' L';
  }

  private function calculerConsommation(int $vitesseMoyenne): int
  {
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

  public function Se_deplacer(int $distance, int $vitesseMoyenne): string
  {
    $consommation = $this->calculerConsommation($vitesseMoyenne) * $distance / 100;
    if ($this->niveauEssence < $consommation) {
      return "Erreur: Pas assez de carburant pour ce trajet de {$distance} km.";
    } else {
      $this->niveauEssence -= $consommation;
      return "Trajet de {$distance} km effectué. Consommation : " . $consommation . " L. Niveau d'essence restant : " . $this->niveauEssence . " L";
    }
  }

  public function __toString(): string
  {
    return sprintf("Immatriculation: %s, Puissance: %d ch, Couleur: %s", $this->immatriculation, $this->puissance, $this->couleur);
  }
}
