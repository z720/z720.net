/*
title: Vagrant: Créer des images custom - "Base boxes"
template: text-post
date: 2015-05-04T18:00:00
background: http://files.z720.net/2015/vagrant/steps_background-10801579.png
*/

# Vagrant : Image custom

## Créer une image Vagrant custom Ubuntu
Le principe est le même pour les images d'autres systèmes. Posez-vous la question de la raison pour laquelle vous n’utilisez pas les [images fournie par Ubuntu][vagrant-ubuntu-boxes] ou tout autre éditeur dont vous avez besoin.

Ce guide se base sur:

- [La documentation Vagrant (en)][vagrant-base-box]
- [L'article d'EngineYard: Building a Vagrant Box from Start to Finish][engine-yard]

### Résumé:

1. Créer une VM `vagrant-image`
2. Installer le système (avec SSH)
3. Désactiver la vérification du mot de passe pour l'élévation de privilèges de l'utilisateur `vagrant` (remove sudo password)
4. Configurer l'accès en SSH (avec la clé Vagrant)
5. Installer les addons invités
6. Personnalisez l'instance
6. Mettre à jour le système
7. Packager la *box*

### Créer une VM, vous pouvez utiliser n'importe quel ["provider" compatible][vagrant-providers]  :

Nous utiliserons [VirtualBox] comme hyperviseur, mais la procédure est sensiblement la même pour d'autres:

- Nom:  `vagrant-image`
- Type: `Linux`, 
- Version: `Ubuntu64`, 
- Mémoire: `512Mo` (ou plus),
- User : `vagrant` (Vagrant s'attend à utiliser cet utilisateur par défaut)

La taille du disque est à votre convenance selon l'usage prévu, il est préférable de prendre une taille adaptable pour réduire la taille finale de l'image au minimum **en cas de partage** même en interne (l'image doit être téléchargée).

Nous avons utilisé **vagrant-image** comme nom de machine virtuelle, vous pouvez utiliser le nom que vous voulez, mais il sera nécessaire lors de l'opération de packaging. Evitez donc les noms trop compliqués.

### Installer le système

Télécharger et installer [Ubuntu Server] avec OpenSSH pour pouvoir accéder au système depuis l’hôte.

### Autorisations et permissions d'accès
On commence par désactiver le mot de passe `sudo` pour l'utilisateur `vagrant` pouvoir exécuter des commandes par script: 

Créer un fichier de configuration pour `sudo`:

    sudo visudo -f /etc/sudoers.d/vagrant

avec le contenu suivant:

    # add vagrant user
    vagrant ALL=(ALL) NOPASSWD:ALL


Cette étape est importante car Vagrant s'attend à ne pas avoir à fournir de mot de passe. Cela permet à Vagrant de modifier la configuration réseau, de monter des partages et d'installer les package nécessaires.

### Accès SSH
Ensuite on va configurer SSH avec la clé Vagrant. Cette clé `ssh` va permettre à **vagrant**  la machine hôte se connecter à la machine invitée pour y exécuter les commandes. 

    mkdir -p /home/vagrant/.ssh
    chmod 0700 /home/vagrant/.ssh
    wget --no-check-certificate \
        https://raw.github.com/mitchellh/vagrant/master/keys/vagrant.pub \
        -O /home/vagrant/.ssh/authorized_keys
    chmod 0600 /home/vagrant/.ssh/authorized_keys
    chown -R vagrant /home/vagrant/.ssh


Dans le fichier de configuration d'OpenSSH Server `/etc/ssh/sshd_config`, s'assurer que le fichier utilisateur est pris en compte que la ligne n'est pas commentée :

    sudo nano /etc/ssh/sshd_config

    AuthorizedKeysFile %h/.ssh/authorized_keys


On utilise la clé [publiée par Vagrant][insecure-keys] (*insecure* car les parties privée et public sont sur Github) pour que Vagrant puisse se connecter à l'image après téléchargement, puis à la première connexion cette clé sera automatiquement remplacée par une nouvelle propre à l’utilisateur. 

Ne pas oublier de redémarrer le serveur `ssh` s'il faut en modifier la config:

    sudo service ssh restart

### Installer les utilitaires VirtualBox

Pour que l'image fonctionne "bien", il faut installer les utilitaires invités sur la machine invité, après avoir ajouté l'image à la VM (Périphériques > Insérer l'image des Additions invités...)

    sudo apt-get install linux-headers-generic build-essential dkms
    sudo mount /dev/cdrom /mnt 
    cd /mnt
    sudo ./VBoxLinuxAdditions.run

### Personnaliser

C'est le moment éventuel de personnaliser le système:

- Ajouter des composants (languages, serveurs)
- Modifier la configuration par défaut (dépots..)

C'est selon l'utilisation que vous voulez faire de cette box. 
Voyez dans cette personnalisation, des éléments que vous utilisez systématiquement dans ce contexte.
L'objectif, c'est d'avoir un modèle correspondant à un environnemnet ou une infrastructure particulière.
On peut imaginer la construction d'une base box de profiling qui soit le même système d'habitude mais avec des outils d'audit particuliers (mémoire, disque...)

### Packager l'image

Vous devriez avoir maintenant un système correspondant à vos besoins, il faut maintenant packager cette image. C'est à dire créer une archive avec:

- les fichiers associés à l'image disque qui dépendent du provider de VM
- le fichier `metadata.json` qui contient notamment le provider à utiliser

Il est recommandé d'optimiser l'image disque avant de faire le package afin d'en réduire la taille.

    # Remplir le disque avec des zéros
    sudo dd if=/dev/zero of=/EMPTY bs=1M
    sudo rm -f /EMPTY

Ensuite on peut lancer la commande `vagrant package --base vagrant-image`:

    [vagrant-image] Attempting graceful shutdown of VM...
    [vagrant-image] Forcing shutdown of VM...
    [vagrant-image] Clearing any previously set forwarded ports...
    [vagrant-image] Exporting VM...
    [vagrant-image] Compressing package to: /current/directory/package.box

Le fichier `package.box` créé correspond à votre *base box* Vagrant, vous pouvez le partager et même le publier sur [Atlas].


## Tester / Utiliser votre *box*

Pour utiliser cette box *locale*, il suffit d'en enregistrer l'emplacement dans votre Vagrant, puis d'initialiser un fichier `Vagrantfile`:

    vagrant box add ma-base-box /chemin/vers/package.box
    vagrant init ma-base-box
    vagrant up

Vous pouvez normalement vous connecter à votre box:

    vagrant ssh


## Notes 

Il est recommandé par Vagrant d'activer un mot de passe au user `root`, cf. [Creating a Base box > Root password vagrant][vagrant-base-box]. Cette étape n'a pas été ajoutée.

Ce n'est pas obligatoire mais si vous partagez votre image, cela peut aider les utilisateurs à manipuler box. La convention est de donner le mot de passe `vagrant`:

    sudo passwd root

[vagrant-providers]: http://docs.vagrantup.com/v2/providers/
[vagrant-base-box]: http://docs.vagrantup.com/v2/boxes/base.html
[Altas]: https://atlas.hashicorp.com/
[vagrant-ubuntu-boxes]: https://atlas.hashicorp.com/ubuntu/
[Ubuntu Server]: http://www.ubuntu.com/download/server
[VirtualBox]: https://www.virtualbox.org/
[insecure-keys]: https://github.com/mitchellh/vagrant/tree/master/keys
[engine-yard]: https://blog.engineyard.com/2014/building-a-vagrant-box
