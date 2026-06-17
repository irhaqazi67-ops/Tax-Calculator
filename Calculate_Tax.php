<html>
<head>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 400px;
            text-align: center;
            border: 1px solid #eee;
        }
        h1 { color: #333; font-weight: 300; margin-bottom: 25px; }
        input[type="text"] { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        input[type="submit"] { background-color: #333; color: white; padding: 12px 20px; border: none; border-radius: 6px; cursor: pointer; width: 100%; transition: background 0.3s ease; }
        input[type="submit"]:hover { background-color: #555; }
        .result { margin-top: 20px; padding: 15px; background: #f4f4f4; border-radius: 6px; color: #444; }
    </style>
</head>
<body>

<div class="container">
    <h1>Tax Calculator</h1>
    <form method="post">
        <label>Enter your annual income:</label>
        <input type="text" name="income" required>
        <input type="submit" name="calculate" value="Calculate Tax">
    </form>

    <?php
    if(isset($_POST['calculate'])){
        $income = $_POST['income'];
        
        if (is_numeric($income) && $income > 0){

            $taxRate = 0;
            if ($income <= 10000) {
                $taxRate = 0.05;
            } elseif ($income <= 50000) {
                $taxRate = 0.1;
            } elseif ($income <= 100000) {
                $taxRate = 0.2;
            } else {
                $taxRate = 0.3;
            }
            
            $calculatedTax = $income * $taxRate;
            
                     echo "<div class='result'>";
            echo "<p>Your annual income: " . number_format($income) . "</p>";
            echo "<p>Your tax rate: " . ($taxRate * 100) . "%</p>";
            echo "<p>Your tax liability: $" . number_format($calculatedTax, 2) . "</p>";
            echo "</div>";
        } else {
            echo "<p style='color:red;'>Please enter a valid positive number.</p>";
        }
    }
    ?>
</div>
</body>
</html>