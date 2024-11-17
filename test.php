<?php

include "config.php";

// Query to get the counts
$recentAccountsQuery = "SELECT COUNT(*) AS count FROM accounts";
$activeAccountsQuery = "SELECT COUNT(*) AS count FROM accounts WHERE charge = 1";

$recentAccountsResult = $conn->query($recentAccountsQuery);
$activeAccountsResult = $conn->query($activeAccountsQuery);

$recentAccounts = $recentAccountsResult->fetch_assoc()['count'];
$activeAccounts = $activeAccountsResult->fetch_assoc()['count'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pie Chart - Recent and Active Accounts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 50%; margin: auto;">
        <canvas id="accountsPieChart"></canvas>
    </div>

    <script>
        // Data from PHP
        const recentAccounts = <?php echo $recentAccounts; ?>;
        const activeAccounts = <?php echo $activeAccounts; ?>;

        // Render Chart.js Pie Chart
        const ctx = document.getElementById('accountsPieChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Recent Accounts', 'Active Accounts'],
                datasets: [{
                    data: [recentAccounts, activeAccounts],
                    backgroundColor: ['#36a2eb', '#ff6384'],
                    hoverBackgroundColor: ['#36a2ebcc', '#ff6384cc']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((acc, value) => acc + value, 0);
                                const percentage = ((context.raw / total) * 100).toFixed(2);
                                return `${context.label}: ${context.raw} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
