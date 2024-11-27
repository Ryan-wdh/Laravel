<?php
// Verbinding maken met de database
$conn = new PDO('mysql:host=localhost;dbname=projects', 'profileapp', 'vzH4G6Y@3FHSw4PE2B#98Kt8');

// ID van het project ophalen vanuit de URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    // Specifieke projectinformatie ophalen
    $stmt = $conn->prepare("SELECT * FROM webdev WHERE id = 1");
    $stmt->execute([$id]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (!$project) {
    echo "Project niet gevonden.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($project['titel']) ?></title>
</head>
<body>

<h1><?= htmlspecialchars($project['titel']) ?></h1>
<img src="<?= htmlspecialchars($project['userid']) ?>" alt="Project Image">
<p><?= htmlspecialchars($project['beschrijving']) ?></p>
<a href="index.php">Terug naar portfolio</a>

</body>
</html>