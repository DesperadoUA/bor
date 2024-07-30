const cssDI = ['fonts', 'variable', 'common', 'content', 'header', 'footer', 'nav_menu', 'grid', 'social']
const jsDI = ['common', 'header', 'nav_menu']
const defaultDI = { DEFAULT: { js: jsDI, css: cssDI, fileName: 'default' } }
module.exports.schemas = {
	PAGES: {
		FRONT_PAGE: {
			js: jsDI.concat(['swiper', 'game_info']),
			css: cssDI.concat(['main_banner', 'swiper', 'game_info']),
			fileName: 'front'
		},
		...defaultDI
	},
	POSTS: {
		GAME: {
			js: jsDI.concat([]),
			css: cssDI.concat([]),
			fileName: 'gamePost'
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
