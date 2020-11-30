<?php
$perfumes = [
    'Fraise' => 4,
    'Vanille' => 5,
    'Chocolat' => 3
];
$cones = [
    'Pot' => 2,
    'Cornet simple' => 2
];
$extras = [
    'Pépites de chocolat' => 1,
    'Chantilly' => 0.5
];

$ingredients = [];
$total = 0;

foreach (['perfume', 'extra', 'cone'] as $name) {
    if (isset($_GET[$name])) {
        $list = $name . 's';
        $choice = $_GET[$name];
        if (is_array($choice)) {
            foreach ($choice as $value) {
                if (isset($$list[$value])) {
                    $ingredients[] = $value;
                    $total += $$list[$value];
                }
            }
        } else {
            if (isset($$list[$choice])) {
                $ingredients[] = $choice;
                $total += $$list[$choice];
            }
        }
    }
}
require '../header.php';
?>
<h2>Composez votre propre glace !</h2>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Votre glace</h4>
                <ul>
                    <?php foreach ($ingredients as $ingredient) : ?>
                        <li><?= $ingredient ?></li>
                    <?php endforeach ?>
                </ul>
                <p><strong>Prix : </strong><?= $total ?> <strong>€</strong></p>
            </div>
        </div>
        <div class="col-md-8">
            <form action="glaces.php" method="GET">
                <h3>Choisissez vos parfums</h3>
                <?php foreach ($perfumes as $perfume => $price) : ?>
                    <div class="checkbox">
                        <label>
                            <?= checkbox('perfume', $perfume, $_GET) ?>
                            <?= $perfume ?> - <?= $price ?> €
                        </label>
                    </div>
                <?php endforeach; ?>
                <h3>Choisissez votre cornet</h3>
                <?php foreach ($cones as $cone => $price) : ?>
                    <div class="radio">
                        <label>
                            <?= radio('cone', $cone, $_GET) ?>
                            <?= $cone ?> - <?= $price ?> €
                        </label>
                    </div>
                <?php endforeach; ?>
                <h3>Choisissez vos suppléments</h3>
                <?php foreach ($extras as $extra => $price) : ?>
                    <div class="checkbox">
                        <label>
                            <?= checkbox('extra', $extra, $_GET) ?>
                            <?= $extra ?> - <?= $price ?> €
                        </label>
                    </div>
                <?php endforeach ?>
                <button class="btn btn-primary" type="submit">Composer ma glace</button>
            </form>
        </div>
    </div>
</div>

<?php require '../footer.php' ?>