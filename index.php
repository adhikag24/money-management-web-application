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
    <link rel="stylesheet" href="style.css">
    <title>Money Management</title>
    <link href="https://fonts.googleapis.com/css?family=Ultra|Work+Sans:400,500" rel="stylesheet">
</head>
<body>
<h1>Money Management</h1>
    <form action="controller.php" method="POST">
        <h2>Add:</h2> 
        Rp.
        <input type="number" id="money" name="money" required>
        <select name="type" id="type">
            <option value="outcome">Outcome</option>
            <option value="income">Income</option>
        </select>  <br> <br>
        <button type="submit" id="submit" name="submit" class="button">Submit</button>
    </form>
    <table class="fl-table">
    <thead>
    <tr>
        <th>Total</th>
        <th>Type</th>
        <th>Date</th>
        <th>Delete</th>
    </tr>
    </thead>

    <tbody>
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
            echo "Your Expenses: Rp. " . number_format($totalExpenses,0,",",".") .'<br>';
            echo "Your Incomes: Rp. " . number_format($totalIncome,0,",",".") . '<br>';
            echo "Your Balances: Rp. ". number_format($balance,0,",",".") . '<br> <br>';  
        ?>
        <?php else: ?>
        <div> There is no record. </div>
        <?php endif; ?>
    </tbody>
    </table>

        
</body>
</html>
