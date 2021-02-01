export default (axios) => {
	return {
		getAll() {
			return axios.get(`/cursos/getListarCursos`);
		},
		create(params) {
			return axios.post(`/cursos/crearCursos`, params);
		},
		show(id) {
			return axios.get(`/cursos/getCurso/${id}`);
		},
		update(id, params) {
			return axios.put(`/cursos/modificarCurso/${id}`, params);
		}
	}
}