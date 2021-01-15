<html>
<?php
include_once 'assets/template/header.php';
$d = '';
$sql = SelectTop10(1);
do {
    $row = $sql->fetch_assoc();
    if ($row) 
        $d .= '{title:"' . htmlspecialchars(str_replace("\"", "'", $row['title'])) . '", likes:' . htmlspecialchars($row['likes']) . '}, ';
} while ($row);
$d = substr($d, 0, -2);
?>

<head>
    <title>Chart Posts</title>
</head>

<body>
    <br /><br />
    <h2>Chart of the most liked posts</h2>
    </p></div><div class='bord'></div>
    <br /><br />
    <div id="chart"></div>
</body>

</html>
<script>
    Morris.Bar({
        element: 'chart',
        data: [<?php echo $d; ?>],
        xkey: 'title',
        ykeys: ['likes'],
        labels: ['likes'],
        hideHover: 'auto',
    });
</script>