<?php
    require_once('Connection.php');
    require_once('Show.php');
    require_once('ViewRecord.php');
    session_start();
    if ($_SESSION["option"] == "income"){
        $_SESSION["option"] = "income";
    }elseif ($_SESSION["option"] == "outcome"){
        $_SESSION["option"] = "outcome";
    }else{
        $_SESSION["option"] = "none";
    }
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
    <form method="POST">
    <label for="">Filter:</label> <br>
    <input type="radio"  name="filter" value="income" <?php if(isset($_POST['filter'])){ if($_POST['filter'] == 'income') {$_SESSION["option"] = "income"; echo ' checked="checked"';}} ?>>
    <label for="">Income only</label><br>
    <input type="radio" name="filter" value="outcome"  <?php if(isset($_POST['filter'])){ if($_POST['filter'] == 'outcome') {$_SESSION["option"] = "outcome"; echo ' checked="checked"';}} ?>>
    <label for="">Outcome only</label> <br>

    <?php if($_SESSION["option"] == "income" || $_SESSION["option"] == "outcome"): ?>
    <input type="radio" name="filter" value="none"  <?php if(isset($_POST['filter'])){ if($_POST['filter'] == 'none') {$_SESSION["option"] = "none"; header('location: index.php'); echo ' checked="checked"';}} ?>>
    <label for="">None</label> <br><br>
    <?php else: echo "<br>";
    endif;
    ?>
    <?php// print_r($_SESSION); ?>

    <input type="submit" name="submitRB" value="Apply Changes">
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

        if ($_SESSION["option"] == "income")://jika user memilih filter income
        if (!empty($record->showAllRecord())):
            foreach($record->showAllRecord() as $data):
                if ($data['type'] == 'outcome'){
                    $totalExpenses += $data['money'];
                }
                if ($data['type'] == 'income'){
                    $totalIncome += $data['money'];
                ?>
                <tr>
                    <th> <?php echo "Rp. " . number_format($data['money'],0,",",".") ?> </th>
                    <th> <?php echo $data['type'] ?> </th>
                    <th> <?php echo $data['date'] ?> </th>
                    <th> <a href="controller.php?id=<?php echo $data['id']; ?>">Delete</a></th>
                </tr>      
        <?php
                }
            endforeach;
            $balance = $totalIncome - $totalExpenses;
            //echo "Your Expenses: Rp. " . number_format($totalExpenses,0,",",".") .'<br>';
            echo "Your Incomes: Rp. " . number_format($totalIncome,0,",",".") . '<br><br>';
            //echo "Your Balances: Rp. ". number_format($balance,0,",",".") . '<br> <br>';  
  
        ?>
        <?php else: ?>
        <div> There is no record. </div>
        <?php endif; ?>

        <?php elseif($_SESSION["option"] == "outcome"): //jika user memilih filter outcome
            if (!empty($record->showAllRecord())):
            foreach($record->showAllRecord() as $data):
                if ($data['type'] == 'income'){
                    $totalIncome += $data['money'];
                }
                if ($data['type'] == 'outcome'){
                    $totalExpenses += $data['money'];
                ?>
                <tr>
                    <th> <?php echo "Rp. " . number_format($data['money'],0,",",".") ?> </th>
                    <th> <?php echo $data['type'] ?> </th>
                    <th> <?php echo $data['date'] ?> </th>
                    <th> <a href="controller.php?id=<?php echo $data['id']; ?>">Delete</a></th>
                </tr>      
        <?php
                }
            endforeach;
            $balance = $totalIncome - $totalExpenses;
            echo "Your Expenses: Rp. " . number_format($totalExpenses,0,",",".") .'<br> <br>';
            //echo "Your Incomes: Rp. " . number_format($totalIncome,0,",",".") . '<br>';
            //echo "Your Balances: Rp. ". number_format($balance,0,",",".") . '<br> <br>';  
        ?>
        <?php else: ?>
        <div> There is no record. </div>
        <?php endif; ?>
        
        <?php else: 
        if (!empty($record->showAllRecord())):
            foreach($record->showAllRecord() as $data):
                if ($data['type'] == 'income'){
                    $totalIncome += $data['money'];
                }
                if ($data['type'] == 'outcome'){
                    $totalExpenses += $data['money'];
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
        <?php endif; ?>
    <?php endif; ?>
    </tbody>
    </table>

    
    
</body>
</html>
