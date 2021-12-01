<?php /** @var Array $data */ ?>
<div class="container" id="aboutContent">
    <hr class="divider">
    <div class="row featurette">
        <div class="col-sm-4 offset-sm-4">
            <?php if($data['error'] != ""){ ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong><?= $data["error"] ?></strong>
            </div>
            <?php }?>
            <form name="formLogin" method="post" action="?c=auth&a=login" onsubmit="return validateLogin(document.formLogin)">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input  class="form-control" name="login" id="exampleFormControlInput1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleFormControlInput2" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary login">Login</button>
                </div>
            </form>
        </div>

    </div>
</div>