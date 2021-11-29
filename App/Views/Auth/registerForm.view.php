<?php /** @var Array $data */ ?>

<div class="container" id="aboutContent">
    <hr class="divider">
    <div class="row featurette">
        <div class="col-sm-4 offset-sm-4">
            <form method="post" action="?c=auth&a=register">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input class="form-control" name="login" id="exampleFormControlInput1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="login" id="exampleFormControlInput2" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleFormControlInput3" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Repeat your Password</label>
                    <input type="password" class="form-control" name="passwordRepeat" id="exampleFormControlInput4" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary login">Register</button>
                </div>
            </form>
        </div>

    </div>
</div>