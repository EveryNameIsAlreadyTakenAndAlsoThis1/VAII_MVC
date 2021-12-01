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
            <form name="passwordForm" method="post" action="?c=auth&a=changePassword" onsubmit="return validatePassword(document.passwordForm.newPassword)">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Old password</label>
                    <input  type="password" class="form-control" name="oldPassword" id="exampleFormControlInput1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="newPassword" id="exampleFormControlInput2" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">New Password Repeat</label>
                    <input type="password" class="form-control" name="newPasswordRepeat" id="exampleFormControlInput3" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary login">Change</button>
                </div>
            </form>
        </div>

    </div>
</div>