<?php require("../Layout/header.php") ?>
<?php
// Stock tous les objects "Subject" renvoyés par la méthode "getAll()"
$subjects = $subjectManager->getAll();
$i = 0;

// Parcours le tableau d'objets "Subject" pour afficher chacun de leur titre
foreach ($subjects as $subject) { ?>
    <p><?= $subject->getSubjectTitle() ?></p>
<?php
}
?>

<a href="./create.php">
<h2 class="subject-forum">Forum</h2>
</a>
<div class="container">
    <section class="container">
        <?php foreach ($subjects as $subject) : ?>
            <a href="./forum.php?id=<?= $subject->getId() ?>">
                <h3 class="subject-title"><?= $subject->getSubjectTitle() ?></h3>
            </a>

        <?php
            $i++;
        endforeach
        ?>
    </section>
</div>

<?php require("../Layout/footer.php") ?>
</body>

</html>