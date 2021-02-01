export default (axios) => {
	return {
		getAll() {
			return axios.get(`/sucursales/getListarSucursales`);
		},
		create(params) {
			return axios.post(`/sucursales/crearSucursal`, params);
		},
		show(id) {
			return axios.get(`/sucursales/getSucursal/${id}`);
		},
		update(id, params) {
			return axios.put(`/sucursales/modificarSucursal/${id}`, params);
		}
	}
}