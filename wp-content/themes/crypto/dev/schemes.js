const cssDI = [
	'fonts',
	'variable',
	'common',
	'content',
	'header',
	'footer',
	'nav_menu',
	'grid',
	'social',
	'side',
	'side_casino',
	'side_author',
	'rating'
]
const jsDI = ['common', 'header', 'nav_menu']
const defaultDI = { DEFAULT: { js: jsDI, css: cssDI, fileName: 'default' } }
module.exports.schemas = {
	PAGES: {
		FRONT_PAGE: {
			js: jsDI.concat(['swiper', 'game_info']),
			css: cssDI.concat(['main_banner', 'swiper', 'game_info', 'side', 'side_casino', 'side_author', 'rating']),
			fileName: 'front'
		},
		...defaultDI
	},
	POSTS: {
		GAME: {
			js: jsDI.concat([]),
			css: cssDI.concat(),
			fileName: 'gamePost'
		},
		BLOG: {
			js: jsDI.concat([]),
			css: cssDI.concat(),
			fileName: 'blogPost'
		},
		CASINO: {
			js: jsDI.concat([]),
			css: cssDI.concat(),
			fileName: 'casinoPost'
		},
		PAYMENT: {
			js: jsDI.concat([]),
			css: cssDI.concat(),
			fileName: 'paymentPost'
		},
		...defaultDI
	},
	CATEGORY: {
		...defaultDI
	},
	TAX: {
		...defaultDI
	}
}
