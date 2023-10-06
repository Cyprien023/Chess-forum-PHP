<?php require("../Layout/header.php") ?>

<?php
// Créé une instance de la classe "PostManager"
if ($_POST) {
    $post = new Post($_POST);
    $post->setSubject_id($_GET["id"]);
    $postManager->add($post);
    echo "<script>window.location.href='./index.php'</script>";
}
?>



<form method="post">
    <div class="form-div-post">
        <label for="subject" class="form-content">Content</label>
        <input type="subject" class="form-post" name="content" id="subject" aria-describedby="subjecthelp" placeholder="What do you think...?">
    </div>
    <!-- <div class="form-group">
      <label for="exampleInputPassword1" class="form-content">Content</label>
      <input type="content" class="form-control2" id="content" placeholder="What about the French opening">
    </div> -->

    <button type="submit" class="btnsubmit-post">
        <p class="text-submit">Submit</p>
    </button>
</form>
<?php


$user = $userManager->get($_SESSION["id"]);
$subject = $subjectManager->get($_GET["id"]);
?>
<h2 class="post-forum"><?= $subject->getSubjectTitle() ?></h2>
<div class="container-post">
    <section class="container">

        <?php
        $posts = $postManager->getAllBySubjectId($_GET["id"]);
        $i = 0;

        foreach ($posts as $post) : ?>
            <nobr>
                <p class="post-content"><?= $post->getContent() ?> ,by <?= $user->getUserName() ?>
                <p id="para-1">0</p><button class="btn-blue" id="btn1">Like !</button></p>
            </nobr>
            <br>
        <?php
            $i++;
        endforeach
        ?>
    </section>
</div>



<?php require("../Layout/footer.php") ?>

<script src="./script/script.js"></script>

</body>

</html>