export default (axios) => {
	return {
		getAll() {
			return axios.get(`/epps/getListarEpps`);
		},
		create(params) {
			return axios.post(`/epps/crearEpps`, params);
		},
		show(id) {
			return axios.get(`/epps/getEpp/${id}`);
		},
		update(id, params) {
			return axios.put(`/epps/modificarEpp/${id}`, params);
		}
	}
}