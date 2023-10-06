<?php require("../Layout/header.php") ?>

<?php 
  // Créé une instance de la classe "SubjectManager"
  if ($_POST) {
    $subject = new Subject($_POST);
    $subjectManager->add($subject);
    echo "<script>window.location.href='./index.php'</script>";
  }
  ?>



  <form method="post">
    <div class="form-group">
      <label for="subject" class="form-title">Subject title</label>
      <input type="subject" class="form-control1" name="subjectTitle" id="subject" aria-describedby="subjecthelp" placeholder="What is the best opening...">
    </div>
    <!-- <div class="form-group">
      <label for="exampleInputPassword1" class="form-content">Content</label>
      <input type="content" class="form-control2" id="content" placeholder="What about the French opening">
    </div> -->

    <button type="submit" class="btnsubmit">
      <p class="text-submit">Submit</p>
    </button>
  </form>



  <?php require("../Layout/footer.php") ?>
</body>

</html>