<!-- Lyrics homepage

Contains field for Artist and Song Title.
Form is processedby lyrics.php

API source is lyrics.ovh
 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Raleway:wght@300;500&display=swap" rel="stylesheet"> 
    <title>Find The Lyrics</title>
</head>
<body>

<header>

</header>
<div class="content">
    <div class="wrapper">
        <div class="search-form">
        
            <form action="lyrics.php" method="POST">
                <fieldset>
                    <legend><h2>Search the lyrics:</h2></legend>
                    <label for="artist">Artist:</label>
                    <input type="text" id="artist" name="artist"><br><br>
                    <label for="song_title">Song Title:</label>
                    <input type="text" id="song_title" name="song_title"><br><br>
            
                    <input type="submit" value="Submit">

                    <!-- Display errors -->
                    <?php
                    
                    // check if error is set
                    if ( isset($_GET['e']) ) {

                        $e = $_GET['e'];
                        
                        echo '<p class="error">';

                        switch ($e) {
                            case "emptyfields":
                                echo 'Please fill in all fields.';
                                break;
                            
                                case "notfound":
                                    echo 'Sorry...song not found. Have another try?';
                                    break;
                        } 
                        echo '</p>';
                    }
                    ?>

                </fieldset>
            </form>
        </div>


        <div class="social">
            <span class="social-link">For more info check: </span>
            <a href="https://github.com/sandervdwnl" class="social-icon">
                <img src="img/GitHub-Mark-Light-64px.png" width="32"  alt="github-icon" id="github-icon" target="_blank">
            </a>
            <a href="https://windt.dev" class="social-icon">
                <img src="img/website-home-page.png" width="32" alt="home-icon"  id="home-icon" target="_blank">
            </a>
        </div>
    </div>
</div>

    
</body>
</html>