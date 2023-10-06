
<?php require("../Layout/header.php") ?>

<?php 
  // Créé une instance de la classe "SubjectManager"
  if ($_POST) {
    $user = new User($_POST);
    
    $userManager->add($user);
    $_SESSION["id"] = $userManager->getLastId();
    echo "<script>window.location.href='./account.php'</script>";
  }
  ?>

    <form method="post">
        <div class="form-group">
            <label for="username" class="form-title">User Name</label>
            <input type="text" class="form-control1" name="userName" id="username" aria-describedby="usernamehelp" placeholder="Patrick...">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-password1">Password</label>
            <input type="password" class="form-control2" name="password" id="password1" placeholder="Bob...">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-password2">Confirm Password</label>
            <input type="password" class="form-control3" name="password1" id="password2" placeholder="Bob...">
        </div>
        <div class="form-group">
            <label for="elo" class="form-password3">Elo</label>
            <input type="number" class="form-control4" name="elo" id="elo" placeholder="1200...">
        </div>

        <button type="submit" class="btnsubmit">
            <p class="text-submit">Submit</p>
        </button>
    </form>

  



    <?php require("../Layout/footer.php") ?>
</body>

</html>