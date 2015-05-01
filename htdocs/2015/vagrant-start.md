/*
title: Vagrant
template: text-post
date: 2015-05-04T09:00:00
background: http://files.z720.net/2015/vagrant/steps_background-10801579.png
*/

# Vagrant 

## Introduction

Vagrant est un outil permettant d'automatiser la construction d'un environnement de développement: 
  
  - création d'une machine virtuelle (OS)
  - configuration des serveurs (web, application...)
  - partage de répertoires (exposition de l'environnement de travail local dans la VM pour un "live update")

Objectifs:
  
  - tout le monde travaille dans le même environnement, (plus d'excuse du genre *"ça marche chez moi"*)
  - L'environnement de développement est facile à mettre en place (1 seule commande)
  - L'environnement est facile à partager (toute la configuration peut tenir dans un seul fichier)

Bref, vous avez compris, c'est tout bénéf...

## Comment l'utiliser

Tout d'abord, vous devez installer l'utilitaire [Vagrant] et un hyperviseur de machine virtuelle ([VirtualBox], [VMWare]...). 
Vagrant utilise un fichier de configuration appelé `Vagrantfile` pour construire l'environnement. 
Ce fichier est généralement placé à la racoine du projet et utlise la syntax Ruby mais ce n'est pas très important pour le moment.
 
### Sur un projet déjà configuré (fichier Vargantfile présent)

Il suffit de lancer la commande suivante depuis le répertoire du projet:

    vagrant up

Le premier lancement peut-être un peu long, car l'outil va télécharger l'image de la VM et la "provisionner" (installer les éléments nécessaires au bon fonctionnement de l'environnement)
Vous devriez obtenir quelque chose comme ça:

    $ vagrant up
    Bringing machine 'default' up with 'virtualbox' provider...
    ==> default: Importing base box 'local-test-ubuntu64'...
    ==> default: Matching MAC address for NAT networking...
    ==> default: Setting the name of the VM: test_box_default
    ==> default: Clearing any previously set network interfaces...
    ==> default: Preparing network interfaces based on configuration...
        default: Adapter 1: nat
    ==> default: Forwarding ports...
        default: 22 => 2222 (adapter 1)
    ==> default: Booting VM...
    ==> default: Waiting for machine to boot. This may take a few minutes...
        default: SSH address: 127.0.0.1:2222
        default: SSH username: vagrant
        default: SSH auth method: private key
        default: Warning: Connection timeout. Retrying...
        default:
        default: Vagrant insecure key detected. Vagrant will automatically replace
        default: this with a newly generated keypair for better security.
        default:
        default: Inserting generated public key within guest...
        default: Removing insecure key from the guest if its present...
        default: Key inserted! Disconnecting and reconnecting using new SSH key...
    ==> default: Machine booted and ready!
    ==> default: Checking for guest additions in VM...
    ==> default: Mounting shared folders...
        default: /vagrant => /mon/projet 

La machine peut ensuite être arreté avec:

    vagrant halt

Si vous voulez reconstruire votre environnement (changement dans la configruation, erreur de manipulation...), il suffit de le "provisionner" à nouveau:

    vagrant up --provision 


### Sur un nouveau projet

Il faut commencer par faire l'inventaire  des éléments nécessaires pour votre environnement... Dans cette exemple, nous allons configurer un LAMP classique sous Ubuntu.

1. Initialiser un fichier de configuration avec

        vagrant init ubuntu/trusty64

2. Modifier le fichier `Vagrantfile` qui vient d'être créé pour ajouter le script d'installation des serveurs web et base de données: 

        config.vm.provision "shell", inline: [
        //Pas d'écran interactif
            'export DEBIAN_FRONTEND=noninteractive', 
        // Mise à jour des dépots
            'apt-get update',  
        // Installation de Apache PHP MySQL  
            'apt-get install -y apache2 php5 php5-mysql php5-xdebug mysql-server mysql-client', 
        // Suppression des paquets après installation
            'apt-get clean -y', 
        // Specifié à Apahce le nom de serveur
            'echo "ServerName localhost" >> /etc/apache2/apache2.conf',
        // Redémarrer les services     
            'service apache2 restart',
            'service mysql restart',
        // Créer un base de données testdb    
            'echo "DROP DATABASE IF EXISTS testdb; CREATE DATABASE testdb;" | mysql -u root',
        // Supprimer l'index par défaut (répertoire lié au répertorie de développement
            'rm -f /var/www/html/index.html',
        // Sauvegarde de la date de provision de l'environnement
            'date > /etc/vagrant_provisioned_at'
          ].join("\n")
    
3. Mapper le port 8080 de votre machine sur le port 80 de la VM (Apache): 

        config.vm.network "forwarded_port", guest: 80, host: 8080

4. Mapper le répertoire de travail sur le Document Root d'Apache (et avec son user/group)

        config.vm.synced_folder ".", "/var/www/html", owner: "www-data", group: "www-data"

5. Donner un nom à votre VM dans VirtualBox (Optionnel)

        config.vm.provider "virtualbox" do |v|
          v.name = "vagrant-lamp"
        end


[Vagrant]: https://www.vagrantup.com/downloads.html "Page de téléchargement sur vagrantup.com"
[VMWare]: http://www.vmware.com/fr
[VirtualBox]: https://www.virtualbox.org
[building-source]: https://blog.engineyard.com/2014/building-a-vagrant-box