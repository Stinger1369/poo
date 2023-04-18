<?php
require_once('classes/Voiture.php');
include('templates/header.php');
require_once('classes/Personne.php');
require_once('classes/Fourgon.php');
?>


<body class="bg-gray-100 ">
  <div class="max-w-2xl mx-auto py-8">
    <?php
    // Instanciation de la voiture
    $maVoiture = new Voiture('AB-123-CD', 'rouge', 1200, 90, 50, 5);

    // Affichage des informations de la voiture
    echo '<h1 class="text-3xl font-bold mb-4">Ma voiture</h1>';
    echo '<ul class="list-disc pl-8 mb-4">';
    echo '<li><span class="font-bold">Immatriculation :</span> ' . $maVoiture->getImmatriculation() . '</li>';
    echo '<li><span class="font-bold">Couleur :</span> ' . $maVoiture->getCouleur() . '</li>';
    echo '<li><span class="font-bold">Poids :</span> ' . $maVoiture->getPoids() . ' kg</li>';
    echo '<li><span class="font-bold">Puissance :</span> ' . $maVoiture->getPuissance() . ' ch</li>';
    echo '<li><span class="font-bold">Capacité du réservoir :</span> ' . $maVoiture->getCapaciteReservoir() . ' L</li>';
    echo '<li><span class="font-bold">Niveau d\'essence :</span> ' . $maVoiture->getNiveauEssence() . ' L</li>';
    echo '<li><span class="font-bold">Nombre de places :</span> ' . $maVoiture->getNombrePlaces() . '</li>';
    echo '</ul>';

    // Activation de l'assurance
    $maVoiture->setAssure(true);
    echo '<p class="mt-4"><span class="font-bold">Assurance :</span> ' . ($maVoiture->getAssure() ? 'Activée' : 'Désactivée') . '</p>';

    // Repeindre la voiture en bleu
    $maVoiture->Repeindre('bleu');
    echo '<p class="mt-2"><span class="font-bold">Tableau de bord :</span> ' . $maVoiture->getMessageTableauBord() . '</p>';

    // Tests d'appoint d'essence
    echo '<h2 class="text-2xl font-bold mt-8">Faire l\'appoint d\'essence</h2>';
    echo '<p>Ancien niveau d\'essence : ' . $maVoiture->getNiveauEssence() . ' L</p>';
    echo '<p>Essayer de mettre 10 L: ' . $maVoiture->Mettre_essence(10) . '</p>';
    echo '<p>Essayer de mettre -5 L: ' . $maVoiture->Mettre_essence(-5) . '</p>';
    echo '<p>Essayer de mettre 100 L: ' . $maVoiture->Mettre_essence(100) . '</p>';
    echo '<p>Essayer de mettre 30 L: ' . $maVoiture->Mettre_essence(30) . '</p>';
    echo '<p>Nouveau niveau d\'essence : ' . $maVoiture->getNiveauEssence() . ' L</p>';

    // Create a new Voiture object
    $maVoiture = new Voiture('AB-123-CD', 'rouge', 1200, 90, 50, 5);

    // Tester les méthodes de mettre de l'essence
    echo '<p>' . $maVoiture->Mettre_essence(10) . '</p>';


    // Se déplacer
    echo '<h2 class="text-2xl font-bold mt-8">Se déplacer</h2>';

    echo '<p>' . $maVoiture->Se_deplacer(50, 40) . '</p>'; // 50 km in city
    echo '<p>' . $maVoiture->Se_deplacer(100, 80) . '</p>'; // 100 km on road
    echo '<p>' . $maVoiture->Se_deplacer(200, 110) . '</p>'; // 200 km on highway
    echo '<p>' . $maVoiture->Se_deplacer(150, 140) . '</p>'; // 150 km at high speed

    // afficher la voiture avec __toString()
    echo '<h2 class="text-2xl font-bold mt-8">Informations voiture (avec __toString())</h2>';
    echo '<p>' . $maVoiture . '</p>';

    // ou afficher la voiture avec __toString() explicitement
    echo '<h2 class="text-2xl font-bold mt-8">Informations voiture (avec __toString() explicitement)</h2>';
    echo '<p>' . $maVoiture->__toString() . '</p>';

    // Instantier une nouvelle voiture
    $maVoiture1 = new Voiture('AB-123-CD', 'rouge', 1200, 90, 50, 5);
    $maVoiture2 = new Voiture('BC-234-DE', 'bleu', 1400, 110, 60, 5);

    // Manpuler les voitures
    $maVoiture1->Repeindre('noir');
    $maVoiture2->Mettre_essence(25);

    // afficher les voitures
    echo '<p>' . $maVoiture1 . '</p>';
    echo '<p>' . $maVoiture2 . '</p>';

    // Instantierr une nouvelle voiture
    $personne = new Personne("Doe", "John");

    // ajouter une voiture à la personne
    $personne->setVoiture($maVoiture);

    // afficher la voiture de la personne
    echo '<p>Voiture de ' . $personne->getPrenom() . ' ' . $personne->getNom() . ' : ' . $personne->getVoiture() . '</p>';

    // Instantier le fourgon et afficher ses informations
    $fourgon = new Fourgon('CD-345-EF', 'blanc', 2000, 130, 70, 3, 20);


    echo '<p>' . $fourgon . ', Volume: ' . $fourgon->getVolume() . ' m³</p>';
    echo '<br>';
    var_dump($maVoiture1);
    echo '<br>';
    var_dump($maVoiture2);
    ?>
  </div>
  <?php
  include('templates/footer.php');
  displayFooter();
  ?>

</body>

</html>