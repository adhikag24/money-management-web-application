<?php
    require_once('Connection.php');
    require_once('Show.php');
    require_once('ViewRecord.php');
?>
<!-- OOP OOP -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Management</title>
</head>
<body>
<h1>Money Management</h1>
    <form action="controller.php" method="POST">
        <h3>Add:</h3> 
        Rp.
        <input type="number" id="money" name="money" required>
        <select name="type" id="type">
            <option value="outcome">Outcome</option>
            <option value="income">Income</option>
        </select>  <br> <br>
        <button type="submit" id="submit" name="submit">Submit</button>
    </form>
    <table>
    <?php 
        global $totalExpenses;
        global $totalIncome;
        $record = new ViewRecord();
        if (!empty($record->showAllRecord())):
            foreach($record->showAllRecord() as $data):
                if ($data['type'] == 'outcome'){
                    //global $totalExpenses; 
                    $totalExpenses += $data['money'];
                }
                if ($data['type'] == 'income'){
                    //global $totalIncome;
                    $totalIncome += $data['money'];
                }
                ?>
                <tr>
                    <th> <?php echo "Rp. " . number_format($data['money'],0,",",".") ?> </th>
                    <th> <?php echo $data['type'] ?> </th>
                    <th> <?php echo $data['date'] ?> </th>
                    <th> <a href="controller.php?id=<?php echo $data['id']; ?>">Delete</a></th>
                </tr>      
        <?php
            endforeach;
            $balance = $totalIncome - $totalExpenses;
            echo "Your Expenses: " . $totalExpenses .'<br>';
            echo "Your Incomes: " . $totalIncome . '<br>';
            echo "Your Balances: ". $balance . '<br> <br>';  
        ?>
        <?php else: ?>
        <div> There is no record. </div>
        <?php endif; ?>
    </table>

        
</body>
</html>
