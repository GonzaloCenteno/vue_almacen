export default (axios) => {
	return {
		getAll() {
			return axios.get(`/unidades/getListarUnidades`);
		},
		create(params) {
			return axios.post(`/unidades/crearUnidad`, params);
		},
		show(id) {
			return axios.get(`/unidades/getUnidad/${id}`);
		},
		update(id, params) {
			return axios.put(`/unidades/modificarUnidad/${id}`, params);
		}
	}
}