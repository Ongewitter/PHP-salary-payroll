<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
  <?php
    include './models/month.php';

    $yearErr = $year = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (empty($_POST['year'])) {
        $yearErr = 'Year is required';
      } else {
        $year = test_input($_POST['year']);
        if(!is_numeric($year)) {
          $yearErr = 'Year is not a valid number';
        }
      }

      if (!$yearErr) {
        $tmpName = tempnam(sys_get_temp_dir(), 'data');
        $file = fopen($tmpName, 'w');
  
        writePaydatesForYear($file, $year);
        downloadPayDates($tmpName, $year);
      }
    }

    function writePaydatesForYear($file, $year) {
      fwrite($file, 'Month,PayDate,BonusDate' . PHP_EOL);

      for ($i = 0; $i < 12; $i++){
        $date = date(strtotime($year . '-' . ($i + 1) . '-1'));

        $month = new Month($date);
        fwrite($file, $month->toString() . PHP_EOL);
      }

      fclose($file);
    }

    function downloadPayDates($fileName, $year) {
      // Set Headers
      header('Content-Description: File Transfer;');
      header('Content-Type: application/csv; charset=UTF-8');
      header('Content-Disposition: attachment; filename=myPayDates-' . $year . '.csv;');
      header('Content-Length: ' . filesize($fileName));

      // Clean up after ourselves
      ob_clean();
      flush();
      readfile($fileName); // Actually send the file
      unlink($fileName);
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  ?> 

  <h2>Pay Date calculation</h2>
      
  <form method='POST' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'>
    </div>
      <label for='year'>Year:</label>
      <input type='text' name='year' id='year'>
      <span class="error"><?php echo $yearErr;?></span>
    </div>

    <div>
      <input type='submit' name='submit' value='Submit'> 
    </div>
  </form>


 </body>
</html>

