
# ECF - Garage.V.Parrot

Présentation du projet :
Vincent Parrot, fort de ses 15 années d'expérience dans la réparation automobile, a ouvert
son propre garage à Toulouse en 2021.
Depuis 2 ans, il propose une large gamme de services: réparation de la carrosserie et de la
mécanique des voitures ainsi que leur entretien régulier pour garantir leur performance et
leur sécurité. De plus, le Garage V. Parrot met en vente des véhicules d'occasion afin
d'accroître son chiffre d'affaires.
Vincent Parrot considère son atelier comme un véritable lieu de confiance pour ses clients et
leurs voitures doivent, selon lui, à tout prix être entre de bonnes mains.

Lien du site en ligne : https://garage-vincent-parrot.katermuke.fr/

## Prérequis

Spécifications techniques

* Symfony 6
* PHP 8 ou supérieur
* Docker / XAMP / WAMP ou autres
* Composer
* MySql pour l'écriture de la base de données

## Installation en local

### Sur un terminal de commandes :

`git clone https://github.com/Katermukke/ecf_garage-automobile.git:nomDeVotreDossier`

La valeur 'nomDeVotreDossier équivaut au dossier ou vous vous trouvez.
Ou télécharger le zip dans code -> download ZIP

## Installer composer :
Aller dans votre projet avec git clone ou déziper votre zip et ouvrer le dans visual studio code, ensuite ouvrer le de visual studio code
puis taper la commande suivante :

`composer install`

Paramétrer votre base de données :
Lancer votre gestionnaire de base de données mysql, renseigner le mots de passe, le port, et nommer votre base de donnée : « garageParrot ».

`DATABASE_URL="mysql://root:mon-pass@127.0.0.1:3307/garageParrot?`

Retourner dans votre terminal vsc une fois la base de donnes paramétrer et lancer la commande suivante pour migrer votre base de données :

`php bin/console doctrine:migrations:migrate`

## Installer votre docker :
Installer docker avec la doc suivante selon votre système d’exploitation : https://docs.docker.com/desktop/

Installer le plug in docker sur votre IDE :
Retourner sur votre projet ouvrer extension télécharger le plug in docker, une fois telecharger aller sur votre terminal de commande et taper la commande suivante en ayant votre docker installer au préalable :

`docker run ngnix`

## Charger les fixtures du projet :
Taper la commande suivante dans le terminal de votre projet ! Attention les compte doivent être paramétrés pour accéder a l’admin ! :

`php bin/console doctrine:fixtures:load`

## Démarrer votre server en local :
Taper la commande suivante dans le terminal de votre projet pour lancer votre server en local :

`symfony server:start`

Enfin pour accéder au site cliquer sur votre lien http://127.0.0.1:8000 ou http://127.0.0.1:8080 dans le rectangle vert de votre terminal

# Création d'un compte administrateur en local :

## Création d’un nouvelle utilisateur :
Pour créer un nouvel administrateur rendez vous dans src/dataFixtures/UsersFixtures.php de votre projet, choisissez un "username" et un
"password". Pour les roles, entrez le role définie sur la copie rendu à cette effet.
Une fois le compte administrateur créé, réutiliser la commande suivante :

`php bin/console doctrine:fixtures:load`

## Connexion au back office :

Cliquez sur connexion en haut à droite de le navbar. Entrez le nom d'utilisateur et le mot de passe.
Félicitation ! Vous êtes maintenant connecté en tant qu'administrateur et vous pouvez maintenant gérer :

* Les services
* Les horaires
* Les avis des clients
* Et les compte employées