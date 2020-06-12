<?php
include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Seat Reservation System</title>
        <link rel="stylesheet" type="text/css" href="Styles/styleSeat.css">
    </head>
    
    <body>
        <?php
	//first page
	//create session
	session_start();
	?>
        
        <h1>Bus seat selection</h1>
        
 
             <?php
             
             if(!isset($_POST['submit'])){
                 $occupied = array();   //store occupied seats
                 
                //SELECT FROM DB : occupied seats
                $query = "SELECT * FROM temp;"; //WHERE userId = 1..
                $result = mysqli_query($conn, $query) or die("Error in query:$query.".mysqli_error());
        
                if(mysqli_num_rows($result) > 0)
                {
                    echo 'Seats occupied: ';
                    while($row = mysqli_fetch_assoc($result))
                    {
                        //to fetch all results frm $result 
                        //insert data to $row in array
                        // ['username'-> 'a,b', 'userAge -> 23,23 ....]
                        echo $row['seat']."  ";
                        $occupied[]=$row['seat'];
                    }
                    
                }
        
                //display form
             ?>
            <br>
                <h4>Please select your seat(s):</h4>
                <br><br>
                
                <div class="container">
                <form action ="Includes/process.php" method="POST"> 
                 
                    <label>Enter your name:</label>
                    <input type="text" name="username" size="20" placeholder="Full name">
                    
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                <div class="container-item" >
                                <input type="checkbox" name="seat[]" value="A1"/> 
                                    <label for="A1"> A1</label>
                                </div></td>

                                <td>
                                <div class="container-item">
                                <input type="checkbox" name="seat[]" value="A2"/> 
                                    <label> A2</label> 
                                </div></td>
                                
                                <td>
                                    <div id="path"></div>
                                </td>
                                </td>
                                
                                <td>
                                <div class="container-item">
                                <input type="checkbox" name="seat[]" value="A3"/>
                                    <label for="A3"> A3</label> 
                                </div></td>
                        
                            </tr>
                            <tr>
                                <td><div class="container-item">
                                    <input type="checkbox" name="seat[]" value="B1"/>
                                    <label for="B1"> B1</label> 
                                    </div></td>

                                    <td><div class="container-item">
                                    <input type="checkbox" name="seat[]" value="B2"/> 
                                     <label for="B2"> B2</label> 
                                    </div></td>
                                    
                                    <td>
                                    <div id="path"></div>
                                    </td>
                                    
                                    <td><div class="container-item">
                                    <input type="checkbox" name="seat[]" value="B3"/> 
                                    <label for="B3"> B3</label> 
                                    </div></td>
                            </tr>
                            <tr>
                                <td><div class="container-item">
                                    <input type="checkbox" name="seat[]" value="C1"/>
                                    <label for="C1"> C1</label> 
                                    </div></td>

                                    <td><div class="container-item">
                                    <input type="checkbox" name="seat[]" value="C2"/> 
                                     <label for="C2"> C2</label> 
                                    </div></td>
                                    
                                    <td>
                                    <div id="path"></div>
                                    </td>
                                    
                                    <td><div class="container-item">
                                    <input type="checkbox" name="seat[]" value="C3"/> 
                                    <label for="C3"> C3</label> 
                                    </div></td>
                            </tr>
                            <tr>
                                <td><div class="container-item">
                                    <input type="checkbox" name="seat[]" value="D1"/>
                                    <label for="D1"> D1</label> 
                                    </div></td>

                                    <td><div class="container-item">
                                    <input type="checkbox" name="seat[]" value="D2"/> 
                                     <label for="D2"> D2</label> 
                                    </div></td>
                                    
                                    <td></td>

                                    <td><div class="container-item">
                                    <input type="checkbox" name="seat[]" value="D3"/> 
                                    <label for="D3"> D3</label> 
                                    </div></td>
                            </tr>
                            <tr>
                                <td><div class="container-item">
                                    <input type="checkbox" name="seat[]" value="E1"/>
                                    <label for="E1"> E1</label> 
                                    </div></td>

                                    <td><div class="container-item">
                                    <input type="checkbox" name="seat[]" value="E2"/> 
                                     <label for="E2"> E2</label> 
                                    </div></td>
                                    
                                    <td></td>

                                    <td><div class="container-item">
                                    <input type="checkbox" name="seat[]" value="E3"/> 
                                    <label for="E3"> E3</label> 
                                    </div></td>
                            </tr>
                    </table>
                    <br><br>
                    <div id ="button" >
                    <input class="button" type="submit" name="submit" value="Submit">
                    </div>
                    <br><br><br> 

                    
                </form>
                </div>
                <?php
                     mysqli_free_result($result);
                     mysqli_close($conn);
                }  
               
                ?>
                    

        
        
    </body>
</html>

