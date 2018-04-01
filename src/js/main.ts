class Scripts {
	constructor () {

	}

	ajaxPages () {
		let links = document.querySelectorAll('a');
		links.forEach(link => {
			link.addEventListener('click', (e) => {
				e.preventDefault();
				let target = e.target.tagName.toLowerCase() == 'a' ? e.target : e.target.closest('a');
				let path = parseUrl(target.href);
				fetch('/api/v1/pages/' + path)
				.then(res => res.json())
				.catch(error => console.error('Error:', error))
				.then(res => {
					console.log(res.data.content.text);
					document.querySelector('h1').innerText = res.data.title
					document.querySelector('.Section--primary').innerText = res.data.content.text
				})
			})
		});
	}
}

function parseUrl(url) {
	let result = url.replace(/https?:\/\//, '');
	let parts = result.split('/');
	let domain = parts.shift();
	let path = parts.join('/');
	return path;
}

new Scripts();
