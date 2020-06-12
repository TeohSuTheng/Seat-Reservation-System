<?php
include_once 'dbh.inc.php';
$check = TRUE;
                 
//SELECT FROM DB : occupied seats
$query = "SELECT * FROM temp;"; //WHERE userId = 1..
$result = mysqli_query($conn, $query) or die("Error in query:$query.". mysqli_error());
        
if(mysqli_num_rows($result) > 0)
{
   // echo $_POST['seat'][0];
    
     while($row = mysqli_fetch_assoc($result))
     {
         
         foreach($_POST['seat'] as $seatChosen)
         {
             if($seatChosen==$row['seat'])
             {
                // echo $row['seat'];
                 $check = FALSE;
                 //header("Location:../draft.php?signup=fail");
             }
         }
     }
          

          
if(is_array($_POST['seat']))
{
    
    if($check==TRUE)
    {
                        
    echo "Here is your selection: <br/>";
    $username = strval($_POST['username']);
    
    //foreach
    foreach ($_POST['seat'] as $output)
        {
         echo "<i>seat $output</i><br/>";
         $seat = strval($output);
        
        //INSERT INTO DB
        $sql = "INSERT INTO temp VALUES('$seat','$username');";
        mysqli_query($conn, $sql);
       }
    }
  

//forward to payment.php
//header("Location:../draft.php?signup=success");
  
else{
    echo "The seat is already occupied. Please go back and select another seat.";
    ?>
<br>
<a href="../seat_page.php">Back</a>
<?php
}
}
    mysqli_free_result($result);
    mysqli_close($conn);
}
?>

