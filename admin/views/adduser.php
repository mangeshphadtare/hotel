<?php include "db.php" ?>

<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<title> Hotel || Adduser</title>
<?php include "lib.php"?>
<script type="text/javascript">
 function showDiv() {
   document.getElementById('Sign-In').style.display = "block";
   document.getElementById('add').style.display = "none";

}


 function delDiv() {
   document.getElementById('Sign-In').style.display = "none";
   document.getElementById('add').style.display = "";
}

</script>
<script>
$(function(){
        //acknowledgement message
    var message_status = $("#status");
    $("td[contenteditable=true]").blur(function(){
        var field_userid = $(this).attr("id") ;
        var value = $(this).text() ;
        $.post('editAction.php' , field_userid + "=" + value, function(data){
            if(data != '')
                        {
                               alert('updated successfully');
                                message_status.show();
                                message_status.text(data);
                                //hide the message
                             //   setTimeout(function(){message_status.hide()},3000);
                        }
        });
    });
});

</script>

 </head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
       <?php include 'header.php';?> <!-- header-->
        <?php include 'sidebar.php';?> <!-- siderbar-->

        <div class="content-wrapper" id="body-content">  <!-- body-content-wrapper-->

       <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>  Add Floor Users   </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Adduser</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- right column -->
                 <input type="button" class="btn btn-success" id="add" name="add" value="Add User" onclick="showDiv()" /><br><br>
            <div class="col-md-8 col-md-offset-2">
              <!-- Horizontal Form -->
              <div class="box box-info" id="Sign-In" style="display:none;">
              <!--div class="box box-info"-->
                <div class="box-header with-border">
                  <h3 class="box-title">Add User</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="connectivity.php">
                  <div class="box-body" >

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Name">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username">
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="inputpassword" class="col-sm-2 control-label" name="password">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                      </div>
                    </div>
                    </div>
                  <div class="box-footer">
                     <input type="button" id="cancel" name="cancel" value="Cancel" onclick="delDiv()" />
                    <button type="submit" class="btn btn-info pull-right" name="adduser">Add User</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->

                  </div><!-- /.box-body -->
              <table class="table table-condensed table-responsive">
                  <thead style="background-color: #4D4D4D;">
                    <tr style="color: #FFF; background-color: #4CAF50;">
                      <th ></th>
                      <th >Name</th>
                      <th >UserName</th>
                      <th >Password</th>
                      <th ></th>
                    </tr>
                  </thead>
                </table>

                <div class="div-table-content" id="table-content">
                  <table class="table table-condensed table-striped table-responsive"style="margin-bottom: 0px;">
                    <tbody  id="items" style="text-align:center;">
                      <?php
 $result= mysql_query("SELECT * FROM UserName");

while ($row = mysql_fetch_assoc($result)) {
?>

       <tr>
            <td><?php echo $row['UserNameID']; ?></td>
            <td id="name:<?php echo $row['UserNameID']; ?>" contenteditable="true"><?php echo $row['name']; ?></td>
            <td id="userName:<?php echo $row['UserNameID']; ?>" contenteditable="true"><?php echo $row["userName"]; ?></td>
            <td id="pass:<?php echo $row['UserNameID']; ?>" contenteditable="true"><?php echo $row["pass"]; ?></td>
            </tr>


<?php
};
?>


                  </tbody>
                </table>
       
   </div><!-- /.box-body -->
        </section><!-- /.content -->

        </div><!-- body-content-wrapper-->


     <?php include 'footer.php';?> <!--footer-->
         <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
<?php include "lib_js.php"?>
</body>
</html>      

                






