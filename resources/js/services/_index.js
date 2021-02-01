import areaService from './AreaService.js';
import sucursalService from './SucursalService.js';
import unidadService from './UnidadService.js';
import herramientaService from './HerramientaService.js';
import eppService from './EppService.js';
import cursoService from './CursoService.js';

import store from '../store/index';
import Vue from "vue";

import Axios from 'axios'

Axios.defaults.headers.common.Accept = 'application/json';

Axios.interceptors.response.use(
	response => {
		if (response.status === 200 || response.status === 201) {
			return Promise.resolve(response);
		} else {
			return Promise.reject(response);
		}
	},
	error => {
		if (error.response.status) {
			switch (error.response.status) {
				case 422:
					store.state.errors = error.response.data.errors;
					Vue.$toast.info("Debe Llenar Correctamente el formulario", {
					    timeout: 3000,
					});
					store.state.fullscreenLoading = false;
				break;

				case 401:
					alert("session expired");
				break;

				case 403:
					alert('page not exist');
				break;

				case 404:
					alert('page not exist');
				break;

				case 500:
					Vue.$toast.error("Ocurrio un Problema con el Servidor", {
					    timeout: 3000,
					});
					store.state.fullscreenLoading = false;
				break;

				case 502:
					Vue.$toast.error("Ocurrio un Problema con el Servidor", {
					    timeout: 3000,
					});
					store.state.fullscreenLoading = false;
			}
			return Promise.reject(error.response);
		}
	}
);

export default {
	areaService: new areaService(Axios),
	sucursalService: new sucursalService(Axios),
	unidadService: new unidadService(Axios),
	herramientaService: new herramientaService(Axios),
	eppService: new eppService(Axios),
	cursoService: new cursoService(Axios)
}