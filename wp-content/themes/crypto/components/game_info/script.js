function gameInfo() {
	const swiper = new Swiper('.game-info-wrapper', {
		loop: true,
		slidesPerView: 5,
		autoplay: {
			delay: 5000
		},
		pagination: {
			el: '.swiper-pagination'
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev'
		}
	})
	console.log('init')
}
gameInfo()
