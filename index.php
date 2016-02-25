<!DOCTYPE html>
<html lang='en'>
<head>
    <title>P2 - xkcd Password Generator</title>
    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link href='css/styles.css' rel='stylesheet'>
    <link href='css/main.css' rel='stylesheet'>

    <?php require('logic.php'); ?>
</head>
<body>
    <div class='container'>

        <h1>xkcd Password Generator</h1>

          <p class='password'><?=$password?></p>

        <form role='form' action='index.php' method='GET'>
            <div class='form-group'>
                <label for='wordtotal'>Number of words</label>
                <input maxlength=1 type='text' name='wordtotal' id='wordtotal' value='<?php echo $num_words; ?>'>  <!--(minimum of 4 words, maximum of 8 words) -->

            <div class='form-group'>
              <input type='checkbox' name='add_number' id='add_number' value="1" <?php if(isset($_GET['add_number'])) { echo 'checked'; } ?> >
              <label for='add_number'>Add a number</label>
              <input type='checkbox' name='add_symbol' id='add_symbol' value="1" <?php if(isset($_GET['add_symbol'])) { echo 'checked'; } ?> >
              <label for='add_symbol'>Add a symbol</label>
            </div>

            <div class='form-group'>
              <div class="col-xs-2 col-md-offset-5">
                <label for='case'>Casing:</label>
                <select class='form-control' name='case' id='case'>
                    <option <?php if (isset($_GET["case"]) && $_GET["case"]=="lowercase") echo "selected";?>>lowercase</option>
                    <option <?php if (isset($_GET["case"]) && $_GET["case"]=="UPPERCASE") echo "selected";?>>UPPERCASE</option>
                    <option <?php if (isset($_GET["case"]) && $_GET["case"]=="CamalCase") echo "selected";?>>CamalCase</option>
                </select>

            </div>
            <div class='form-group'>
              <div class="col-xs-2 col-md-offset-5">
                <label for='seperator'>Select a seperator:</label>
                <select class='form-control' name='seperator' id='seperator'>
                    <option <?php if (isset($_GET["seperator"]) && $_GET["seperator"]=="Hyphen") echo "selected";?>>Hyphen</option>
                    <option <?php if (isset($_GET["seperator"]) && $_GET["seperator"]=="Space") echo "selected";?>>Space</option>
                    <option <?php if (isset($_GET["seperator"]) && $_GET["seperator"]=="None") echo "selected";?>>None</option>
                </select>
            </div>

              <div>
              <div class="col-xs-2 col-md-offset-5">
            <button type='submit' class='btn btn-default'>Submit</button>
            <div class='error'><?=$error?></div>
          </div>
          <br>
					<a href="http://xkcd.com/936/">
            <img class="img" src="img/xkcd.png" alt="xkcd comic">
          </a>
        </form>

    </div>

</body>
</html>
