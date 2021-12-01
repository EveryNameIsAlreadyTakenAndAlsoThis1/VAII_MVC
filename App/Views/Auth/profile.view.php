<?php /** @var Array $data */ ?>
<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4 profile">
                    <div class="card-body text-center">
                        <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-chat/ava3.png" alt="avatar"
                             class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"><?= unserialize($_SESSION['user'])->nickname ?> </h5>

                        <div class="d-flex justify-content-center mb-2">
                            <a href="?c=auth&a=changeNicknameForm" type="button" class="btn btn-primary">Change
                                nickname</a>
                            <a type="?c=auth&a=changeProfilePicture" class="btn btn-outline-primary ms-1">Change Profile
                                Picture</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="card mb-4 profile">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Full Name</p>
                            </div>
                            <div class="col-sm-6">
                                <form name="fullNameForm" method="post" action="?c=auth&a=changeFullName" onsubmit="return validateFullName(document.fullNameForm.fullName)" >
                                    <div class="input-group mb-3">
                                        <input name="fullName" type="text" class="form-control"
                                               value="<?= unserialize($_SESSION['user'])->fullName ?>"
                                               aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                            Change
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-6">
                                <form name="emailForm" method="post" action="?c=auth&a=changeEmail" onsubmit="return validateEmail(document.emailForm.email)" >
                                    <div class="input-group mb-3">
                                        <input name="email" type="text" class="form-control"
                                               value="<?= unserialize($_SESSION['user'])->email ?>"
                                               aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                            Change
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Password</p>
                            </div>

                            <div class="col-sm-3">
                                <a href="?c=auth&a=changePasswordForm" class="btn btn-outline-secondary" type="submit"
                                   id="button-addon2">Change
                                </a>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Mobile</p>
                            </div>
                            <div class="col-sm-6">
                                <form name="mobileForm" method="post" action="?c=auth&a=changeMobile" onsubmit="return validateMobile(document.mobileForm.mobile)">
                                    <div class="input-group mb-3">
                                        <input name="mobile" type="text" class="form-control"
                                               value="<?= unserialize($_SESSION['user'])->mobile ?>"
                                               aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                            Change
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-6">
                                <form name="adressForm" method="post" action="?c=auth&a=changeAdress" onsubmit="return validateAdress(document.adressForm.adress)">
                                    <div class="input-group mb-3">
                                        <input name="adress" type="text" class="form-control"
                                               value="<?= unserialize($_SESSION['user'])->adress ?>"
                                               aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                            Change
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <a href="?c=auth&a=deleteAccountForm" class="btn btn-outline-secondary"
                                       type="submit" id="button-addon2">
                                        Delete Account
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
