<?php
$name = null;
if (!empty($_GET['action'] && $_GET['action'] === 'deconnecter')) {
    unset($_COOKIE['user']);
    setcookie('user', '', time() - 10);
}
if(!empty($_COOKIE['user'])) {
    $name = $_COOKIE['user'];
}

if(!empty($_POST['name'])) {
    setcookie('user', $_POST['name'], time() + 60*60*24*30);
}

require 'elements/header.php'
?>

<?php if($name): ?>
    <h1>Bonjour <?= htmlentities($name); ?></h1>
    <a href="profil.php?action=deconnecter">Se déconnecter</a>
<?php else: ?>
<form action="" method="POST">
    <div class="form-group">
        <input class="form-control" name="name" placeholder="Entrez votre nom" type="text">
    </div>
    <div class="btn btn-primary">Se connecter</div>
</form>
<?php endif; ?>
<?php
require 'elements/footer.php'
?>