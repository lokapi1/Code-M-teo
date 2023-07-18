<?php 

    // Url de l'API
    $url = "http://api.openweathermap.org/data/2.5/weather?q=Wervicq-Sud&lang=fr&units=metric&appid=35b7e5d26826cbcfb27c12b1749269d0";

    // On get les resultat
    $raw = file_get_contents($url);

    $json = json_decode($raw);

    // Décode la chaine JSON
    $json = json_decode($raw);
      
    var_dump($json);

     // Définir l'objet name des informations du Json comme le name de la ville en question, faire un echo $name pour afficvher le nom dans le code source (=moyen de vérification)
    $name = $json->name;

    // Pour afficher la description de la météo : celle-ci se trouve dans la case 0 du tableau weather, à l'objet main
    $weather = $json->weather[0]->main;
    $desc = $json->weather[0]->description;
    //Pour faire deux échos simultanés : $weather." ".desc;

    // Températures = chemin pour le récupérer :
    $temp = $json->main->temp;
    $feel_like = $json->main->feels_like;

    // Vent
    $speed = $json->wind->speed;
    $deg = $json->wind->deg;
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Boostrap -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
            <!-- Style -->
            <title>Meteo</title>
        </head>  
        <body>
        <div class="container text-center py-5">
             <h4><strong>MétéLOLA, welcome!</strong></h4>
         </div>
                <div class="container text-center py-5">
                <h1>Météo du jour à <strong><?php echo $name; ?></strong></h1>
                <div class="row justify-content-center align-items-center">
            </div>
        </body>
        <?php 
                        switch($weather)
                        {
                            case "Clear":
                                ?>
                                   <div class="icon sunny">
                                        <div class="sun">
                                            <div class="rays"></div>
                                        </div>
                                    </div>           
                                <?php
                                break;
    
                                case 'Drizzle':
                                ?>
                                <div class="icon sun-shower">
                                    <div class="cloud"></div>
                                        <div class="sun">
                                            <div class="rays"></div>
                                    </div>
                                        <div class="rain"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Rain':
                                ?>
                                <div class="icon rainy">
                                    <div class="cloud"></div>
                                    <div class="rain"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Clouds':
                                ?>
                                <div class="icon cloudy">
                                    <div class="cloud"></div>
                                    <div class="cloud"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Thunderstorm':
                                ?>
                                <div class="icon thunder-storm">
                                    <div class="cloud"></div>
                                        <div class="lightning">
                                            <div class="bolt"></div>
                                            <div class="bolt"></div>
                                    </div>
                                </div>
                                <?php 
                                break;
    
                                case 'Snow':
                                ?>
                                <div class="icon flurries">
                                    <div class="cloud"></div>
                                        <div class="snow">
                                            <div class="flake"></div>
                                            <div class="flake"></div>
                                    </div>
                                </div>
    
                                <?php 
                                break;
                        }
                        ?>

                        <div class="meteo_desc text-left">
                            <h2>
                                <?php echo $temp; ?> °C / Ressenti <?php echo $feel_like; ?> °C <br />
                                <?php echo $speed; ?> Km/h - <?php echo $deg; ?> ° <br /> 
                                <?php echo $desc; ?>
                        </h2>
                    </div>
                </div>
            </div>
        </body>
</html> 



