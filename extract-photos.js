/*jslint node:true */
var setfile = process.argv.slice(2)[0],
    setjson = require('./' + setfile),
    photo = '', p,
		template_image = "[![{photo-title}][flickr-image-{photo-id}]][flickr-page-{photo-id}]",//"<https://www.flickr.com/photos/{user-id}/{photo-id}/>\n",
		template_ref = "[flickr-image-{photo-id}]: https://farm{farm-id}.staticflickr.com/{server-id}/{photo-id}_{secret}_c.jpg"
		+ "\n" + "[flickr-page-{photo-id}]: https://www.flickr.com/photos/{user-id}/{photo-id}/",
		generate = function (template) {
			for (p in setjson.photoset.photo) {
				if (setjson.photoset.photo.hasOwnProperty(p)) {
					photo = setjson.photoset.photo[p];
					console.log(
						template
						.replace(/{user-id}/g, setjson.photoset.owner)
						.replace(/{photo-id}/g, photo.id)
						.replace(/{photo-title}/g, photo.title)
						.replace(/{farm-id}/g, photo.farm)
						.replace(/{server-id}/g, photo.server)
						.replace(/{secret}/g, photo.secret)
					);
				}
			}
		};

generate(template_image);
generate(template_ref);
