<template>
	<div>
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Crear Area</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="content container-fluid">
			<div class="card">
				<div class="card-header">
					<div class="card-tools">
						<router-link class="btn btn-info btn-sm" :to="'/'">
							<i class="fas fa-arrow-left"></i> Regresar
						</router-link>
					</div>
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">FORMULARIO REGISTRAR AREA</h3>
							</div>
							<div class="card-body">
								<form role="form">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Descripcion</label>
												<div class="col-md-9">
													<input type="text" :class="{ 'is-invalid' : $store.state.errors.are_descripcion }" class="form-control" v-model="area.are_descripcion" @keydown.tab="ResetearErrores('are_descripcion')" @keyup.enter="setRegistrarArea" >
													<span v-if="$store.state.errors.are_descripcion" :class="['TextInvalid']">{{ $store.state.errors.are_descripcion[0] }}</span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Abreviatura</label>
												<div class="col-md-9">
													<input type="text" :class="{ 'is-invalid' : $store.state.errors.are_abreviatura }" class="form-control" maxlength="3" v-model="area.are_abreviatura" @keydown.tab="ResetearErrores" @keyup.enter="setRegistrarArea">
													<span v-if="$store.state.errors.are_abreviatura" :class="['TextInvalid']">{{ $store.state.errors.are_abreviatura[0] }}</span>
												</div>
											</div>
										</div>
									</div>	
								</form>
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-md-3 offset-3">
										<button class="btn btn-flat btn-info btn-block" @click.prevent="setRegistrarArea" v-loading.fullscreen.lock="$store.state.fullscreenLoading">Registrar</button>
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

	name: "area-create",
	data() {
		return {
			area: {
				are_descripcion: '',
				are_abreviatura: ''
			}
		}
	},
	mixins: [mixins],
	methods: {
		setRegistrarArea() {
			this.$store.state.fullscreenLoading = true;
			this.$services.areaService.create(this.area).then( () => {
				this.$store.state.fullscreenLoading = false;
				this.MensajeCrear();
				this.$router.push('/');
			});
		},
		limpiarFormulario() {
			this.area.are_descripcion = '';
			this.area.are_abreviatura = '';
			this.$store.state.errors = [];
		},
		ResetearErrores(text) {
			console.log('errors');
			this.errors.text = '';
		}
	},
	mounted() {
		this.$store.state.errors = [];
	}
};
</script>