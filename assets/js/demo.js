
document.addEventListener('DOMContentLoaded', function() {
	var adminA = document.querySelectorAll('#wpadminbar a');

	for(i = 0; i < adminA.length; i++){
		adminA[i].setAttribute('target', 'blank')
	}
});