export default (axios) => {
	return {
		getAll() {
			return axios.get(`/herramientas/getListarHerramientas`);
		},
		create(params) {
			return axios.post(`/herramientas/crearHerramientas`, params);
		},
		show(id) {
			return axios.get(`/herramientas/getHerramienta/${id}`);
		},
		update(id, params) {
			return axios.put(`/herramientas/modificarHerramienta/${id}`, params);
		}
	}
}