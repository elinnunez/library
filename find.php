<style>
    .main-container{
        background-color: red;
    }

    .table-container {
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        background-color: white;
        height: 100vh;
        background-color: #C8102E;
    }
    
    h2 {
        color: white;
    }

    table {
        border-radius: 10px;
    }
    
    table, th, td {
        border: 1px solid black;
        text-align: left;
        background-color: white;
    }

    th, td {
        padding: 15px;
        border-radius: 5px;
    }
</style>

<!-- 
<!DOCTYPE html>
<html> -->
  <?php include_once 'header.php';
  ?>
<!-- <body> -->
    <div class="main-container">
    <button class="" onclick="location.href='catalog.php';">Back</button>
        <div class="table-container">
            <h2>Search Results</h2>
            <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $dbname = 'team1dbms';   
                
                // Creating connection to db
                $connection = mysqli_connect($servername, $username, $password, $dbname);
                
                // Check if connection was successful or not
                
                if(!$connection) {
                  die ('Connection unsuccessful : '.mysqli_connect_error());
                } else {
                //   echo 'Connection Success';
                }

                $term = htmlspecialchars($_POST['ssearch']);

                if($term == "") {
                    // echo "<script>alert('Enter a keyword to search')</script>";
                    header('location: catalog.php');
                } else {
                    echo $term."<br/>";
                    
                    // $test = "SELECT * WHERE category= ";
                    
                    $checked = $_POST['check'];
                    if(empty($checked)) {
                        echo "No checkboxes chosen";
                    } else {
                        foreach($checked as $choice) {
                            // $test.= " $choice and category= "; 
                            echo htmlspecialchars($choice)."<br/>";
                        } 
                    }

                    // echo $test."<br/>";
                    
                    
                    // Query the table for the records
                    $sql = "SELECT * FROM ITEM WHERE ITEM.Item_id  LIKE '%$term%'"; // set up query
                    $result = mysqli_query($connection, $sql); // store result of our query in $result
                    $rowCount = mysqli_num_rows($result); // store the number of rows in the result movieflix_table
                    
                    if($rowCount > 0) {
                        echo "
                        <table>
                        <thead>
                        <tr>
                        <th>Item ID</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>ISBN</th>
                        <th>Status ID</th>
                        <th>Year</th>
                        <th>Genre</th>
                        <th>Author</th>
                        <th>Distributer
                        </tr>
                                </thead>
                                ";
                    }
                }
            ?> <!-- End PHP code block -->

            <?php
            while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['itemID'] ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['type'] ?></td>
                    <td><?php echo $row['isbn'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['genre'] ?></td>
                    <td><?php echo $row['year'] ?></td>
                    <td><?php echo $row['author'] ?></td>
                    <td><?php echo $row['distributer'] ?></td>
                </tr>
            <?php endwhile ?>
            </table>
        </div>           
    </div>
<!-- </body> -->
<!-- </html> -->
<?php
    include_once 'footer.php';
?>
