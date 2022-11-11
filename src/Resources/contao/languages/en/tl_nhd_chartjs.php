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
// $GLOBALS['TL_LANG']['tl_nhd_chartjs']['singleSRC'] = ["JSON Datei", "Entweder laden Sie eine JSON Datei hoch, oder schreiben diese in das Textfeld"];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['activeAnimation'] = ["Animationen deaktivieren?", "Falls zuviele Diagramme auf einer Seite existieren, sollte diese Option aktiviert werden!"];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['responsiveWidth'] = ["Responsive Breite aktivieren?", "Soll der Chart auf die maximal mögliche Breite erstellt werden?"];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['jsonInput'] = ["Datensatz für Diagramm", "Definiere hier den Datensatz. Mehr Informationen unter https://www.chartjs.org/docs/latest/charts/"];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['jsonInputLabels'] = ["Labels für Diagramm", "Definiere hier die Labels (diese sollten gleiche Anzahl wie Datensatz haben). Mehr Informationen unter https://www.chartjs.org/docs/latest/charts/"];
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['jsonInputOptions'] = ["Optionen für Diagramm", "Definiere hier deine Optionen. Mehr Informationen unter https://www.chartjs.org/docs/latest/charts/"];


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
 * Defaults
 */
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInputLabels']['default'] = json_encode("
[
    'legend 1',
    'legend 2',
    'legend 3',
    'legend 4',
    'legend 5',
    'legend 6'
]
");
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInputOptions']['default'] = json_encode("
plugins: {
	legend: {
		display: true,
		position: 'bottom',
		align: 'start',
		labels: {
			font: {
				size: 10
			},
			boxWidth: 10,
			boxHeight: 10
		}
	},
	tooltip: {
		callbacks: {
			label: function(tooltipItem, data) {
				const array = [tooltipItem.label, 'beträgt ' + tooltipItem.formattedValue+' %'];
				return array;
			}
		}
	}
}
");
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInput']['default']['bar'] = json_encode("
data: [ // fill with Values same Count into Label
	6,
	39.20,
	1.20,
	12.90,
	28.90,
	11.80
],
backgroundColor: [
	'#ececec',
	'#2c9094',
	'#ececec',
	'#6e9def',
	'#ececec',
	'#163263'
],
borderWidth: 0,
hoverOffset: 6
");
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInput']['default']['area'] = json_encode("{
    {fill: 'origin'},      // 0: fill to 'origin'
    {fill: '+2'},          // 1: fill to dataset 3
    {fill: 1},             // 2: fill to dataset 1
    {fill: false},         // 3: no fill
    {fill: '-2'},          // 4: fill to dataset 2
    {fill: {value: 25}}    // 5: fill to axis value 25
}");
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInput']['default']['bubble'] = json_encode("
data: [{
    x: 20,
    y: 30,
    r: 15
}, {
    x: 40,
    y: 10,
    r: 10
}],
backgroundColor: 'rgb(255, 99, 132)'
");
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInput']['default']['line'] = json_encode("
data: [65, 59, 80, 81, 56, 55, 40],
fill: false,
borderColor: 'rgb(75, 192, 192)',
tension: 0.1
");
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInput']['default']['scatter'] = json_encode("
data: [{
    x: -10,
    y: 0
}, {
    x: 0,
    y: 10
}, {
    x: 10,
    y: 5
}, {
    x: 0.5,
    y: 5.5
}],
backgroundColor: 'rgb(255, 99, 132)'
");
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInput']['default']['pie'] = json_encode("
data: [
    300,
    50,
    100
],
backgroundColor: [
  'rgb(255, 99, 132)',
  'rgb(54, 162, 235)',
  'rgb(255, 205, 86)'
],
hoverOffset: 4
");
$GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInput']['default']['doughnut'] = json_encode("
data: [
    300,
    50,
    100
],
backgroundColor: [
  'rgb(255, 99, 132)',
  'rgb(54, 162, 235)',
  'rgb(255, 205, 86)'
],
hoverOffset: 4
");
