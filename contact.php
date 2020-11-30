<?php
$title = 'Contact';
require 'elements/header.php';
require_once 'data/config.php';
require_once 'functions.php';

// timezone par défaut
date_default_timezone_set('Europe/Paris');

// variable pour l'heure - On recupère l'heure actuelle
$hour = (int)($_GET['hour'] ?? date('G'));

// variable pour le jour - On récupère le jour actuel
$day = (int)($_GET['day'] ?? date('N') - 1);

$slots = SLOTS[$day];
$open = in_slots($hour, $slots);
?>

<div class="row">
    <div class="col-md-8">
        <h2>Nous contacter</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam et delectus commodi vel laborum, tempore tenetur similique accusantium veniam facere rerum aut sapiente quidem in totam inventore modi, necessitatibus illum.</p>
    </div>
    <div class="col-md-4">
        <h2>Horaires d'ouvertures</h2>

        <?php if ($open): ?>
            <div class="alert alert-success">Le magasin sera ouvert</div>
        <?php else: ?>
            <div class="alert alert-danger">Le magasin sera fermé</div>
        <?php endif; ?>

        <form action="" method="GET">
            <div class="form-group">
                <?= select('day', $day, DAYS) ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="hour" value="<?= $hour ?>">
            </div>
            <button class="btn btn-primary" type="submit">Voir si le magasin est ouvert</button>
        </form>

        <ul>
            <?php foreach (DAYS as $d => $day) : ?>
                <li>
                    <?= $day ?> -
                    <?= slots_html(SLOTS[$d]); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php require 'elements/footer.php'; ?>