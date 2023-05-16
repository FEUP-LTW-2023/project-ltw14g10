<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/connection.db.php');

$db = getDatabaseConnection();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['year'])) {
  $selectedYear = $_GET['year'];

  $query = "SELECT * FROM CLASS WHERE [YEAR] = :year";
  $stmt = $db->prepare($query);
  $stmt->bindParam(':year', $selectedYear, PDO::PARAM_INT);
  $stmt->execute();
  $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

  header('Content-Type: application/json');
  echo json_encode($classes);
  exit();
}

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/ticket-submit.tpl.php');

  
  setHeader($session);
  drawHeader($session);
  drawBody($classes);
  drawFooter();
?>
