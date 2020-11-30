<?php
// Fonctions pour la barre de navigation
function nav_item(string $link, string $title, string $linkClass = ''): string
{
    $classe = 'nav-item';
    if (($_SERVER['SCRIPT_NAME']) === $link) {
        $classe .=  ' active';
    }
    // Syntaxe HEREDOC 
    // FAIRE TRES ATTENTION AUX ESPACES ET A L INDENDATION
    return <<<HTML
                <li class="$classe">
                    <a class="$linkClass" href="$link">$title</a>
                </li>
HTML;
}

function nav_menu(string $linkClass = ''): string
{
    return
        nav_item('/index.php', 'Accueil', $linkClass) .
        nav_item('/menu.php', 'Menu', $linkClass) .
        nav_item('/newsletter.php', 'Newsletter', $linkClass) .
        nav_item('/contact.php', 'Contact', $linkClass);
}

// Fonction pour les glaces
function checkbox(string $name, string $value, array $data): string
{
    $attributes = '';
    if (isset($data[$name]) && in_array($value, $data[$name])) {
        $attributes .= 'checked';
    }
    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value">
HTML;
}

function radio(string $name, string $value, array $data): string
{
    $attributes = '';
    if (isset($data[$name]) && $value === $data[$name]) {
        $attributes .= 'checked';
    }
    return <<<HTML
    <input type="radio" name="{$name}" value="$value">
HTML;
}

// Fonctions pour les horaires d'ouverture
function slots_html(array $slots)
{
    if (empty($slots)) {
        return 'Nous sommes fermé';
    }
    $phrases = [];
    foreach ($slots as $slot) {
        $phrases[] = "{$slot[0]}h à {$slot[1]}h";
    }
    return "Ouvert de " . implode(' et ', $phrases);
}

function in_slots(int $hour, array $slots): bool
{
    foreach ($slots as $slot) {
        $begin = $slot[0];
        $end = $slot[1];
        if ($hour >= $begin && $hour < $end) {
            return true;
        } else {
            return false;
        }
    }
}

function select(string $name, $value, array $options): string
{
    $html_options = [];
    foreach ($options as $d => $option) {
        $attributes = $d == $value ? 'selected' : '';
        $html_options[] = "<option value='$d'>$option</option>";
    }
    return "<select class='form-control' name='$name'>" . implode($html_options);
}
