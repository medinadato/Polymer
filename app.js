

document.addEventListener('polymer-ready', function() {
	// auto-binding template
	var app = document.querySelector('#app');

	app.heading = 'My Cool App';

	app.selected = 0;

	app.menuItemSelected = function(e, detail, sender) {
	  if (detail.isSelected) {
	    document.querySelector('#drawerPanel').closeDrawer();
	  }
	};

	// Working with core-list and faker data
	app.data = generateContacts();

	function generateContacts() {
		var data = [];
		for(var i = 0; i < 1000; i++) {
			data.push({
				name: faker.name.findName(),
				avatar: faker.internet.avatar()
			});
		}
		return data;
	}


})