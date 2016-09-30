<?php

$products = array(
	array( // Grundstruktur
		ordernumber => "",
		title => "",
		manufacturer => "",
		category => "",
		price => "",
		pseudoprice => "",
		description => "",
		long_description => "",
		attributes = array(
			color => "",
			more => ""
			),
		options = array(
			color => "",
			more => ""
			),
		isAlone => "",
		fatherArticle => ""
	),
	
	// Einzelartikel
	array(
		ordernumber => "t001",
		title => "Einzelartikel",
		manufacturer => "NoName",
		category => "TestKat1", // Kategorie mit dem Kürzel angesprochen
		price => 12.5,	// Aktueller Preis
		pseudoprice => 20, // "Originaler" Preis, der durchstrichen wird
		description => "Dies ist ein Testartikel",
		long_description => "Testartikel sind die Hello Worlds...",
		attributes = array(
			color => "Blau"
			),
		options = null,
		isAlone => true, // Einzelartikel
		fatherArticle => null // Wird nicht beachtet, da Einzelartikel
	),
	
	// Variantenartikel
	array(
		ordernumber => "t002v",
		title => "Vaterartikel",
		manufacturer => "CH",
		category => "TestKat2",
		price => null, // Nimmt die (min - max) Preise von Kinder
		pseudoprice => null, // Falls einer der Kinder einen Pseudopreis hat, wird ein Icon ausgegeben
		description => "Dies ist ein Vaterartikel",
		long_description => "Vaterartikel sind nicht k&auml;uflich!",
		attributes = null, // Zeigt alle Daten von den Kindern
		options = null, // Ditto
		isAlone => false,
		fatherArticle => "me" // Vaterartikel immer mit "me", damit man weiss welcher der Vater ist.
	),
	array(
		ordernumber => "t002c1",
		title => "Kindartikel 1",
		manufacturer => null, // Nimmt die Werte  des Vaters
		category => null, // Ditto
		price => 15,
		pseudoprice => null,
		description => null, // Nimmt die Werte  des Vaters
		long_description => null, // Ditto
		attributes = array( // Attribute sind Eigenschaften, die in einer Tabelle angezeigt werden
			color => "Gr&uuml;n",
			size => 10
			),
		options = array( // Option definiert die Artikelvariante
			color => "Gr&uuml;n"
			),
		isAlone => false,
		fatherArticle => "t002v" // Ordernumber des Vaters
	),
	array(
		ordernumber => "t002c2",
		title => "Kindartikel 2",
		manufacturer => null,
		category => null,
		price => 13,
		pseudoprice => 15,
		description => "Dies ist ein Kindartikel", // Falls etwas vorhanden, nimmt es NICHT vom Vater
		long_description => "Kinder sind kaufbar", // Ditto
		attributes = array(
			color => "Rot",
			size => 12
			),
		options = array(
			color => "Rot"
			),
		isAlone => false,
		fatherArticle => "t002v"
	),
	
	// Multidimensionaler Variantenartikel
	array(
		ordernumber => "t003v",
		title => "MultiDimVater",
		manufacturer => "CH",
		category => "TestKat2",
		price => null,
		pseudoprice => null,
		description => "Dies ist ein weiterer Vaterartikel",
		long_description => "Sieht gleich aus...",
		attributes = null,
		options = null,
		isAlone => false,
		fatherArticle => "me"
	),
	array(
		ordernumber => "t003c1",
		title => "MultiKind 1",
		manufacturer => null,
		category => null,
		price => 12,
		pseudoprice => null,
		description => null,
		long_description => null,
		attributes = array(
			height => 200,
			width => 100
			),
		options = array( // Falls 2 Werte, ist es multidimensional
			height => 200,
			width => 100
			),
		isAlone => false,
		fatherArticle => "t003v"
	),
	array(
		ordernumber => "t003c2",
		title => "MultiKind 2",
		manufacturer => null,
		category => null,
		price => 24,
		pseudoprice => null,
		description => null,
		long_description => null,
		attributes = array(
			height => 200,
			width => 200
			),
		options = array(
			height => 200,
			width => 200
			),
		isAlone => false,
		fatherArticle => "t003v"
	),
	array(
		ordernumber => "t003c3",
		title => "MultiKind 3",
		manufacturer => null,
		category => null,
		price => 40,
		pseudoprice => 48,
		description => null,
		long_description => null,
		attributes = array(
			height => 400,
			width => 200
			),
		options = array(
			height => 400,
			width => 200
			),
		isAlone => false,
		fatherArticle => "t003v"
	),
);

?>