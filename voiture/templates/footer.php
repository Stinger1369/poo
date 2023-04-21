<?php
function displayFooter() {
    $year = date('Y');
    $currentTime = new DateTime();
    $time = $currentTime->format('H:i:s');
    $copyrightHolder = ' <a href="zara-bil.fr" class="copyright-link">Bilel';

    echo <<<HTML
    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="max-w-2xl mx-auto px-4 text-center">
            <p>&copy; {$year} {$copyrightHolder} à {$time}</a>. Tous droits réservés.</p>
        </div>
    </footer>
HTML;
}
?>