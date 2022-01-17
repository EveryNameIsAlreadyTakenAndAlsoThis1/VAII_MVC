<?php /** @var Array $data */ ?>

<section>

    <div class="container py-5">
        <?php if($data['error'] != ""){ ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong><?= $data["error"] ?></strong>
            </div>
        <?php }?>
        <?php if($data['success'] != ""){ ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong><?= $data["success"] ?></strong>
            </div>
        <?php }?>
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
<!--                            <a type="?c=auth&a=changeProfilePicture" class="btn btn-outline-primary ms-1">Change Profile-->
<!--                                Picture</a>-->
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
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name of the tournament</th>
                    <th>Game</th>
                    <th>Number of players</th>
                    <?php if(\App\Auth::isLogged()){
                        ?><th>Leave</th>
                    <?php }?>

                </tr>
                </thead>
                <tbody id="myTable">
                <?php
                $user=unserialize($_SESSION['user']);
                $tournamentss = \App\Models\Tournament_user::getAll("userId=?",[$user->id]);
                for ($x = 0; $x < sizeof($tournamentss); $x++){
                    $tournament=\App\Models\Tournament::getOne($tournamentss[$x]->tournamentId);
                    ?>
                    <tr id=<?="trId".$tournament->id?> >
                        <td><?= $tournament->id?></td>
                        <td><a href=<?= "?c=home&a=tournament&q=".$tournament->id?>><?= $tournament->name?></a></td>
                        <td><?= $tournament->game?></td>
                        <td id=<?="numberOfPlayers".$tournament->id?>><?= sizeof($t=\App\Models\Tournament_user::getAll("tournamentId=?",[$tournament->id])) ?></td>
                        <?php if(\App\Auth::isLogged()){
                            ?><td><button value=<?= $tournament->id?> type="button" class="btn btn-outline-danger leaveProfile" >leave</button></td>
                        <?php } ?>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>
