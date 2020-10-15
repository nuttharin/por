<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>10.10</title>
</head>
<body>
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
    
      
        <button type="button" id="register-btn" class="btn btn-primary pull-right">ลงทะเบียน</button>
    </form>
    </div>
    
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
      
        //console.log(id)202.44.235.51:200/get/dataInvitationByID?id=1
              
        
            $('#register-btn').on('click',function(){
            
                console.log($('#name').val())
                // if($('#name').val() != "" &&  $('#name').val() != null)
                // { 

                    settings = {
                        "url": "http://202.44.235.51:200/post/insertGuest",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },
                        "data": JSON.stringify({"name":$('#name').val()}),
                    };

                    $.ajax(settings).done(function (response) {
                        console.log(response);
                        location.reload();
                    });
                // }
                // else {
                //     alert("กรุณากรอกข้อมูล");
                //    // window.location.href = "http://202.44.235.51/QRcode/registerUnknow.php";  
                // }
            })
            
       
       
        //console.log(settings)
    
    });
</script>