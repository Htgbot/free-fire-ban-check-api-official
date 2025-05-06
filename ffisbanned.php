<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');

try {
    $uid = filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_NUMBER_INT);
    if (!$uid || !preg_match('/^\\d{5,15}$/', $uid)) {
        throw new Exception("Invalid or missing 'uid' parameter.");
    }

    // Ban Check API
    $ban_url = "https://ff.garena.com/api/antihack/check_banned?lang=en&uid=$uid";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $ban_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: application/json, text/plain, */*',
        'X-Requested-With: B6FksShzIgjfrYImLpTsadjS86sddhFH',
        'User-Agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Mobile Safari/537.36',
        'Referer: https://ff.garena.com/en/support/'
    ]);
    $ban_response = curl_exec($ch);
    curl_close($ch);
    $ban_data = json_decode($ban_response, true);

    $is_banned = $ban_data['data']['is_banned'] ?? null;
    $ban_period = $ban_data['data']['period'] ?? null;

    if (!isset($is_banned)) {
        throw new Exception("Failed to retrieve ban status.");
    }

    echo json_encode([
        'status' => 'success',
        'uid' => $uid,
        'is_banned' => $is_banned,
        'ban_period' => $ban_period,
        'message' => $is_banned ? "Player is banned for $ban_period month(s)." : "Player is not banned."
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()], JSON_PRETTY_PRINT);
}
