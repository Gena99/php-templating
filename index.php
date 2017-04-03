<?php
/*
 Note pour le déploiement sur Heroku
 L'application ne peut pas ecrire de fichier sur Heroku
 Il faut donc 
 	désactiver le cache de Twig
	Remplacer la methode faker->image par faker-imageUrl qui renvoie une url vers l'image plutôt qu'un fichier. 
*/
	require_once 'vendor/autoload.php';
// require the Faker autoloader
	require_once 'vendor/fzaninotto/faker/src/autoload.php';

	$faker = Faker\Factory::create();

// generate data by accessing properties
	$variableTemplate = array(
		"companyName" => $faker->company,
		"catchPhrase" => $faker->catchPhrase,
		"url" => $faker->url,
		"name" => $faker->name,
		"job" => $faker->jobTitle,
		"price" => $faker->randomNumber(2).'.'.$faker->randomNumber(2),
		"productName" => $faker->word,
		"productAdjective" => $faker->word,
		"productMaterial" => $faker->word,
		"color" => $faker->safeColorName,
		"email" => $faker->email,
		"phoneNumber" => $faker->phoneNumber,
		"address" => $faker->address,
		"image" => $faker->imageUrl($width = 240, $height = 120),
		"imagePerson" => $faker->imageUrl($width = 120, $height = 120)
		);


	$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader/*, array(
	'cache' => 'cache',
	)*/);

echo $twig->render('index.html', $variableTemplate);
?>