<html>
<?php
include_once 'assets/template/header.php';
$d = '';
$sql = SelectTop10(2);
do {
    $row = $sql->fetch_assoc();
    if ($row) 
        $d .= '{username:"' . htmlspecialchars(str_replace("\"", "'", $row['username'])) . '", comments:' . htmlspecialchars($row['comments']) . '}, ';
} while ($row);
$d = substr($d, 0, -2);
?>
<head>
    <title>Chart Users</title>
</head>

<body>
    <br /><br />
    <h2>Chart of the most prolific users</h2>
    <div class='bord'></div>
    <br /><br />
    <div id="chart"></div>
</body>

</html>
<script>
    Morris.Bar({
        element: 'chart',
        data: [<?php echo $d; ?>],
        xkey: 'username',
        ykeys: ['comments'],
        labels: ['comments'],
        hideHover: 'auto',
    });
</script>