
 <?php  


 function fetch_data()  
 {  

 }  


      ?>
      <?php
      $output = '';  
$connect = new PDO("mysql:host=localhost;dbname=projet;charset:utf8", "root", "");
      $sql = "SELECT * FROM client ORDER BY id ASC";  
      $result = $connect->prepare($sql);
$result->execute();  

      while($row = $result->fetchAll(PDO::FETCH_ASSOC))  
      {       
        for($i = 0; $i < count($row); $i++)
        { 
      $output .= '<tr>  
                          <td>'.$row[$i]["id"].'</td>  
                          <td>'.$row[$i]["nom"].'</td>  
                          <td>'.$row[$i]["prenom"].'</td>  
                          <td>'.$row[$i]["age"].'</td>  
                          <td>'.$row[$i]["num"].'</td>
                          <td>'.$row[$i]["email"].'</td> 
                          <td>'.$row[$i]["role"].'</td> 
                     </tr>  
                          ';  
      }  
    }
     ?>
    
    
    
    
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Oxygym+</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    
      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <br>
              <i class="fa fa-globe"></i> Liste des clients
              <small class="pull-right"></small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <br>
            From
            <address>
              <strong>oxygym+</strong><br>
              Tunis<br>
              Phone: (+216) 70685613<br>
              Email: oxygymplus.fitness@gmail.tn
    
            </address>
          </div>
          <br>
          <!-- /.col -->
          
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
    
        <!-- Table row -->
        <table border="1" cellspacing="0" cellpadding="5">  
          <thead>
           <tr>  
                <th width="10%">Identifiant</th>  
                <th width="13%">Nom</th>  
                <th width="13%">Prenom</th>  
                <th width="9%">Age</th>  
                <th width="20%">Num</th>
                <th width="20%">E-mail</th>
                <th width="20%">Role</th> 
             
    
        </tr>
      </thead>
      <tbody>
          <?= $output; ?>
        </tbody>
    </table>
    
        <!-- /.row -->
    
        <div class="row">
          <!-- accepted payments column -->
          
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    
    </body>
    </html>
 