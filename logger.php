<?php
function logRequest(string $script, array $params): void {
    $logDb = new PDO('sqlite:' . __DIR__ . '/logs.db');
    $logDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $paramsJson = json_encode($params, JSON_UNESCAPED_UNICODE);

    $stmt = $logDb->prepare("
        INSERT INTO request_log (script, params, requested_at)
        VALUES (:script, :params, :time)
    ");
    $stmt->execute([
        ':script' => $script,
        ':params' => $paramsJson,
        ':time'   => (new DateTime())->format('Y-m-d H:i:s')
    ]);
}


