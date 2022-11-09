<?php

declare(strict_types=1);

/*
 * This file is part of Contao ChartJS Diagramms.
 *
 * (c) NewHorizonDesign 2022 <service@newhorizon-design.de>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/newhorizondesign/contao-chartjs-diagramms
 */

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['first_legend'] = "Basis Einstellungen";
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['second_legend'] = "Erweiterte Einstellungen";

/**
 * Operations
 */
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['edit'] = ["Datensatz mit ID: %s bearbeiten", "Datensatz mit ID: %s bearbeiten"];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['copy'] = ["Datensatz mit ID: %s kopieren", "Datensatz mit ID: %s kopieren"];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['delete'] = ["Datensatz mit ID: %s löschen", "Datensatz mit ID: %s löschen"];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['show'] = ["Datensatz mit ID: %s ansehen", "Datensatz mit ID: %s ansehen"];

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['title'] = ["Titel", "Geben Sie den Titel ein"];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['chartType'] = ["Diagrammauswahl", "Wählen Sie Ihr gewünschtes Diagramm aus."];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['checkboxField'] = ["Chosen Feld", "Wählen Sie aus."];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['size'] = ["Diagrammgröße definieren", "Geben Sie die Werte Breite und Höhe in px ein"];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['addSubpalette'] = ["Erweiterte Einstellungen", "Hier können Sie die erweiterten Einstellungen aktivieren."];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['cssID'] = ["CSS ID", "Hier können Sie eine ID eingeben."];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['cssClass'] = ["CSS Klasse", "Hier können Sie beliebig viele Klassen eingeben."];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['singleSRC'] = ["JSON Datei", "Entweder laden Sie eine JSON Datei hoch, oder schreiben diese in das Textfeld"];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['activeAnimation'] = ["Animationen deaktivieren?", "Falls zuviele Diagramme auf einer Seite existieren, sollte diese Option aktiviert werden!"];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['jsonInput'] = ["Dataset ChartJS", "Definiere hier den Dataset für den Chart. Mehr Informationen unter https://www.chartjs.org/docs/latest/charts/"];


/**
 * Options
 */
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['chartTypes']['options'] = [
    'bar' => 'Bar Diagramm',
    'bubble' => 'Blasen Diagramm',
    'line' => 'Linien Diagramm',
    'scatter' => 'Streu Diagramm',
    'pie' => 'Pie Diagramm',
    'doughnut' => 'Donut Diagramm'
];

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['customButton'] = "Custom Routine starten";

/**
 * Defaults
 */
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInputLabels']['default'] = json_encode("[0,1,2,3,4,5,6]");
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInput']['default']['barchart'] = json_encode("{
    labels: labels,
    data: [65, 59, 80, 81, 56, 55, 40],
    backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
    ],
    borderWidth: 1
}");
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInput']['default']['areachart'] = json_encode("{
    {fill: 'origin'},      // 0: fill to 'origin'
    {fill: '+2'},          // 1: fill to dataset 3
    {fill: 1},             // 2: fill to dataset 1
    {fill: false},         // 3: no fill
    {fill: '-2'},          // 4: fill to dataset 2
    {fill: {value: 25}}    // 5: fill to axis value 25
}");
