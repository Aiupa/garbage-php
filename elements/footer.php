<!-- /.container -->
<hr>
<footer>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form class="form-inline" action="/newsletter.php" method="POST">
            <div class="form-group">
                <input type="email" name="email" placeholder="Entrez votre e-mail">
            </div>
            <button class="btn btn-primary" type="submit">S'inscrire</button>
        </form>
    </div>
    <div class="col-md-4">
        <h5>Navigation</h5>
        <ul class="list-unstyled text-small">
            <?= nav_menu() ?>
        </ul>
    </div>
</div>
</footer>

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>