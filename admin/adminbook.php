<?php
    include_once 'adminpanel.php';

    if(isset($_REQUEST['reset'])){
        $_SESSION["Name"] = '';
        $_SESSION["Author"] = '';
        $_SESSION["Genre"] = '';
        $_SESSION["ISBN"] = '';
        $_SESSION["Publisher"] = '';
        $_SESSION["Date-From"]= '';
        $_SESSION["Date-To"] = '';
        $_SESSION["Rental-From"] = '';
        $_SESSION["Rental-To"] = '';
    }

    if(isset($_REQUEST['submit'])){
        $_SESSION["Name"] = filter_var($_REQUEST['Name'],FILTER_SANITIZE_STRING);
        $_SESSION["Author"] = filter_var($_REQUEST['Author'],FILTER_SANITIZE_STRING);
        $_SESSION["Genre"] = filter_var($_REQUEST['Genre'],FILTER_SANITIZE_STRING);
        $_SESSION["ISBN"] = filter_var($_REQUEST['ISBN'],FILTER_SANITIZE_NUMBER_INT);
        $_SESSION["Publisher"] = filter_var($_REQUEST['Publisher'],FILTER_SANITIZE_STRING);
        $_SESSION["Date-From"]= $_REQUEST['Date-From'];
        $_SESSION["Date-To"] = $_REQUEST['Date-To'];
        $_SESSION["Rental-From"] = filter_var($_REQUEST['Rental-From'],FILTER_SANITIZE_NUMBER_INT);
        $_SESSION["Rental-To"] = filter_var($_REQUEST['Rental-To'],FILTER_SANITIZE_NUMBER_INT);
    }

    $Output = '';

    if(!empty($_SESSION["Name"])){
        $Output = $Output .' AND Name LIKE\'%' .$_SESSION["Name"] .'%\'';
    }
    if(!empty($_SESSION["Author"])){
        $Output = $Output .' AND Full_name LIKE\'%' .$_SESSION["Author"] .'%\'';
    }
    if(!empty($_SESSION["Genre"])){
        $Output = $Output .' AND Genre_type=\'' .$_SESSION["Genre"] .'\'';
    }
    if(!empty($_SESSION["ISBN"])){
        $Output = $Output .' AND ISBN LIKE\'%' .$_SESSION["ISBN"] .'%\'';
    }
    if(!empty($_SESSION["Publisher"])){
        $Output = $Output .' AND Publisher_name=\'' .$_SESSION["Publisher"] .'\'';
    }
    if(!empty($_SESSION["Date-From"]) || !empty($_SESSION["Date-To"])){
        $Output = $Output .' AND Publish_date BETWEEN \'' .$_SESSION["Date-From"] .'\' AND \'' .$_SESSION["Date-To"] .'\'';
    }
    if(!empty($_SESSION["Rental-From"]) || !empty($_SESSION["Rental-To"])){
        $Output = $Output .' AND Rental_status BETWEEN \'' .$_SESSION["Rental-From"] .'\' AND \'' .$_SESSION["Rental-To"] .'\'';
    }


?>

    <div class="content">
        <p class="heading">Books</p>
        <button class="add-item" onclick="location.href='book/bookadd.php';">
            Add Book
        </button>
        <button class="add-item" onclick="location.href='key/author.php';">
            Add Author
        </button>
        <button class="add-item" onclick="location.href='key/genre.php';">
            Add Genre
        </button>
        <button class="add-item" onclick="location.href='key/publisher.php';">
            Add Publisher
        </button>

        <?php
            if(!empty($_GET['sort'])){
                if(!empty($_SESSION["sortby"])){
                    if(strpos($_SESSION["sortby"], 'ASC') !== false){
                        $_SESSION["sortby"] = 'DESC';
                        $sort = 'DESC';
                        $icon = '<i><span class="material-icons-outlined">arrow_drop_down</span></i>';
                    }
                    else{
                        $_SESSION["sortby"] = 'ASC';
                        $sort = 'ASC';
                        $icon = '<i><span class="material-icons-outlined">arrow_drop_up</span></i>';
                    }
                }
            }
            else{
                unset($_SESSION["sortby"]);
                unset($_SESSION['sort']);
                $_GET['sort'] = 'Book_id';
                $sortby = 'Book_id';
                $_SESSION["sortby"] = 'ASC'; 
                $sort = 'ASC';
                $icon = '<i><span class="material-icons-outlined">arrow_drop_up</span></i>';
            }
        ?>

        <form class="admin-form">
            <h3 class="display-header">Search by:</h3>
            <div class = "signup-input">
                <label class="label-single">Name:</label>
                    <input list="listName" name="Name" placeholder="Book name...">
                        <datalist id="listName">
                            <?php
                                $sql = "SELECT Name, Deleted_id FROM book WHERE Deleted_id = 0";
                                if($result = mysqli_query($con,$sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            $temp = $row['Name'];
                                            echo "<option>$temp</option>";
                                        }
                                    }
                                }
                            ?>
                        </datalist>
                    </input>  

                <label class="label-single">Author:</label>
                    <input list="listAuthor" name="Author" placeholder="Author name...">
                        <datalist id="listAuthor">
                            <?php
                                $sql = "SELECT Full_name FROM author";
                                if($result = mysqli_query($con,$sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            $temp = $row['Full_name'];
                                            echo "<option>$temp</option>";
                                        }
                                    }
                                }
                            ?>
                        </datalist> 
                    </input>


                <label class="label-single">Genre:</label>
                    <input list="listGenre" name="Genre" placeholder="Genre type...">
                        <datalist id="listGenre">
                            <?php
                                $sql = "SELECT Genre_type FROM genre";
                                if($result = mysqli_query($con,$sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            $temp = $row['Genre_type'];
                                            echo "<option>$temp</option>";
                                        }
                                    }
                                }
                            ?>
                        </datalist>
                    </input>
                
                <label class="label-single">ISBN:</label>
                    <input list="listISBN" name="ISBN" placeholder="ISBN #...">
                        <datalist id="listISBN">
                            <?php
                                $sql = "SELECT ISBN, Deleted_id FROM book WHERE Deleted_id = 0";
                                if($result = mysqli_query($con,$sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            $temp = $row['ISBN'];
                                            echo "<option>$temp</option>";
                                        }
                                    }
                                }
                            ?>
                        </datalist>
                    </input> 

                <label class="label-single">Publisher:</label>
                    <input list="listPublisher" name="Publisher" placeholder="Publisher name...">
                        <datalist id="listPublisher">
                            <?php
                                $sql = "SELECT Publisher_name FROM publisher";
                                if($result = mysqli_query($con,$sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            $temp = $row['Publisher_name'];
                                            echo "<option>$temp</option>";
                                        }
                                    }
                                }
                            ?>
                        </datalist>
                    </input> 

                <br><br><label class="label-single">Published From:</label>
                    <input type="date" name="Date-From"></input>
                    <label class="label-single">To</label>
                    <input type="date" name="Date-To"></input>
                <label class="label-space">Rental Amount From:</label>
                    <input type="text" name="Rental-From" placeholder="#..."></input>
                    <label class="label-single">To</label>
                    <input type="text" name="Rental-To" placeholder="#..."></input> 
                <label class="label-button">
                    <button type="submit" name ="submit">Search</button>
                </label>
                <label class="label-button">
                    <button type="submit" name ="reset">Reset</button>
                </label>         
            </div>
        </form>





        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <table class="admin-table" >
            <tr>
                <th onclick="location.href='adminbook.php?sort=Book_id';" onmouseover="" style="cursor: pointer;">ID
                    <?php if($_GET['sort'] == 'Book_id'){echo $icon; $_SESSION["sort"] = 'Book_id'; $sortby = $_SESSION["sort"];}?>
                </th>
                <th onclick="location.href='adminbook.php?sort=Name';" onmouseover="" style="cursor: pointer;">Name
                    <?php if($_GET['sort'] == 'Name'){echo $icon; $_SESSION["sort"] = 'Name'; $sortby = $_SESSION["sort"];}?>
                </th>
                <th onclick="location.href='adminbook.php?sort=FName';" onmouseover="" style="cursor: pointer;">Author First
                    <?php if($_GET['sort'] == 'FName'){echo $icon; $_SESSION["sort"] = 'FName'; $sortby = $_SESSION["sort"];}?>
                </th>
                <th onclick="location.href='adminbook.php?sort=LName';" onmouseover="" style="cursor: pointer;">Author Last
                    <?php if($_GET['sort'] == 'LName'){echo $icon; $_SESSION["sort"] = 'LName'; $sortby = $_SESSION["sort"];}?>
                </th>
                <th onclick="location.href='adminbook.php?sort=Genre_type';" onmouseover="" style="cursor: pointer;">Genre
                    <?php if($_GET['sort'] == 'Genre_type'){echo $icon; $_SESSION["sort"] = 'Genre_type'; $sortby = $_SESSION["sort"];}?>
                </th>
                <th onclick="location.href='adminbook.php?sort=ISBN';" onmouseover="" style="cursor: pointer;">ISBN
                    <?php if($_GET['sort'] == 'ISBN'){echo $icon; $_SESSION["sort"] = 'ISBN'; $sortby = $_SESSION["sort"];}?>
                </th>
                <th onclick="location.href='adminbook.php?sort=Publisher_name';" onmouseover="" style="cursor: pointer;">Publisher
                    <?php if($_GET['sort'] == 'Publisher_name'){echo $icon; $_SESSION["sort"] = 'Publisher_name'; $sortby = $_SESSION["sort"];}?>
                </th>
                <th onclick="location.href='adminbook.php?sort=Publish_date';" onmouseover="" style="cursor: pointer;">Published
                    <?php if($_GET['sort'] == 'Publish_date'){echo $icon; $_SESSION["sort"] = 'Publish_date'; $sortby = $_SESSION["sort"];}?>
                </th>
                <th onclick="location.href='adminbook.php?sort=Rental_status';" onmouseover="" style="cursor: pointer;">Rental
                    <?php if($_GET['sort'] == 'Rental_status'){echo $icon; $_SESSION["sort"] = 'Rental_status'; $sortby = $_SESSION["sort"];}?>
                </th>
                <th>Actions</th>
            </tr>

            <?php
                include '../connect.php';
                $sql="SELECT book.Book_id, book.Name, author.FName, author.LName, author.Full_name, book.Name, publisher.Publisher_name, genre.Genre_type, book.ISBN, book.Publish_date, book.Rental_status
                        FROM book
                        INNER JOIN author ON book.Author=author.Author_id
                        INNER JOIN publisher ON book.Publisher=publisher.Publisher_id
                        INNER JOIN genre ON book.Genre=genre.Genre_id
                        WHERE Deleted_id=0 $Output
                        ORDER BY $sortby $sort";
                $result=mysqli_query($con,$sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $ID=$row['Book_id'];
                        $Name=$row['Name'];
                        $FAuthor=$row['FName'];
                        $LAuthor=$row['LName'];
                        $Genre=$row['Genre_type'];
                        $ISBN=$row['ISBN'];
                        $Publisher=$row['Publisher_name'];
                        $Published=$row['Publish_date'];
                        $Rental=$row['Rental_status'];
                        echo '<tr>
                            <td>'.$ID.'</td>
                            <td>'.$Name.'</td>
                            <td>'.$FAuthor.'</td>
                            <td>'.$LAuthor.'</td>
                            <td>'.$Genre.'</td>
                            <td>'.$ISBN.'</td>
                            <td>'.$Publisher.'</td>
                            <td>'.$Published.'</td>
                            <td>'.$Rental.'</td>
                            <td>
                                <button style="background: #5970d9;"><a href="book/bookupdate.php?updateid='.$ID.'" style="color: black;">Update</a>
                                <button style="background: #d96459;"><a href="book/bookdelete.php?deleteid='.$ID.'" style="color: black;">Delete</a>
                            </td> 
                        </tr>';
                    }
                }
            ?>
        </table> 
    </div>
</section>

<?php
    include_once '../footer.php';
?>