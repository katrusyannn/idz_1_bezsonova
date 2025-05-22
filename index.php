<?php
include 'db.php';
include 'template.php';

$content = '';

// Форма вибору медсестри
$query = $pdo->query("SELECT id_nurse, name FROM nurse");
$nursesOptions = '';
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $nursesOptions .= "<option value='" . htmlspecialchars($row['id_nurse']) . "'>" . htmlspecialchars($row['name']) . "</option>";
}

$content .= <<<HTML
<form action="get_wards.php" method="POST">
    <label for="nurse_id">Виберіть медсестру:</label>
    <select name="nurse_id" id="nurse_id">
        $nursesOptions
    </select>
    <button type="submit">Показати палати</button>
</form>
HTML;

// Форма вибору відділення
$query = $pdo->query("SELECT DISTINCT department FROM nurse");
$departmentsOptions = '';
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $departmentsOptions .= "<option value='" . htmlspecialchars($row['department']) . "'>" . htmlspecialchars($row['department']) . "</option>";
}

$content .= <<<HTML
<form action="get_nurses.php" method="POST">
    <label for="department">Виберіть відділення:</label>
    <select name="department" id="department">
        $departmentsOptions
    </select>
    <button type="submit">Показати медсестер</button>
</form>
HTML;

// Форма вибору зміни
$content .= <<<HTML
<form action="get_shifts.php" method="POST">
    <label for="shift_time">Виберіть зміну:</label>
    <select name="shift_time" id="shift_time">
        <option value="First">Перша</option>
        <option value="Second">Друга</option>
        <option value="Third">Третя</option>
    </select>
    <button type="submit">Показати чергування</button>
</form>
HTML;

renderPage('Головна сторінка', $content);

