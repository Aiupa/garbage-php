<?php
$error = null;
$success = null;
$email = null;
if(!empty($_POST['email'])) {
    $email = $_POST['email'];
    // filtre $variable, FILTRE (voir doc) et peux prendre un troisième paramètre optionnel
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Ou enregistrons nous le mail ?
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d');
        // Nous écrivons dans le fichier préalablement choisi
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        $success = 'Votre mail est bien enregistré pour notre newsletter';
    } else {
        $error = 'Email invalide';
    }
    
}

require 'elements/header.php';

?>

<h1>Inscrivez vous à notre fausse newsletter !</h1>

<p>Attention, les doublons sont possible, il s'agit ici d'apprentissage de file_put_content - De plus, le CSS de Bootstrap est vraiment pas beau.</p>
<?php if($error) : ?>
<alert class="alert alert-danger">
    <?= $error ?>
</alert>
<?php endif; ?>

<?php if($success) : ?>
<alert class="alert alert-success">
    <?= $success ?>
</alert>
<?php endif; ?>

<form class="form-inline" action="/newsletter.php" method="POST">
    <div class="form-group">
    <input type="email" name="email" placeholder="Entrez votre e-mail" value="<?= htmlentities($email) ?>">
    </div>
    <button class="btn btn-primary" type="submit">S'inscrire</button>
</form>



<?php
require 'elements/footer.php';
?>