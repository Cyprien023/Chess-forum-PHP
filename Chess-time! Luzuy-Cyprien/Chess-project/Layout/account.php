<?php require("../Layout/header.php") ?>


<?php
// Créé une instance de la classe "SubjectManager"
$userManager = new UserManager();
// Stock tous les objects "Subject" renvoyés par la méthode "getAll()"
$user = $userManager->get($_SESSION["id"]); // TODO: ...
?>


<h2 class="user-account">Account</h2>
<div class="container-account">
<section class="container">
    <h3 class="subject-title"><?= $user->getUserName() ?></h3>
    <br>
    <h3 class="subject-title"><?= $user->getElo() ?></h3>
</section>
</div>

<?php require("../Layout/footer.php") ?>
</body>

</html> 