<?php

class PieceEchecs
{
  protected $x;
  protected $y;
  private $couleur;

  public function __construct($x, $y, $couleur)
  {
    if ($x < 1) {
      $x = 1;
    }
    if ($x > 8) {
      $x = 8;
    }
    if ($y < 1) {
      $y = 1;
    }
    if ($y > 8) {
      $y = 8;
    }
    if ($couleur != 1 && $couleur != 2) {
      $couleur = 1;
    }
    $this->x = $x;
    $this->y = $y;
    $this->couleur = $couleur;
  }

  public function getCouleur()
  {
    return $this->couleur;
  }

  public function getCouleurCase()
  {
    return ($this->x + $this->y) % 2 == 0 ? 1 : 2;
  }

  public function getX()
  {
    return $this->x;
  }

  public function getY()
  {
    return $this->y;
  }
}
