<?php
// Verbinding maken met de database
$conn = new PDO('mysql:host=localhost;dbname=projects', 'profileapp', 'vzH4G6Y@3FHSw4PE2B#98Kt8');

// Projecten ophalen
$stmt = $conn->prepare("SELECT * FROM webdev");
$stmt->execute();
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolio</title>
    <style>
        .grid { display: flex; flex-wrap: wrap; gap: 20px; }
        .project { border: 1px solid #ccc; padding: 20px; width: 200px; text-align: center; }
        .project img { max-width: 100%; }
    </style>
</head>
<body>

<h1>Portfolio</h1>
<div class="grid">
    <?php foreach ($projects as $project): ?>
        <div class="project">
            <img src="<?= htmlspecialchars($project['titel']) ?>" alt="Project Image">
            <h2><?= htmlspecialchars($project['userid']) ?></h2>
            <p><?= htmlspecialchars(substr($project['beschrijving'], 0, 50)) ?>...</p>
            <a href="project.php?id=<?= $project['id'] ?>">Bekijk project</a>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>