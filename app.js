document.addEventListener('polymer-ready', function() {
	var tmpl = document.querySelector('#app');
	tmpl.heading = 'My Cool App';

	tmpl.selected = 0;
})