<<<<<<< Updated upstream
$(document).ready(function() {
	$("#studentForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'function/submit_fun.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#studentForm').css("opacity",".5");
            },
            success: function(response){ 
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#studentForm')[0].reset();
                    alert(response.message);
                    window.location = 'student_add.php';
                }else if(response.status == 0){
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#studentForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            },error: function(exception){
                $('.statusMsg').html(exception.message);
                $('#studentForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
    $("#studentRegForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../admin/function/submit_fun.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#studentRegForm').css("opacity",".5");
            },
            success: function(response){ 
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#studentRegForm')[0].reset();
                    alert(response.message);
                    window.location = 'index.php';
                }else if(response.status == 0){
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                    alert(response.message);
                }
                $('#studentRegForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            },error: function(exception){
                $('.statusMsg').html(exception.message);
                $('#studentRegForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
                alert(exception.message);
            }
        });
    });
});

    
=======
$(document).ready(function() {
    $("#loginForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../admin/function/submit_fun.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#loginForm').css("opacity",".5");
                $('.statusMsg1').html('');
            },
            success: function(response){ 
                $('.statusMsg1').html(response.message);
                if(response.status == 1){
                    $('#loginForm')[0].reset();
                    window.location = response.page;
                }else if(response.status == 0){
                    $('.statusMsg1').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#loginForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            },error: function(exception){
                $('.statusMsg1').html(exception.message);
                $('#loginForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
    $("#userSelfRegForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../admin/function/submit_fun.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#userSelfRegForm').css("opacity",".5");
                $('.statusMsg').html('');
            },
            success: function(response){ 
                if(response.status == 1){
                    $('#userSelfRegForm')[0].reset();
                    $('.statusMsg').html(response.message);
                    $('.login_btn').hide();
                    $('.login_btn2').css("visibility", "visible");
                    //window.location = response.page;
                }else if(response.status == 0){
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                    $('.statusMsg').html(response.message);
                }
                $('#userSelfRegForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            },error: function(exception){
                $('.statusMsg').html(exception.message);
                $('#userSelfRegForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
                alert(exception.message);
            }
        });
    });
    $("#userRegForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'function/submit_fun.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#userRegForm').css("opacity",".5");
                $('.statusMsg').html('');
            },
            success: function(response){ 
                if(response.status == 1){
                    $('#userRegForm')[0].reset();
                    $('.statusMsg').html(response.message);
                    window.location = response.page;
                }else if(response.status == 0){
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                    $('.statusMsg').html(response.message);
                }
                $('#userRegForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            },error: function(exception){
                $('.statusMsg').html(exception.message);
                $('#userRegForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
    $("#semesterForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'function/submit_fun.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#semesterForm').css("opacity",".5");
            },
            success: function(response){ 
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#semesterForm')[0].reset();
                    $('.statusMsg').html(response.message);
                    window.location = 'semester.php';
                }else if(response.status == 0){
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                    $('.statusMsg').html(response.message);
                }
                $('#semesterForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            },error: function(exception){
                $('.statusMsg').html(exception.message);
                $('#semesterForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
                alert(exception.message);
            }
        });
    });
    $("#courseForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'function/submit_fun.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#courseForm').css("opacity",".5");
                $('.statusMsg').html('');
            },
            success: function(response){ 
                if(response.status == 1){
                    $('#courseForm')[0].reset();
                    $('.statusMsg').html(response.message);
                    window.location = "course.php";
                }else if(response.status == 0){
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                    $('.statusMsg').html(response.message);
                }
                $('#courseForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            },error: function(exception){
                $('.statusMsg').html(exception.message);
                $('#courseForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
    $("#subjectForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'function/submit_fun.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#subjectForm').css("opacity",".5");
                $('.statusMsg').html('');
            },
            success: function(response){ 
                alert(response.message);
                if(response.status == 1){
                    $('#subjectForm')[0].reset();
                    $('.statusMsg').html(response.message);
                    window.location = "subject.php";
                }else if(response.status == 0){
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                    $('.statusMsg').html(response.message);
                }
                $('#subjectForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            },error: function(exception){
                $('.statusMsg').html(exception.message);
                $('#subjectForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
                alert(exception.message);
            }
        });
    });
    $("#assignmentsForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../admin/function/submit_fun.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#assignmentsForm').css("opacity",".5");
                $('.statusMsg').html('');
            },
            success: function(response){ 
                alert(response.message);
                if(response.status == 1){
                    $('#assignmentsForm')[0].reset();
                    $('.statusMsg').html(response.message);
                    window.location = "assignments.php";
                }else if(response.status == 0){
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                    $('.statusMsg').html(response.message);
                }
                $('#assignmentsForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            },error: function(exception){
                $('.statusMsg').html(exception.message);
                $('#assignmentsForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
                alert(exception.message);
            }
        });
    });
    $("#assignmentsSubmitForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../admin/function/submit_fun.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#assignmentsSubmitForm').css("opacity",".5");
                $('.statusMsg').html('');
            },
            success: function(response){ 
                alert(response.message);
                if(response.status == 1){
                    $('#assignmentsSubmitForm')[0].reset();
                    $('.statusMsg').html(response.message);
                    window.location = "assignments.php";
                }else if(response.status == 0){
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                    $('.statusMsg').html(response.message);
                }
                $('#assignmentsSubmitForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            },error: function(exception){
                $('.statusMsg').html(exception.message);
                $('#assignmentsSubmitForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
                alert(exception.message);
            }
        });
    });
    $("#announcementForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../admin/function/submit_fun.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#announcementForm').css("opacity",".5");
                $('.statusMsg').html('');
            },
            success: function(response){ 
                alert(response.message);
                if(response.status == 1){
                    $('#announcementForm')[0].reset();
                    $('.statusMsg').html(response.message);
                    window.location = "announcement.php";
                }else if(response.status == 0){
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                    $('.statusMsg').html(response.message);
                }
                $('#announcementForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            },error: function(exception){
                $('.statusMsg').html(exception.message);
                $('#announcementForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
                alert(exception.message);
            }
        });
    });
});

    
>>>>>>> Stashed changes
