document.addEventListener('polymer-ready', function() {
	var app = document.querySelector('#app');
	app.heading = 'My Cool App';

	app.selected = 0;

	app.menuItemSelected = function(e, detail, sender) {
	  if (detail.isSelected) {
	    document.querySelector('#drawerPanel').closeDrawer();
	  }
	};	
})