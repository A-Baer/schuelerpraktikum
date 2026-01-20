<?php
// Beispiel 1: Grundlegende PHP-Konzepte (prozedural, ohne OOP)

// 1) Variablen und Datentypen
$name = "Mia";              // String
$alter = 15;                // Integer
$istPraktikant = true;      // Boolean
$durchschnitt = 2.3;        // Float

// Variablen ausgeben
// echo gibt Text direkt aus; \n ist ein Zeilenumbruch
echo "Name: $name\n";
echo "Alter: $alter\n";
echo "Praktikant: " . ($istPraktikant ? "ja" : "nein") . "\n";
echo "Notendurchschnitt: $durchschnitt\n\n";

// 2) If/Else: Entscheidungen treffen
if ($alter >= 16) {
    echo "$name darf die Werkstatt alleine betreten.\n";
} else {
    echo "$name braucht Aufsicht in der Werkstatt.\n";
}

// Mehrere Bedingungen mit elseif
if ($durchschnitt <= 2.0) {
    echo "Sehr guter Notendurchschnitt!\n\n";
} elseif ($durchschnitt <= 3.0) {
    echo "Guter Notendurchschnitt.\n\n";
} else {
    echo "Da ist noch Luft nach oben.\n\n";
}

// 3) Arrays: Listen von Werten
$aufgaben = ["Daten sortieren", "Formular testen", "Fehler suchen", "Dokumentation lesen"];

// Zugriff auf ein Element (Index beginnt bei 0)
echo "Erste Aufgabe: " . $aufgaben[0] . "\n\n";

// 4) Loops: Wiederholungen
// for-Loop: bekanntes Zählverhalten
for ($i = 0; $i < count($aufgaben); $i++) {
    echo "for-Loop Aufgabe #" . ($i + 1) . ": " . $aufgaben[$i] . "\n";
}
echo "\n";

// foreach-Loop: direkt über Array-Werte iterieren
foreach ($aufgaben as $index => $aufgabe) {
    echo "foreach-Loop Aufgabe #" . ($index + 1) . ": $aufgabe\n";
}
echo "\n";

// while-Loop: solange Bedingung wahr ist
$punkte = 0;
while ($punkte < 3) {
    echo "while-Loop: Punkte = $punkte\n";
    $punkte++;
}
echo "\n";

// 5) Funktionen: Code wiederverwenden
function begruessung($name) {
    return "Willkommen im Praktikum, $name!";
}

function berechneAlterInMonaten($alter) {
    // 1 Jahr = 12 Monate
    return $alter * 12;
}

function istVolljaehrig($alter) {
    return $alter >= 18;
}

// Funktionen aufrufen
echo begruessung($name) . "\n";
$alterInMonaten = berechneAlterInMonaten($alter);
echo "$name ist $alterInMonaten Monate alt.\n";

echo "Volljährig? " . (istVolljaehrig($alter) ? "ja" : "nein") . "\n";
