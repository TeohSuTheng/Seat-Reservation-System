<?php
include_once 'dbh.inc.php';
$check = TRUE;
                 
//SELECT FROM DB : occupied seats
$sql = "SELECT * FROM temp;"; //WHERE userId = 1..
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
        
if($resultCheck > 0){
     while($row = mysqli_fetch_assoc($result)){
         foreach($_POST['seat'] as $seatChosen){
             if($seatChosen=$row['seat']){
                 $check = FALSE;
                 //header("Location:../draft.php?signup=fail");
             }
         }
     }
          
}
          
if(is_array($_POST['seat'])){
    
    if($check==TRUE){
                        
    echo "Here is your selection: <br/>";
    $username = strval($_POST['username']);
    echo gettype($username);
    //foreach
    foreach ($_POST['seat'] as $output){
         echo "<i>seat $output</i><br/>";
         $seat = strval($output);
         echo gettype($seat);
        
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
    <a href="../draft.php">Back</a>
<?php
}
}
?>

