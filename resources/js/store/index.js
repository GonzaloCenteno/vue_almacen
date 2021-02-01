export default {
	state: {
		modalShowCreate: false,
		modalShowEdit: false,
		unidades: [],
		fullscreenLoading: false,
		errors: []
	},
	mutations: {
		getUnidades(state, data){
			state.unidades = data;
		}
	},
	actions: {
		setUnidades({ commit }) {
			axios.get(`/unidades/getListarUnidades`).then( rspta => {
				commit('getUnidades', rspta.data);
			}).catch( error => {
				console.log(error);
				console.log('Algo salio mal');
			});
		}
	}
}