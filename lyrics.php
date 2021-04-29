<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ( !empty($_POST['artist']) AND !empty($_POST['song_title']) ) {

        // Save form input
        $artist_input = $_POST['artist'];
        $song_title_input = $_POST['song_title'];

        // Replace spaces by dashes to use in URL
        $artist = str_replace(' ','-',$artist_input);
        $song_title = str_replace(' ','-',$song_title_input);

        // Create URL
        $api_url = 'https://api.lyrics.ovh/v1/'.$artist.'/'.$song_title.'/';

        // curl handler
        $ch = curl_init();

        // curl options
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Run and save
        $response = curl_exec($ch);

        // Error check
        if($e = curl_error($ch)) {
            echo $e;
        } 
        else { // no curl error

            // URL to string and decode JSON response
            $output = json_decode($response, true);

            if( !isset($output['error'])) { // geen error in output, lyrics found

                // save the lyrics to output in HTML
                $lyrics =  $output['lyrics'];

                // done, close handler
                curl_close($ch);
            } else { // song not found
                $url = 'http://lyricsfinder.test';
                header('Location: ' . $url . '?e=notfound');
            }
        } //end error check 
    } else { // fields empty
        $url = 'http://lyricsfinder.test';
        header('Location: ' . $url . '?e=emptyfields');
    }

} else { // fields empty
    $url = 'http://lyricsfinder.test';
    header('Location: ' . $url);
}
?>

<!-- End script, Start HTML -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Raleway:wght@300;500&display=swap" rel="stylesheet"> 
    <title>Song Lyrics</title>
<header></header>
    <div class="container">

        
<div class="content">

<h1>The Lyrics of <?php echo ucwords($song_title_input) . ' by ' . ucwords($artist_input); ?>:</h1>
        <div class="wrapper">
            <div class="lyrics">
                <p>
                <?php echo $lyrics; ?>
</p>
            </div>
            <a href="http://lyricsfinder.test"><button class="btn rtrn-btn">Go Back</button</a>
        </div>
</div>
       

    </div>
</head>
<body>
    
</body>
</html>