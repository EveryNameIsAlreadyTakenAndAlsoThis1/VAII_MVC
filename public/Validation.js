function validateForm(){
    let emailValid=validateEmail(document.forms["formRegister"]["email"]);
    let nicknameValid=validateNickname(document.forms["formRegister"]["login"]);
    let passwordValid=validatePassword(document.forms["formRegister"]["password"]);
    let msg="";

    if(emailValid===false || nicknameValid===false || passwordValid===false) {
        if(!nicknameValid){
            msg+="Username can only contain characters A-Z, a-z and 0-9.\n";
        }
        if (!emailValid){
            msg+="You have entered an invalid email address!\n";
        }
        if(!passwordValid){
            msg+="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters!\n";
        }
        alert(msg)
        return false;
    }
    return true;
}
function validateEmail(pEmail){
    const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let email = pEmail;
    if(!email.value.match(mailformat)) {
        alert("You have entered an invalid email address!\n");
       email.classList.remove("invalid");
        email.classList.add("invalid");
        return false;
    }else{
        email.classList.remove("invalid");
        return true;
    }
}
function validateNickname(pUsername) {
    let username = pUsername;
    if (!username.value.match(/^[a-zA-Z0-9]+$/)) {
        alert("You have entered an invalid nickname!\n");
        username.classList.remove("invalid");
        username.classList.add("invalid");
        return false;
    } else {
        username.classList.remove("invalid");
        return true;
    }
}
function validatePassword(pPassword){
    let password=pPassword;
    if(!password.value.match(/[a-z]/g)||!password.value.match(/[A-Z]/g)||!password.value.match(/[0-9]/g)||password.value.length<8){
        alert("You have entered an invalid password!\n");
        password.classList.remove("invalid");
        password.classList.add("invalid");
        return false;
    }else{
        password.classList.remove("invalid");
        return true;
    }
}

function validateFullName(pFullName){
    let fn=pFullName;
    if(!fn.value.match(/^([a-zA-Z0-9]+|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{1,}|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{3,}\s{1}[a-zA-Z0-9]{1,})$/g)){
        alert("You have entered an invalid name!\n");
        fn.classList.remove("invalid");
        fn.classList.add("invalid");
        return false;
    }else{
        fn.classList.remove("invalid");
        return true;
    }
}

function validateMobile(pMobile){
    let mobile=pMobile;
    if(!mobile.value.match(/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/)){
        alert("You have entered an invalid mobile!\n");
        mobile.classList.remove("invalid");
        mobile.classList.add("invalid");
        return false;
    }else{
        mobile.classList.remove("invalid");
        return true;
    }
}
function validateAdress(pAdress){
    let ad=pAdress;
    if(!ad.value.match(/^[a-zA-Z0-9\s,.'-]{3,}$/)){
        alert("You have entered an invalid address!\n");
        ad.classList.remove("invalid");
        ad.classList.add("invalid");
        return false;
    }else{
        ad.classList.remove("invalid");
        return true;
    }
}
function validateLogin(pLoginForm){
    let login=pLoginForm;
    let loginResult=validateNickname(login.login);
    let passwordResult=validatePassword(login.password);
    if(!loginResult || !passwordResult){
        return false;
    }else{
        return true;
    }
}

$(document).ready(function(){
    $("#myInput").on("keyup", function() {
        let value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});


$(document).ready(function(){
    $('.join').click(function(){
        let d=$(this).val();
        $.ajax({
            type:"POST",
            url:"?c=home&a=joinTournament",
            data:{tournamentId:d},
            success:function (response){
                $("#numberOfPlayers"+d).text(response);
                console.log(response);
            },
            error:function (){
                alert("err");
            }
        });
    });
});

$(document).ready(function(){
    $('.leave').click(function(){
        let d=$(this).val();
        $.ajax({
            type:"POST",
            url:"?c=home&a=leaveTournament",
            data:{tournamentId:d},
            success:function (response){
                $("#numberOfPlayers"+d).text(response);
                console.log(response);
            },
            error:function (){
                alert("err");
            }
        });
    });
});


$(document).ready(function(){
    $('.delete').click(function(){
        let d=$(this).val();
        $.ajax({
            type:"POST",
            url:"?c=home&a=deleteTournament",
            data:{tournamentId:d},
            success:function (response){
                $("#trId"+d).remove();
                console.log(response);
            },
            error:function (){
                alert("err");
            }
        });
    });
});

$(document).ready(function(){
    $('.remove').click(function(){
        let d=$(this).val();
        const arr=d.split("_");
        console.log(d);
        $.ajax({
            type:"POST",
            url:"?c=home&a=removeParticipant",
            data:{participantId:arr[0],tournamentId:arr[1]},
            success:function (response){
                $("#trId"+arr[0]).remove();
                console.log(response);
            },
            error:function (){
                alert("err");
            }
        });
    });
});

$(document).ready(function(){
    $('.removeSponsor').click(function(){
        let d=$(this).val();
        const arr=d.split("_");
        console.log(d);
        $.ajax({
            type:"POST",
            url:"?c=home&a=removeSponsor",
            data:{sponsorId:arr[0],tournamentId:arr[1]},
            success:function (response){
                $("#trId"+arr[0]).remove();
                $("#pricePool").text(response);
                console.log(response);
            },
            error:function (){
                alert("err");
            }
        });
    });
});

$(document).ready(function(){
    $('.leaveProfile').click(function(){
        let d=$(this).val();
        $.ajax({
            type:"POST",
            url:"?c=home&a=leaveTournament",
            data:{tournamentId:d},
            success:function (response){
                $("#trId"+d).remove();
            },
            error:function (){
                alert("err");
            }
        });
    });
});


$(document).ready(function(){
    $('.insert').click(function(){
        let name=$('#nameT').val();
        let game = $('#gameT').val();
        $.ajax({
            type:"POST",
            url:"?c=home&a=addTournament",
            data:{tournamentName:name,tournamentGame:game},
            success:function (response){
            $("body").html(response);
            },
            error:function (){
                alert("err");
            }
        });
    });
});


$(document).ready(function(){
    $('.insertSponsor').click(function(){
        let name=$('#nameT').val();
        let pool = $('#poolT').val();
        let id=$(this).val();
        $.ajax({
            type:"POST",
            url:"?c=home&a=addSponsor",
            data:{sponsorName:name,sponsorPool:pool,tournamentId:id},
            success:function (response){
                $("body").html(response);
            },
            error:function (){
                alert("err");
            }
        });
    });
});



