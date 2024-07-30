{
	function menu() {
		const burger = document.querySelector('.js-header-modal-btn')
		burger.addEventListener('click', () => {
			document.querySelector('html').classList.toggle('modal-noscroll-full')
			document.querySelector('.js-header').classList.toggle('is-open')
			document.querySelector('.js-header-top').classList.toggle('is-open')
			document.querySelector('.js-header-modal').classList.toggle('is-open')
			document.querySelector('.js-header-modal-btn').classList.toggle('is-active')
		})
	}
	menu()
	function modalMenu() {
		const buttons = document.querySelectorAll('.c-header__menu-btn-collapse')
		buttons.forEach(btn => {
			btn.addEventListener('click', () => {
				btn.classList.toggle('collapsed')
				btn.nextElementSibling.classList.toggle('collapse')
			})
		})
	}
	modalMenu()
	function scroll() {
		window.addEventListener('scroll', event => {
			if (window.pageYOffset > 20) {
				document.querySelector('body').classList.add('header-minify')
				document.querySelector('.js-header').classList.add('is-scroll')
			} else {
				document.querySelector('body').classList.remove('header-minify')
				document.querySelector('.js-header').classList.remove('is-scroll')
			}
		})
	}
	scroll()
}
