class Scripts {
	constructor () {
		this.enhanceNavigation();
	}

	enhanceNavigation () {
		let Nav = document.querySelector('.Nav--primary');
		let NavOpen = document.querySelector('.Nav-open');
		document.querySelector('.Nav-close').remove();
		NavOpen.classList.add('is-dynamic');
		NavOpen.addEventListener('click', function(e) {
			this.classList.toggle('is-active');
			Nav.classList.toggle('is-active');
			e.preventDefault();
		})
	}
}

new Scripts();
