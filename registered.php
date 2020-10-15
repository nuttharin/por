<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10.10</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>



</head>
<body>
<div class="container">
    <br><br>
    <h2>แขกที่ลงทะเบียนแล้ว</h2>
    <table id="data" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
        let datatableObject = $('#data').dataTable({
            responsive : true
        });
        let Datatable = new Array();
        datatableObject.fnClearTable();

        var settings = {
            "url": "http://202.44.235.51:200/get/dataInvitation",
            "method": "GET",
            "timeout": 0,
         };
         

        $.ajax(settings).done(function (response) {
            console.log(response);
            for (let i = 0; i < response.data.length; i++) {
                if(response.data[i].status == "Y"){
                    var ret = [] ;
                    ret[0] = response.data[i].name ;
                    ret[1] = response.data[i].phone ;
                    Datatable.push(ret);
                    console.log(response.data[i]);
                }
              


            }
            if(Datatable.length > 0)
            {
                console.log("ddd")
                datatableObject.fnAddData(Datatable);
            }
        });
       



    });
</script>
</script>