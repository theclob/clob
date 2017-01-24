var hljs = require('./vendor/highlight');

// Syntax highlighting
hljs.initHighlightingOnLoad();

var images = document.querySelectorAll('.post-content img'),
	i = 0,
	ln = images.length;

for(; i < ln; i++) {
	var altText = images[i].getAttribute('alt');

	if(altText.length > 0) {
		var imageCaptionEl = document.createElement('p');
		imageCaptionEl.className = 'img-caption';
		imageCaptionEl.innerText = altText;

		images[i].parentNode.insertBefore(imageCaptionEl, images[i].nextSibling);
	}
}