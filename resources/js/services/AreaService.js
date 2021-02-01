export default (axios) => {
	return {
		getAll() {
			return axios.get(`/areas/getListarAreas`);
		},
		create(params) {
			return axios.post(`/areas/crearAreas`, params);
		},
		show(id) {
			return axios.get(`/areas/getArea/${id}`);
		},
		update(id, params) {
			return axios.put(`/areas/modificarArea/${id}`, params);
		}
	}
}