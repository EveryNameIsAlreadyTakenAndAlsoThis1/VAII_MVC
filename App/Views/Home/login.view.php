<?php /** @var Array $data */ ?>
<div aria-hidden="true" class="modal fade" id="modalForm" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="modal-header">

                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <label for="username"></label><input class="form-control" id="username" name="username"
                                                             placeholder="Username" type="text"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <label for="password"></label><input class="form-control" id="password" name="password"
                                                             placeholder="Password"
                                                             type="password"/>
                    </div>
                    <div class="mb-3 form-check">
                        <input class="form-check-input" id="rememberMe" type="checkbox"/>
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="modal-footer d-block">
                        <p class="float-start">Not yet account <a href="#">Sign Up</a></p>
                        <button class="btn btn-primary float-end" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
