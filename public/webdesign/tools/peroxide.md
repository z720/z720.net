/* 
Title: Peroxide - configurable local proxy server
Template: Link
Link: https://github.com/creativemarket/peroxide
Date: 2014/05/08 13:00
*/


[Peroxide](https://github.com/creativemarket/peroxide) est un petit serveur proxy qui permet de rediriger des ressources soit vers un équivalent local ou vers la production.

-----

A partir d'un simple fichier JSON de configuration, Peroxide va tenter de servir les ressources dans l'ordre:

	{
	   "/assets": {
		  "responder": "buffer",
		  "sources": [
			 {"type": "filesystem", "options": {"path": "/var/path/to/local/assets"}},
			 {"type": "http", "options": {"path": "http://production.server.com/assets"}}
		  ]
	   }
	}

<https://github.com/creativemarket/peroxide>