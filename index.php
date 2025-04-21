<?php
include(dirname(__FILE__).'/config.php');
include(dirname(__FILE__).'/includes/errorcheck.php');

$steamid64 = $_GET["steamid"];

$url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $APIKey . "&steamids=" . $steamid64;
$json = file_get_contents($url);
$table2 = json_decode($json, true);
$table = $table2["response"]["players"][0];

$timestamp = time();
$timestamp_whole = (date("Y-m-d h:i:s:a", $timestamp));

$members_info = [];

foreach ($steamids_and_roles as $steamid64 => $data) {
    $url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $APIKey . "&steamids=" . $steamid64;
    $json = file_get_contents($url);
    $data_api = json_decode($json, true);

    if (isset($data_api['response']['players'][0])) {
        $data_api['response']['players'][0]['role'] = $data['role'];
        $data_api['response']['players'][0]['role_color'] = $data['color'];
        $members_info[] = $data_api['response']['players'][0];
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chargement...</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="background">
        <canvas id="particle-canvas"></canvas> <!-- Ajout du canvas pour les particules -->
        <div class="carousel-image-container">
            <img src="images/501stv1.png" class="carousel-image" alt="Image 1">
            <img src="images/501stv2.png" class="carousel-image" alt="Image 2">
            <img src="images/ctblanc.png" class="carousel-image" alt="Image 3">
            <img src="images/fordo.png" class="carousel-image" alt="Image 4">
        </div>
    </div>

    <div class="user-profile d-inline-flex align-items-center text-white p-1 rounded-5 mt-3 ms-3">
        <?php if (isset($table['personaname'])): ?>
            <img src="<?php echo $table['avatarfull']; ?>" alt="Avatar du joueur" class="h-100 rounded-5">
            <div class="user-name text px-2 fw-bold"><?php echo $table['personaname']; ?></div>
        <?php endif; ?>
    </div>

    <div class="title-container">
        <h1 class="fw-bold">Bienvenue sur</h1>
        <h2 class="fw-bold">Clone Wars - <span class="highlight">Horizon</span></h2>
    </div>

    <div class="team-container d-flex flex-column align-items-start ms-3">
       <h3 class="fw-bold">Équipe de Direction</h3>
       <ul class="list-unstyled d-flex flex-column">
           <?php foreach ($members_info as $member): ?>
               <li class="user-profile d-inline-flex align-items-center text-white p-1 rounded-5 shadow mb-2">
                   <img src="<?php echo $member['avatarfull']; ?>" alt="Avatar du joueur" class="h-100 rounded-5 me-2">
                   <div class="user-name text px-2 fw-bold">
                       <?php echo $member['personaname']; ?>
                       <span class="tiret fw-bold"> - </span>
                       <span class="role fs-6" style="color: <?php echo $member['role_color']; ?>;"><?php echo $member['role']; ?></span>
                   </div>
               </li>
           <?php endforeach; ?>
       </ul>
    </div>

    <div class="signature">
        Créé par <strong>Fertouille 🦁</strong>
    </div>

    <img src="images/logo.png" alt="Logo du serveur" class="logo">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>