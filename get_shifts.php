<?php
include 'db.php';
include 'template.php';
include 'logger.php';

$shift_time = $_POST['shift_time'] ?? '';

logRequest('get_shifts.php', ['shift_time' => $shift_time]);

$query = $pdo->prepare("
    SELECT n.name AS nurse_name, w.name AS ward_name
    FROM nurse n
    JOIN nurse_ward nw ON n.id_nurse = nw.fid_nurse
    JOIN ward w ON nw.fid_ward = w.id_ward
    WHERE n.shift = :shift_time
");
$query->execute([':shift_time' => $shift_time]);

$shiftList = '';
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $shiftList .= "<p>Медсестра: " . htmlspecialchars($row['nurse_name'])
               . ", палата: " . htmlspecialchars($row['ward_name']) . "</p>";
}

$content = "<h2>Чергування на зміну " . htmlspecialchars($shift_time) . ":</h2>" . ($shiftList ?: "<p>Немає даних.</p>");

renderPage('Чергування', $content);


