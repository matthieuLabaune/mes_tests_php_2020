<?php
function nav_item(string $lien, string $titre, string $linkClass = ''): string
{
    $classe = 'nav-item';
    if ($_SERVER['SCRIPT_NAME'] === $lien) {
        $classe .= ' active';
    }
    return <<<HTML
         <li class="$classe">
                        <a class="$linkClass" href="$lien">$titre</a>
                    </li>
HTML;
}

function nav_menu(string $linkClass = ''): string
{
    return
        nav_item('/index.php', 'Accueil', $linkClass) .
        nav_item('/contact.php', 'Contact', $linkClass) .
        nav_item('/contact-2.php', 'Contact-2', $linkClass).
        nav_item('/contact-3.php', 'Contact-3', $linkClass);
}

?>