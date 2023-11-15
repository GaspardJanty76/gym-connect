<?php include_once 'templates/header.php'?>
<link rel="stylesheet" href="css/form.css">
<?php include_once 'templates/navbar.php'?>
<form action="methodes/userConnect.php" method="post">
    <div class="form form-2">
        <div class="title">Bonjour,</div>
        <div class="subtitle">Identifiez-vous ici !</div>
        <div class="input-container ic2">
            <input id="email" class="input" type="text" name="email" placeholder=" " autocomplete="off"/>
            <div class="cut cut-short"></div>
            <label for="email" class="placeholder">Email</label>
        </div>
        <div class="input-container ic2">
            <input id="password" class="input" type="password" name="password" placeholder=" " />
            <div class="cut cut-long"></div>
            <label for="password" class="placeholder">Mot de passe</label>
        </div>

        <button type="submit" class="submit">Se connecter</button>
    </div>
</form>
