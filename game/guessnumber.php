<?php
$guess = 150;
$error = null;
$success = null;
$value = null;

if (isset($_POST['number'])) {
    $value = (int)$_POST['number'];
    if ($value > $guess) {
        $error = "Votre chiffre est trop élevé";
    } elseif ($value < $guess) {
        $error = "Votre chiffre est trop bas";
    } else {
        $success = "Vous avez trouvé <strong>$guess</strong> !";
    }
    
}
require '../header.php';
?>
<?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php elseif ($success) : ?>
    <div class="alert alert-success">
        <?= $success ?>
    </div>
<?php endif ?>
<div class="form-group">
<form action="guessNumber.php" method="POST">
    <input class="form-control" type="number" name="number" placeholder="Entre 0 et 1000" value="<?= $value ?>">
</div>
<button class="btn btn-primary" type="submit">Devinez !</button>
</form>

<?php require '../footer.php' ?>