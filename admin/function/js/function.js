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

    
