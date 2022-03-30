<?php
    include_once 'header.php';
?>
    <!-- <div class="search-container">
        <form action="/insertlink.php">
            <input type="text" placeholder="Search..." name="search" style=text-align:center;>
            <button type="submit">
                <img src="https://cdn0.iconfinder.com/data/icons/very-basic-2-android-l-lollipop-icon-pack/24/search-512.png" width=20 height=20></button>
            </form>
	</div> -->

    <div class = "search_body">
        <head2>
            <title>Search</title>
            <link rel="stylesheet" href="style.css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        </head2>
        <form action="search.inc.php" method="post">
        <h2>Search</h2>
            <div class = "signup_input">
                <input type="text" name="search" placeholder="search..." id="ipassword">
                <i><span class="material-icons-outlined" id ="search" onclick="toggle()">search</span></i>
            </div>
            <div><a href="searchquery.php" class="message_signredirect" >Advanced Search</a></div>
            <!-- <div class = "search_button">
                <button type="submit">Search</button>
                <button type="submit">
                <img src="https://cdn0.iconfinder.com/data/icons/very-basic-2-android-l-lollipop-icon-pack/24/search-512.png" width=20 height=20></button>
            </div> -->
        </form>
    </div>
    
<?php
    include_once 'footer.php';
?>
