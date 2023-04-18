<?php
function displayFooter() {
    $year = date('Y');
    $copyrightHolder = ' <a href="zara-bil.fr" class="copyright-link">Bilel</a> ';

    echo <<<HTML
    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="max-w-2xl mx-auto px-4 text-center">
            <p>&copy; {$year} {$copyrightHolder}. Tous droits réservés.</p>
        </div>
    </footer>
HTML;
}
?>