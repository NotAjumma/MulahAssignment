<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mulah Technologies Assignment</title>
</head>
<body>
  <!-- write by Muhamad Akmal Adha bin Radzuan - 011-23053082 -->
   <?php
    // load value from file
    $csvFilePath = 'Table_Input.csv';
    $csvFile = fopen($csvFilePath, 'r');
    $table1Data = array(); // create array to store Table 1 data

      if ($csvFile !== false) {
        $firstRow = true; // Flag to skip the first row

          while (($row = fgetcsv($csvFile)) !== false) {
            if ($firstRow) {
            $firstRow = false;
            continue; // Skip the first row
        }
              $index = $row[0];
              $value = $row[1];
              $table1Data[$index] = $value;
          }
          fclose($csvFile);
      }

      // print_r($table1Data);
      
      ?>
    <div class="content">
       
        <div class="table-1" style="">
        <h2>Table 1</h2>
            <table border="1" style="width: 400px; " id="table1">
            <tr>
              <th>Index #</th>
              <th>Value</th>
            </tr>
                <!-- Table 1 generate using JavaScript -->
            </table>
            
        </div>

        <div class="table-2">
            <h2>Table 2</h2>
            <table border="1" style="width: 400px; text-align: center;" id="table2">
                <tr>
                    <th>Category</th>
                    <th>Value</th>
                </tr>
            </table>
        </div>
    </div>

    <script>
      var table1Data = <?php echo json_encode($table1Data); ?>;
      console.log(table1Data);

      // Convert string values to numbers
      for (var key in table1Data) {
          table1Data[key] = parseInt(table1Data[key], 10);
      }

      // Create Table 1
      var table1 = document.getElementById('table1');
      for (var index in table1Data) {
          var row = table1.insertRow();
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);

          cell1.textContent = index;
          cell2.textContent = table1Data[index];
      }

      // Create Table 2
      var table2 = document.getElementById('table2');

      // Alpha
      var alphaRow = table2.insertRow();
      var alphaCell1 = alphaRow.insertCell(0);
      var alphaCell2 = alphaRow.insertCell(1);
      alphaCell1.textContent = 'Alpha';
      alphaCell2.textContent = table1Data['A5'] + ' + ' + table1Data['A20'] + ' = ' + (table1Data['A5'] + table1Data['A20']);

      // Beta
      var betaRow = table2.insertRow();
      var betaCell1 = betaRow.insertCell(0);
      var betaCell2 = betaRow.insertCell(1);
      betaCell1.textContent = 'Beta';
      betaCell2.textContent = table1Data['A15'] + ' / ' + table1Data['A7'] + ' = ' + (table1Data['A15'] / table1Data['A7']);

      // Charlie
      var charlieRow = table2.insertRow();
      var charlieCell1 = charlieRow.insertCell(0);
      var charlieCell2 = charlieRow.insertCell(1);
      charlieCell1.textContent = 'Charlie';
      charlieCell2.textContent = table1Data['A13'] + ' * ' + table1Data['A12'] + ' = ' + (table1Data['A13'] * table1Data['A12']);
  
    </script>
</body>
</html>
