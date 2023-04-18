<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon formulaire</title>
  <!-- Inclusion de la feuille de style Tailwind -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Inclusion de la librairie Font Awesome -->
  <script src="https://kit.fontawesome.com/5bb8928ade.js" crossorigin="anonymous"></script>
  <script src="https://js.stripe.com/v3/"></script>
</head>

<body class="bg-gray-200 py-4">

  <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="p-4 bg-gray-200">
      <h1 class="text-2xl font-bold text-gray-800">Informations sur la pièce d'échecs</h1>
    </div>
    <div class="px-4 py-2">
      <?php
      require_once 'classes/PieceEchecs.php';

      // Création d'une pièce blanche en position 4,4
      $piece = new PieceEchecs(4, 4, 1);

      // Affichage des informations de la pièce
      echo "<p class='text-gray-700'>La pièce est de couleur <span class='font-bold'>" . ($piece->getCouleur() == 1 ? "blanche" : "noire") . "</span></p>";
      echo "<p class='text-gray-700'>La case sur laquelle se trouve la pièce est de couleur <span class='font-bold'>" . ($piece->getCouleurCase() == 1 ? "blanche" : "noire") . "</span></p>";
      echo "<p class='text-gray-700'>La pièce se trouve en position <span class='font-bold'>" . $piece->getX() . "," . $piece->getY() . "</span></p>";
      ?>
    </div>
    <table border="1" class="mt-8 mx-auto ">
      <?php
      // Ajouter une rangée pour les coordonnées x
      echo "<tr><td></td>";
      for ($x = 1; $x <= 8; $x++) {
        echo "<td class='text-center pb-2'>" . $x . "x</td>";
      }
      echo "</tr>";

      // Boucle pour afficher les 8 rangées de l'échiquier
      for ($i = 8; $i >= 1; $i--) {
        echo "<tr>";

        // Ajouter une colonne pour les coordonnées y
        echo "<td class='text-center pr-4'>" . $i . "y</td>";

        // Boucle pour afficher les 8 colonnes de chaque rangée
        for ($j = 1; $j <= 8; $j++) {
          // Si la case est de couleur noire
          if (($i + $j) % 2 == 0) {
            echo "<td class='text-center' style='background-color: #769896; width: 50px; height: 50px;'>";

            // Représentation des pièces noires
            if ($i == 7) {
              echo "<i class=' fas fa-chess-pawn fa-2xl'></i>";
            } else if ($i == 8 && ($j == 1 || $j == 8)) {
              echo "<i class='fas fa-chess-rook fa-2xl'></i>";
            } else if ($i == 8 && ($j == 2 || $j == 7)) {
              echo "<i class='fas fa-chess-knight fa-2xl'></i>";
            } else if ($i == 8 && ($j == 3 || $j == 6)) {
              echo "<i class='fas fa-chess-bishop fa-2xl'></i>";
            } else if ($i == 8 && $j == 4) {
              echo "<i class='fas fa-chess-queen fa-2xl'></i>";
            } else if ($i == 8 && $j == 5) {
              echo "<i class='fas fa-chess-king fa-2xl'></i>";
            }

            // Représentation des pièces blanches
            if ($i == 2) {
              echo "<i class='fas fa-chess-pawn fa-2xl text-white'></i>";
            } else if ($i == 1 && ($j == 1 || $j == 8)) {
              echo "<i class='fas fa-chess-rook fa-2xl text-white'></i>";
            } else if ($i == 1 && ($j == 2 || $j == 7)) {
              echo "<i class='fas fa-chess-knight fa-2xl text-white'></i>";
            } else if ($i == 1 && ($j == 3 || $j == 6)) {
              echo "<i class='fas fa-chess-bishop fa-2xl text-white'></i>";
            } else if ($i == 1 && $j == 4) {
              echo "<i class='fas fa-chess-queen fa-2xl text-white'></i>";
            } else if ($i == 1 && $j == 5) {
              echo "<i class='fas fa-chess-king fa-2xl text-white'></i>";
            }
          }
          // Sinon, la case est de couleur blanche
          else {
            echo "<td class='text-center' style='background-color: #EEEEF5; width: 50px; height: 50px;'>";

            // Représentation des pièces blanches
            if ($i == 2) {
              echo "<i class='fas fa-chess-pawn fa-2xl text-white'></i>";
            } else if ($i == 1 && ($j == 1 || $j == 8)) {
              echo "<i class='fas fa-chess-rook fa-2xl text-white'></i>";
            } else if ($i == 1 && ($j == 2 || $j == 7)) {
              echo "<i class='fas fa-chess-knight fa-2xl text-white'></i>";
            } else if ($i == 1 && ($j == 3 || $j == 6)) {
              echo "<i class='fas fa-chess-bishop fa-2xl text-white'></i>";
            } else if ($i == 1 && $j == 4) {
              echo "<i class='fas fa-chess-queen fa-2xl text-white'></i>";
            } else if ($i == 1 && $j == 5) {
              echo "<i class='fas fa-chess-king fa-2xl text-white'></i>";
            }

            // Représentation des pièces noires
            if ($i == 7) {
              echo "<i class='fas fa-chess-pawn fa-2xl'></i>";
            } else if ($i == 8 && ($j == 1 || $j == 8)) {
              echo "<i class='fas fa-chess-rook fa-2xl'></i>";
            } else if ($i == 8 && ($j == 2 || $j == 7)) {
              echo "<i class='fas fa-chess-knight fa-2xl'></i>";
            } else if ($i == 8 && ($j == 3 || $j == 6)) {
              echo "<i class='fas fa-chess-bishop fa-2xl'></i>";
            } else if ($i == 8 && $j == 4) {
              echo "<i class='fas fa-chess-queen fa-2xl'></i>";
            } else if ($i == 8 && $j == 5) {
              echo "<i class='fas fa-chess-king fa-2xl'></i>";
            }
          }
          echo "</td>";
        }
        echo "</tr>";
      }
      ?>
    </table>

</body>

</html>