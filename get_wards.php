<?php
include 'db.php';
include 'template.php';
include 'logger.php';

$nurse_id = $_POST['nurse_id'] ?? '';

logRequest('get_wards.php', ['nurse_id' => $nurse_id]);

$query = $pdo->prepare("
    SELECT w.name
    FROM ward w
    JOIN nurse_ward nw ON w.id_ward = nw.fid_ward
    WHERE nw.fid_nurse = :nurse_id
");
$query->execute([':nurse_id' => $nurse_id]);

$wardsList = '';
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $wardsList .= "<p>" . htmlspecialchars($row['name']) . "</p>";
}

$content = "<h2>Палати, у яких чергує медсестра:</h2>" . ($wardsList ?: "<p>Немає даних.</p>");

renderPage('Палати медсестри', $content);

