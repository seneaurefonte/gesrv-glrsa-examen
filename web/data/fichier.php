<?php 
$DATA_FILE = dirname(__DIR__) . '/data/patient.json';
function loadData() {
    global $DATA_FILE;
    if (file_exists($DATA_FILE)) {
        $json = file_get_contents($DATA_FILE);
        return json_decode($json, true);
    }
    return ['patients' => []];
}
function saveData($data):bool {
    global $DATA_FILE;
    if (file_exists($DATA_FILE)) {
      file_put_contents($DATA_FILE, json_encode(['patients'=>$data], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
      return true;
    }
    return false;
}