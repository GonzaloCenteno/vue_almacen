<template>
	<div>
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Modificar Unidad</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="content container-fluid">
			<div class="card">
				<div class="card-header">
					<div class="card-tools">
						<router-link class="btn btn-info btn-sm" :to="'/unidad'">
							<i class="fas fa-arrow-left"></i> Regresar
						</router-link>
					</div>
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">FORMULARIO MODIFICAR UNIDAD</h3>
							</div>
							<div class="card-body">
								<form role="form">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Descripcion</label>
												<div class="col-md-9">
													<input type="text" :class="{ 'is-invalid' : $store.state.errors.uni_descripcion }" class="form-control" v-model="unidad.uni_descripcion" @keydown.tab="ResetearErrores('uni_descripcion')" @keyup.enter="setModificarUnidad" >
													<span v-if="$store.state.errors.uni_descripcion" :class="['TextInvalid']">{{ $store.state.errors.uni_descripcion[0] }}</span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Abreviatura</label>
												<div class="col-md-9">
													<input type="text" :class="{ 'is-invalid' : $store.state.errors.uni_abreviatura }" class="form-control" maxlength="3" v-model="unidad.uni_abreviatura" @keydown.tab="ResetearErrores('uni_abreviatura')" @keyup.enter="setModificarUnidad">
													<span v-if="$store.state.errors.uni_abreviatura" :class="['TextInvalid']">{{ $store.state.errors.uni_abreviatura[0] }}</span>
												</div>
											</div>
										</div>
									</div>	
								</form>
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-md-3 offset-3">
										<button class="btn btn-flat btn-info btn-block" @click.prevent="setModificarUnidad" v-loading.fullscreen.lock="$store.state.fullscreenLoading">Modificar</button>
									</div>
									<div class="col-md-3">
										<button class="btn btn-flat btn-default btn-block" @click.prevent="limpiarFormulario">Limpiar</button>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

import mixins from '../../../utils/index.js';
export default {

	name: "area-edit",
	data() {
		return {
			unidad: {
				uni_descripcion: '',
				uni_abreviatura: ''
			}
		}
	},
	mixins: [mixins],
	methods: {
		getUnidad() {
			this.$store.state.fullscreenLoading = true;
			this.$services.unidadService.show(this.$route.params.id).then( rspta => {
				this.unidad.uni_descripcion = rspta.data[0].uni_descripcion;
				this.unidad.uni_abreviatura = rspta.data[0].uni_abreviatura;
				this.$store.state.fullscreenLoading = false;
			});
		},
		limpiarFormulario() {
			this.unidad.uni_descripcion = '';
			this.unidad.uni_abreviatura = '';
			this.$store.state.errors = [];
		},
		ResetearErrores(text) {
			console.log(text);
			this.errors.text = '';
		},
		setModificarUnidad() {
			this.$store.state.fullscreenLoading = true;
			this.$services.unidadService.update(this.$route.params.id, this.unidad).then( rspta => {
				this.$store.state.fullscreenLoading = false;
				this.MensajeEditar();
				this.$router.push('/unidad');
			});	
		}
	},
	mounted() {
		this.getUnidad();
		this.$store.state.errors = [];
	}
};
</script>