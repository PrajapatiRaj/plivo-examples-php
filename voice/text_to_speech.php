<?php
    require_once "./plivo.php";
    require 'vendor/autoload.php';

    $app = new \Slim\Slim();

    $app->map('/speak', function() use ($app) {
    
        $res = new \Slim\Http\Response();

        // Generate a Speak XML with the details of the text to play on the call.
        $body = 'This is English!';
        $params = array(  
            'language' => "en-GB", 
            'voice' => "MAN"
        );

        $r = new Response(); 

        // Add speak element
        $r->addSpeak($body,$params);

        $body1 = 'Ce texte généré aléatoirement peut-être utilisé dans vos maquettes';
        $params1 = array(  
            'language' => "fr-FR"
        );

        $r->addSpeak($body1,$params1);

        $body2 = 'Это случайно сгенерированный текст может быть использован в макете';
        $params2 = array(  
            'language' => "ru-RU",
            'voice' => "MAN" 

    })->name('speak')->via('GET', 'POST');

    $app->run();

/*
Sample Output
<Response>
    <Speak language="en-GB" voice="MAN">This is English!</Speak>
    <Speak language="fr-FR">
        Ce texte généré aléatoirement peut-être utilisé dans vos maquettes
    </Speak>
    <Speak language="ru-RU" voice="MAN">
        Это случайно сгенерированный текст может быть использован в макете
    </Speak>
</Response>
*/