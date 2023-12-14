<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DomCrawler\Crawler;
use PhpLatexRenderer\LatexRenderer;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function homeAction(): Response
    {
        // Le chemin vers votre fichier .tex
        $texFilePath = '/app/public/template.tex';
        $content = file_get_contents($texFilePath);
        // Utiliser une expression régulière pour trouver toutes les occurrences de "\cvname", "\cvjobtitle", etc.
        $pattern = '/\\\\(\w+)\{([^{}]*(?:\{[^{}]*\}[^{}]*)*)\}/';
        preg_match_all($pattern, $content, $matches, PREG_SET_ORDER);
        $data = [
            'cvname' => 'Cadot Michaël',
            'cvjobtitle' => 'Développeur passionné',
            'cvnumberphone' => '+32.47.74.15.76',
            'cvdate' => '05/09/1973',
            'cvaddress' => 'rue de la verte louche 19, 7600 Peruweltz (Belgique)',
            'cvmail' => 'michael@cadot.eu',
            'cvsite' => '',
            'aboutme' => "J'ai programmé en basic, visual, autolisp, c, dos, bash, dcl, delphi, turbo-pascal, php, python, nodejs, js ... et pratiqué des expériences en électronique, mécanique, hydraulique, conception 3D ...",
            'skills' => '{php/5.5},{javascript/4},{D3.js/3},{three.js/3.5},{bash/4},{blender/2.5},{docker/4},{symfony/4.5},{bootstrap/4},{dev-ops/3},{arduino/3.5}',
            'skillstext' => '',
        ];
        $tab = [];
        foreach ($matches as $match) {
            if (isset($data[$match[1]])) {
                $replace = str_replace($match[2], $data[$match[1]], $match[0]);
                $pos = strpos($content, $match[0]);
                $content = substr_replace($content, $replace, $pos, strlen($match[0]));
            } else
                $tab[$match[1]] = $match[0];
        }
        //on renomme les section
        $datap = [
            'Interests' => 'Autres réalisations',
            'Education' => 'Études',
            'Experience' => 'Experiences mises en avant',
            'Awards' => 'Recompenses',
            'Skills' => 'Compétences',
            'Languages' => 'Langues',
            'Publications' => 'Réseaux',
            'Other information' => 'Mon idéal',
        ];

        foreach ($datap as $key => $value) {
            $content = str_replace('\section{' . $key . '}', '\section{' . $value . '}',  $content);
        }
        $datar = \json_decode(\file_get_contents('/app/public/data.json', true));

        //\twentyitem{1933}{Alice in Wonderland 1933 version.}{Film}{This film stars Ethel griffies and Charlotte Henry. It was a box office flop when it was released.}
        $exp = [];
        foreach ($datar as $key => $value) {
            if ($key == 8) break;
            $pattern = '/\b\d{4}\b/';
            if (preg_match($pattern, $value->date, $matches)) {
                $date = $matches[0];
            } else {
                $date = $value->date;
            }

            $lieu = ucfirst(explode(',', $value->lieu)[0]);
            /* ------------------------------- expériences ------------------------------ */
            $technos = 'symfony,typesense,stimulus,hotwire,serveur,docker,mail,traefik,nginx,mysql,php,stripe,three.js,d3.js,d3js,threejs,react,angular,php,bootstrap,css,html,js,bash,cron,redis,mercure,mysql,mariadb, serveur mail,caddyhttps,rabbitmq,nominatim,adminer,phpmyadmin,api,postgresql,git,github,gitlab,composer,webpack,yarn,collabora,serveur jitsi Meet,hotwire,création de docker spécifique,création de script bash, optimisation SEO,UX,JSON-LD,json,latex,php,js,flutter,scss,webpack,bootstrap,scrapping,générateur de pdf,générateur de facture,générateur de devis,sentry,géolocalisation,STL,devis,facture,pdf,svg,chat,agenda,bot,iot,nodejs,codeigniter,html,paypal,jquery,wordpress,joomla,drupal,vanilla js,trello,easyadmin';

            $experiences = [];
            foreach (explode(',', $technos) as $techno) {
                if (preg_match("/\b" . preg_quote($techno) . "\b/i", $value->experience)) {
                    $experiences[] = $techno;
                }
            }
            $experiences = array_unique($experiences);
            $exp[] = '\twentyitem{' . $value->date . '}{' . \ucfirst($value->poste) . '}{' . $lieu . '}{' . lcfirst($value->entreprise) . '}{' . implode(' - ', $experiences) . '}';
        }

        $content = str_replace('\experiences/', implode("\n", $exp),  $content);
        /* ------------------------------ réalisations ------------------------------ */
        $reas = [
            "Création d'imprimantes 3D et CNC à partir de matériel de récupération.",
            "Construction d'un poêle de masse avec gestion électronique.",
            "Système IOT à base d'ESP8266 pour mesure de la température et humidité.",
            "Pilotage complet d'un lave-vaisselle par Arduino."
        ];
        $reasjoin = '';
        foreach ($reas as $rea) {
            $reasjoin .= "\item " . $rea . "\n";
        }
        $content = str_replace('\realisations/', $reasjoin,  $content);


        /* ------------------------------ études ------------------------------ */
        //\twentyitemshort{1865}{Chapter One, Down the Rabbit Hole.}
        $etudes = [
            "2020" => "Licence professionnelle de conception de solution digitale (HETIC, paris)",
            "2010" => "Sociocratie sur 6 jours (Sociocratie France, lyon)",
            "1996" => "BTS de Conception de produis industriels (dessin industriel, Argenteuil)",
        ];
        $etudesjoin = '';
        foreach ($etudes as $date => $etude) {
            $etudesjoin .= '\twentyitemshort{' . $date . "}{" . $etude . "}" . "\n";
        }
        $content = str_replace('\etudes/', $etudesjoin,  $content);

        /* ------------------------------ reseaux ------------------------------ */
        $resos = [
            "Github: https://github.com/cadot-eu",
            "CodeGrepper: https://www.grepper.com/profile/cadoteu"
        ];
        $resojoin = '';
        foreach ($resos as $reso) {
            $resojoin .= "\item " . $reso . "\n";
        }
        $content = str_replace('\reseaux/', $resojoin,  $content);

        /* --------------------------- autres informations -------------------------- */
        $content = str_replace('\review/', 'Je cherche à rejoindre une équipe 2/3 jours par semaine principalement en distanciel avec des réunions physiques pour préparer les tâches.',  $content);

        if (count($tab) > 0) {
            //on enregiste les erreurs dans un fichier
            file_put_contents('/app/public/erreurs.txt', print_r($tab, true));
        }
        file_put_contents('/app/public/new.tex', $content);
        // Exécute la commande pdflatex pour générer le PDF
        $output = shell_exec("cd /app/public/ && pdflatex new.tex");
        // Vérifie si la compilation a réussi
        if (file_exists('/app/public/new.pdf')) {
            // Retourne le fichier PDF généré en réponse dans une nouvelle fenetre
            return new BinaryFileResponse('/app/public/new.pdf');
        } else {
            // Affiche un message d'erreur en cas d'échec
            return new Response('Erreur lors de la génération du PDF.');
        }
    }
}
