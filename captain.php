<?php 

  
      $table='';
      $serverName = "cadateserever1103.database.windows.net"; // update me
      $connectionOptions = array(
        "Database" => "Cadatedatabasestatus", // update me
        "Uid" => "pushpak", // update me
        "PWD" => "Bahale123" // update me
      );
        //Establishes the connection
      $conn = sqlsrv_connect($serverName, $connectionOptions);
      if($conn==false){
        die(print_r(sqlsrv_errors(), true));
    }else{
      $sql="SELECT * FROM details";
      $results=sqlsrv_query($conn,$sql);
      
      while ($row = sqlsrv_fetch_array($results,SQLSRV_FETCH_ASSOC) ) {
        $table.= "<tr>
            <th scope='row'>".$row['Emp_ID']."</th>
            <td>".$row['Ship']."</td>
            <td>".$row['Msg']."</td>
            <td>".$row['Time']."</td>";
            if($row['Attendence'] == 'Approved'){
            $table.="<td><button type='button'class='btn btn-success'><a href='captain.php?id=".$row['Emp_ID']."'>".$row['Attendence']."</a></button></td></tr>";
            }
            else{
              $table.="<td><button type='button'class='btn btn-danger'><a href='captain.php?id=".$row['Emp_ID']."'>".$row['Attendence']."</a></button></td></tr>";
            }
      }
      if (isset($_GET['id'])) {
          $Emp_ID=$_GET['id'];
          $update = "UPDATE details SET Attendence = 'Approved' WHERE Emp_ID = '$Emp_ID'";
          $results=sqlsrv_query($conn,$update);
          if ($results) {
            header('Location: captain.php');
          }

      }
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Captain-Page</title>
    <style type="text/css">
      a{
        color: white;
      }
    </style>
  </head>
  <body>
    <div class='container'>
      <h1>Captain Portal</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Emp_ID</th>
            <th scope="col">Ship</th>
            <th scope="col">Message</th>
            <th scope="col">Date</th>
            <th scope="col">Attendence</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            if($table){
              echo "$table";
            }
          ?>
        </tbody>
      </table>
      <a href="index.php" style="color: blue">Home</a>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>