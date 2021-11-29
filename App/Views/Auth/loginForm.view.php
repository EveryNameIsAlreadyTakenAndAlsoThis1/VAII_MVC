<?php /** @var Array $data */ ?>

<div class="container" id="aboutContent">
    <hr class="divider">
    <div class="row featurette">
        <div class="col-sm-4 offset-sm-4">
            <form method="post" action="?c=auth&a=login">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input  class="form-control" name="login" id="exampleFormControlInput1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Heslo</label>
                    <input type="password" class="form-control" name="password" id="exampleFormControlInput2" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary login">Login</button>
                </div>
            </form>
        </div>

    </div>
</div>