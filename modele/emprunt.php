<?php
require_once("./config/connexion.php");
class Emprunt
{

  //attribut
  private $NumEmprunt;
  private $DateEmprunt;
  private $DateRenduPrevu;
  private $DateRenduReelle;

  protected $numExemplaire;

  protected $numUtilisateur;

  //getter
  public function getNumEmprunt()
  {
    return $this->NumEmprunt;
  }
  public function getDateEmprunt()
  {
    return $this->DateEmprunt;
  }
  public function getDateRenduPrevu()
  {
    return $this->DateRenduPrevu;
  }
  public function getDateRenduReelle()
  {
    return $this->DateRenduReelle;
  }


  //setter
  public function setNumEmprunt($n)
  {
    $this->NumEmprunt = $n;
  }
  public function setDateEmprunt($d)
  {
    $this->DateEmprunt = $d;
  }
  public function setDateRenduPrevu($d)
  {
    $this->DateRenduPrevu = $d;
  }
  public function setDateRenduReelle($d)
  {
    $this->DateRenduReelle = $d;
  }


  //constructeur
  public function __construct($num = NULL, $dateE = NULL, $dateRP = NULL, $dateRR = NULL)
  {
    if (!is_null($num) && !is_null($dateE) && !is_null($dateRP) && !is_null($dateRR)) {
      $this->NumEmprunt = $num;
      $this->DateEmprunt = $dateE;
      $this->DateRenduPrevu = $dateRP;
      $this->DateRenduReelle = $dateRR;
    }
  }

  public function addEmprunt($dateRenduPrevu, $numUtilisateur, $numExemplaire)
  {
    date_default_timezone_set('Europe/Paris');
    $dateEmprunt = date('Y-m-d');
    $requete = "INSERT INTO `Emprunt` (`DateEmprunt`, `DateRenduPrevu`, `NumExemplaire`, `NumUtilisateur`) VALUES (:tag_dateE, :tag_dateRP, :tag_e, :tag_u);";
    $result = Connexion::pdo()->prepare($requete);
    $valeurs = array(
      "tag_dateE" => $dateEmprunt,
      "tag_dateRP" => $dateRenduPrevu,
      "tag_e" => $numExemplaire,
      "tag_u" => $numUtilisateur
    );
    try {
      $result->execute($valeurs);
    } catch (PDOException $e) {
      echo "erreur : " . $e->getMessage() . "<br>";
    }
  }
}


?>