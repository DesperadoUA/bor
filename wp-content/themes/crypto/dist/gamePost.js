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
{
	document.addEventListener('DOMContentLoaded', () => {
		const contentContainer = document.querySelector('.cms')
		const navMenuItems = document.querySelectorAll('.nav_menu_item')
		if (contentContainer && navMenuItems.length) {
			const headings = []
			const urlHash = window.location.hash
			contentContainer.querySelectorAll('h2').forEach(heading => headings.push(heading))
			contentContainer.querySelectorAll('h3').forEach(heading => headings.push(heading))
			contentContainer.querySelectorAll('h4').forEach(heading => headings.push(heading))
			contentContainer.querySelectorAll('h5').forEach(heading => headings.push(heading))
			contentContainer.querySelectorAll('h6').forEach(heading => headings.push(heading))
			headings.forEach(item => {
				navMenuItems.forEach(menuItem => {
					if (menuItem.innerText === item.innerText) {
						const [domain, hash] = menuItem.href.split('#')
						item.id = hash
					}
				})
			})
			if (urlHash) {
				document.querySelector(urlHash).scrollIntoView({ block: 'center', behavior: 'smooth' })
			}
		}
	})
}
