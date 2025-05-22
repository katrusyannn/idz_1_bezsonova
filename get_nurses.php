<?php
include 'db.php';
include 'template.php';
include 'logger.php';

$department = $_POST['department'] ?? '';

logRequest('get_nurses.php', ['department' => $department]);

$query = $pdo->prepare("
    SELECT name
    FROM nurse
    WHERE department = :department
");
$query->execute([':department' => $department]);

$nursesList = '';
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $nursesList .= "<p>" . htmlspecialchars($row['name']) . "</p>";
}

$content = "<h2>Медсестри у відділенні $department:</h2>" . ($nursesList ?: "<p>Немає даних.</p>");

renderPage('Медсестри відділення', $content);

