<?php include_once 'templates/header.php'?>
<link rel="stylesheet" href="css/form.css">
<?php include_once 'templates/navbar.php'?>

<form action="methodes/userCreate.php" method="post">
    <div class="form">
      <div class="title">Bienvenu,</div>
      <div class="subtitle">Créez-vous un compte ici !</div>
      <div class="input-container ic1">
        <input id="pseudo" class="input" type="text" name="pseudo" placeholder=" " autocomplete="off"/>
        <div class="cut"></div>
        <label for="pseudo" class="placeholder">Pseudo</label>
      </div>
      <div class="input-container ic2">
        <input id="email" class="input" type="text" name="email" placeholder=" " autocomplete="off"/>
        <div class="cut cut-short"></div>
        <label for="email" class="placeholder">Email</label>
      </div>
      <div class="input-container ic2">
        <input id="password" class="input" type="password" name="password" placeholder=" " />
        <div class="cut cut-long"></div>
        <label for="password" class="placeholder">Mot De Passe</label>
      </div>

      <button type="submit" class="submit">Créer mon compte</button>
    </div>
</form>

<?php include_once 'templates/footer.php'?>
