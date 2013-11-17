/*
Template: page
Title: Cron and Quartz Jobs
tags: unix
*/

## Crontab colonnes
1. seconde (pour [Quartz](http://quartz-scheduler.org/documentation/quartz-1.x/tutorials/crontrigger))
2. minute
3. hour	
4. day of month	
5. month	
6. day of week	
7. user
8. cmd

## Syntaxe pour les périodes
* \*/n : tout les n (*/2 toutes les 2 minutes)
* a-b : de a à b (1-5 => 1,2,3,4 et 5)
* a,c,d : Liste de valeurs
* 10-16/2 = 10,12,14,16
* Pour Quartz:
 * L : dernier ("6L" means "Dernier vendredi du mois")
 * W : Jour de la semaine (15W le jour de la semaine le plus proche du 15)
 * \# : pour spécifier les nième du mois (6#3 : le 3ème vendredi du mois)

