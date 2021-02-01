import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
	routes: [
		{ path: '/', component: require('../components/modulos/area/index').default },
		{ path: '/area/crear', component: require('../components/modulos/area/create').default },
		{ path: '/area/:id/editar', name: 'EditarArea', component: require('../components/modulos/area/edit').default },

		{ path: '/sucursal', component: require('../components/modulos/sucursal/index').default },
		{ path: '/sucursal/crear', component: require('../components/modulos/sucursal/create').default },
		{ path: '/sucursal/:id/editar', name: 'EditarSucursal', component: require('../components/modulos/sucursal/edit').default },

		{ path: '/unidad', component: require('../components/modulos/unidad/index').default },
		{ path: '/unidad/crear', component: require('../components/modulos/unidad/create').default },
		{ path: '/unidad/:id/editar', name: 'EditarUnidad', component: require('../components/modulos/unidad/edit').default },

		{ path: '/herramienta', component: require('../components/modulos/herramienta/index').default },

		{ path: '/epp', component: require('../components/modulos/epp/index').default },

		{ path: '/curso', component: require('../components/modulos/curso/index').default },
		{ path: '/curso/:tipo/asignar', name: 'AsignarCurso', component: require('../components/modulos/curso/assign').default },
	],
	mode: 'history',
	linkActiveClass: 'active'
})