<template>
	<div>
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Crear Sucursal</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="content container-fluid">
			<div class="card">
				<div class="card-header">
					<div class="card-tools">
						<router-link class="btn btn-info btn-sm" :to="'/sucursal'">
							<i class="fas fa-arrow-left"></i> Regresar
						</router-link>
					</div>
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">FORMULARIO REGISTRAR SUCURSAL</h3>
							</div>
							<div class="card-body">
								<form role="form">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Descripcion:</label>
												<div class="col-md-9">
													<input type="text" :class="{ 'is-invalid' : $store.state.errors.suc_descripcion }" class="form-control" v-model="sucursal.suc_descripcion" @keydown.tab="ResetearErrores('suc_descripcion')" @keyup.enter="setRegistrarSucursal" >
													<span v-if="$store.state.errors.suc_descripcion" :class="['TextInvalid']">{{ $store.state.errors.suc_descripcion[0] }}</span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Abreviatura:</label>
												<div class="col-md-9">
													<input type="text" :class="{ 'is-invalid' : $store.state.errors.suc_abreviatura }" class="form-control" maxlength="3" v-model="sucursal.suc_abreviatura" @keydown.tab="ResetearErrores" @keyup.enter="setRegistrarSucursal">
													<span v-if="$store.state.errors.suc_abreviatura" :class="['TextInvalid']">{{ $store.state.errors.suc_abreviatura[0] }}</span>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group row">
												<label class="col-md-2 col-form-label">Direccion:</label>
												<div class="col-md-10">
													<input type="text" :class="{ 'is-invalid' : $store.state.errors.suc_direccion }" class="form-control" v-model="sucursal.suc_direccion" @keydown.tab="ResetearErrores" @keyup.enter="setRegistrarSucursal">
													<span v-if="$store.state.errors.suc_direccion" :class="['TextInvalid']">{{ $store.state.errors.suc_direccion[0] }}</span>
												</div>
											</div>
										</div>
									</div>	
								</form>
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-md-3 offset-3">
										<button class="btn btn-flat btn-info btn-block" @click.prevent="setRegistrarSucursal" v-loading.fullscreen.lock="$store.state.fullscreenLoading">Registrar</button>
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

	name: "sucursal-create",
	data() {
		return {
			sucursal: {
				suc_descripcion: '',
				suc_direccion: '',
				suc_abreviatura: ''
			}
		}
	},
	mixins: [mixins],
	methods: {
		setRegistrarSucursal() {
			this.$store.state.fullscreenLoading = true;
			this.$services.sucursalService.create(this.sucursal).then( () => {
				this.MensajeCrear();
				this.$router.push('/sucursal');
				this.$store.state.fullscreenLoading = false;
			});
		},
		limpiarFormulario() {
			this.sucursal.suc_descripcion = '';
			this.sucursal.suc_direccion = '';
			this.sucursal.suc_abreviatura = '';
			this.$store.state.errors = [];
		},
		ResetearErrores(text) {
			this.errors.text = '';
		}
	},
	mounted() {
		this.$store.state.errors = [];
	}
};
</script>