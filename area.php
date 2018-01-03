<?php

function convert_to_square_meters($value, $from_unit) {
  switch($from_unit) {
    case 'square_inches':
      return $value * pow(0.0254,2);
      break;
    case 'square_feet':
      return $value * pow(0.3048,2);
      break;
    case 'square_yards':
      return $value * pow(0.9144,2);
      break;
    case 'square_miles':
      return $value * pow(1609.344,2);
      break;
    case 'square_millimeters':
      return $value * pow(0.001,2);
      break;
    case 'square_centimeters':
      return $value * pow(0.01,2);
      break;
    case 'square_meters':
      return $value;
      break;
    case 'square_kilometers':
      return $value * pow(1000,2);
      break;
    default:
      return "Unsupported unit.";
  }
}
  
function convert_from_square_meters($value, $to_unit) {
  switch($to_unit) {
    case 'square_inches':
      return $value / pow(0.0254,2);
      break;
    case 'square_feet':
      return $value / pow(0.3048,2);
      break;
    case 'square_yards':
      return $value / pow(0.9144,2);
      break;
    case 'square_miles':
      return $value / pow(1609.344,2);
      break;
    case 'square_millimeters':
      return $value / pow(0.001,2);
      break;
    case 'square_centimeters':
      return $value / pow(0.01,2);
      break;
    case 'square_meters':
      return $value;
      break;
    case 'square_kilometers':
      return $value / pow(1000,2);
      break;
    default:
      return "Unsupported unit.";
  }
}

function convert_area($value, $from_unit, $to_unit) {
  $meter_value = convert_to_square_meters($value, $from_unit);
  $new_value = convert_from_square_meters($meter_value, $to_unit);
  return $new_value;
}

$from_value = '';
$from_unit = '';
$to_unit = '';
$to_value = '';

if($_POST['submit']) {
  $from_value = $_POST['from_value'];
  $from_unit = $_POST['from_unit'];
  $to_unit = $_POST['to_unit'];
  
  $to_value = convert_area($from_value, $from_unit, $to_unit);
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Convert Area</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>

    <div id="main-content">

      <h1>Convert Area</h1>
  
      <form action="" method="post">
        
        <div class="entry">
          <label>From:</label>&nbsp;
          <input type="text" name="from_value" value="<?php echo $from_value; ?>" />&nbsp;
          <select name="from_unit">
            <option value="square_inches"<?php if($from_unit == 'square_inches') { echo " selected"; } ?>>square inches</option>
            <option value="square_feet"<?php if($from_unit == 'square_feet') { echo " selected"; } ?>>square feet</option>
            <option value="square_yards"<?php if($from_unit == 'square_yards') { echo " selected"; } ?>>square yards</option>
            <option value="square_miles"<?php if($from_unit == 'square_miles') { echo " selected"; } ?>>square miles</option>
            <option value="square_millimeters"<?php if($from_unit == 'square_millimeters') { echo " selected"; } ?>>square millimeters</option>
            <option value="square_centimeters"<?php if($from_unit == 'square_centimeters') { echo " selected"; } ?>>square centimeters</option>
            <option value="square_meters"<?php if($from_unit == 'square_meters') { echo " selected"; } ?>>square meters</option>
            <option value="square_kilometers"<?php if($from_unit == 'square_kilometers') { echo " selected"; } ?>>square kilometers</option>
          </select>
        </div>
        
        <div class="entry">
          <label>To:</label>&nbsp;
          <input type="text" name="to_value" value="<?php echo $to_value; ?>" />&nbsp;
          <select name="to_unit">
            <option value="square_inches"<?php if($to_unit == 'square_inches') { echo " selected"; } ?>>square inches</option>
            <option value="square_feet"<?php if($to_unit == 'square_feet') { echo " selected"; } ?>>square feet</option>
            <option value="square_yards"<?php if($to_unit == 'square_yards') { echo " selected"; } ?>>square yards</option>
            <option value="square_miles"<?php if($to_unit == 'square_miles') { echo " selected"; } ?>>square miles</option>
            <option value="square_millimeters"<?php if($to_unit == 'square_millimeters') { echo " selected"; } ?>>square millimeters</option>
            <option value="square_centimeters"<?php if($to_unit == 'square_centimeters') { echo " selected"; } ?>>square centimeters</option>
            <option value="square_meters"<?php if($to_unit == 'square_meters') { echo " selected"; } ?>>square meters</option>
            <option value="square_kilometers"<?php if($to_unit == 'square_kilometers') { echo " selected"; } ?>>square kilometers</option>
          </select>
          
        </div>
        
        <input type="submit" name="submit" value="Submit" />
      </form>
  
      <br />
      <a href="index.php">Return to menu</a>
      
    </div>
  </body>
</html>
