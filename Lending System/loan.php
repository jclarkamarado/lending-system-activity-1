<!DOCTYPE html>
<html>
<head>
    <title>Lending System</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card{
            width: 420px;
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        h2{
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        label{
            font-weight: bold;
            font-size: 14px;
        }
        input, select{
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button{
            width: 100%;
            padding: 12px;
            background: #0d6efd;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover{
            background: #0b5ed7;
        }
        .result{
            margin-top: 20px;
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }
        .result p{
            margin: 6px 0;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Loan Calculator</h2>

    <form method="post">
        <label>Loan Amount (₱500 – ₱50,000)</label>
        <input type="number" name="amount" min="500" max="50000" required>

        <label>Loan Term</label>
        <select name="months" required>
            <option value="1">1 Month</option>
            <option value="3">3 Months</option>
            <option value="6">6 Months</option>
            <option value="12">12 Months</option>
        </select>

        <button type="submit">Calculate Loan</button>
    </form>

<?php
if (isset($_POST['amount'])) {

    $amount = $_POST['amount'];
    $months = $_POST['months'];
    $rate = 0.02; // 2% monthly interest

    $monthlyPayment = $amount * ($rate * pow(1 + $rate, $months)) / (pow(1 + $rate, $months) - 1);
    $totalPayment = $monthlyPayment * $months;
    $totalInterest = $totalPayment - $amount;

    echo "<div class='result'>";
    echo "<p><strong>Payment per Month:</strong> ₱" . number_format($monthlyPayment, 2) . "</p>";
    echo "<p><strong>Total Interest:</strong> ₱" . number_format($totalInterest, 2) . "</p>";
    echo "<p><strong>Total Amount to Pay:</strong> ₱" . number_format($totalPayment, 2) . "</p>";
    echo "</div>";
}
?>

</div>

</body>
</html>
