# EasyContactForm

** English version not implemented yet **

EasyContactForm est un simple formulaire HTML, utilisant le Bootstrap de twitter pour le CSS (mais il n'est pas obligatoire) et une page de réception en PHP.

J'ai voulu créer ce formualire car il m'est souvent souvent demandé de créer un formulaire de contact, et dans certains projets, je n'ai pas accès aux base de données, ou à la fonction mail() de PHP.<br />Par exemple si on utilise le service basique d'OVH et que l'on a uniqiement le service 10Mo.

Ce formulaire est donc rapide à installer, la page `index.php` contient le formulaire et la page `action.php` qui contient la réception du formulaire, le traitement du message et l'enregistrement de celui-ci.

Le script est simple, il échappe les informations reçues, et si tout est correct, il créer un fichier `.txt` contenant les informations.

Le dossier ou sera contenu les messages est automatiquement créé.

*Notes* :

* Si vous souhaitez changer le nom du fichier `index.php`, n'oubliez pas de changer la page de redirection dans le `action.php` (en fin de page).
* Par mesure de sécurité, changez le dossier de destination des messages, par défaut les informations iront dans le dossier `messages/`.