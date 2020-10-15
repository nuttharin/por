<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10.10</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <!-- <h1>Hello P.JAME</h1> -->

    <div class="container">
        <br>
    <h2>ผู้ร่วมงาน</h2>
    <hr>
    <form>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="email">ชื่อ-นามสกุล:</label>
                    <input type="text" class="form-control" id="name" >
                </div>
            </div>
            

        </div>
    
      
        <button type="button" id="register-btn" class="btn btn-primary pull-right"></button>
    </form>
    </div>

</body>
</html>

<script type="text/javascript">
$(document).ready(function(){

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const id = urlParams.get('user');
    //console.log(id)202.44.235.51:200/get/dataInvitationByID?id=1
    var settings = {
        "url": "http://202.44.235.51:200/get/dataInvitationByID?id="+id,
        "method": "GET",
        "timeout": 0,
    };
    if(id != null)
    {
        $.ajax(settings).done(function (response) {
            console.log(response);
            $("#name").val(response.data[0].name);
            $('#groupid').val(response.data[0].group);
            if(response.data[0].status == 'N')
            {
                $('#register-btn').text("ลงทะเบียน")
            }
            else {
                $('#register-btn').text("ลงทะเบียนแล้ว")
                $('#register-btn').prop( "disabled", true );

            }
        });
    
        $('#register-btn').on('click',function(){
          

            settings = {
                "url": "http://202.44.235.51:200/post/updateStatus",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },
                "data": JSON.stringify({"id":id.toString()}),
            };

            $.ajax(settings).done(function (response) {
                console.log(response);
                location.reload();
            });
        })
    }
    else {
        //alert("ไม่มีข้อมูลของแขกคนนี้");
        window.location.href = "http://202.44.235.51/QRcode/registerUnknow.php";  

    }
    //console.log(settings)
   
});
</script>

