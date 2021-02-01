<template>
	<div>
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Nueva Herramienta</h5>
					<button class="close" @click="abrirModal"></button>
				</div>
				<div class="modal-body">
					<form role="form">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Nombre:</label>
									<div class="col-md-9">
										<input type="text" :class="{ 'is-invalid' : $store.state.errors.her_nombre }" class="form-control" v-model="herramienta.her_nombre" @keydown.tab="ResetearErrores('her_nombre')" @keyup.enter="setRegistrarHerramienta" >
										<span v-if="$store.state.errors.her_nombre" :class="['TextInvalid']">{{ $store.state.errors.her_nombre[0] }}</span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-md-2 col-form-label">Unidad:</label>
									<div class="col-md-10">
										<el-select v-model="herramienta.uni_id" placeholder="Seleccionar Unidad" :class="{ 'is-invalid' : $store.state.errors.uni_id }" clearable>
											<el-option v-for="item in $store.state.unidades" :key="item.uni_id" :label="item.uni_descripcion" :value="item.uni_id"></el-option>
										</el-select>
										<span v-if="$store.state.errors.uni_id" :class="['TextInvalid']">{{ $store.state.errors.uni_id[0] }}</span>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Descripcion:</label>
									<div class="col-md-9">
										<input type="text" :class="{ 'is-invalid' : $store.state.errors.her_descripcion }" class="form-control" maxlength="3" v-model="herramienta.her_descripcion" @keydown.tab="ResetearErrores" @keyup.enter="setRegistrarHerramienta">
										<span v-if="$store.state.errors.her_descripcion" :class="['TextInvalid']">{{ $store.state.errors.her_descripcion[0] }}</span>
									</div>
								</div>
							</div>
						</div>	
					</form>
				</div>
				<div class="modal-footer">
					<div class="row">
						<div class="col-md-4">
							<button class="btn btn-info btn-block" @click.prevent="setRegistrarHerramienta" v-loading.fullscreen.lock="$store.state.fullscreenLoading">Registrar</button>
						</div>
						<div class="col-md-4">
							<button class="btn btn-default btn-block" @click.prevent="limpiarFormulario()">Limpiar</button>
						</div>
						<div class="col-md-4">
							<button class="btn btn-danger btn-block" @click.prevent="abrirModal">Cerrar</button>	
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

	name: "herramienta-create",
	data() {
		return {
			herramienta: {
				her_nombre: '',
				her_descripcion: '',
				uni_id: ''
			},
		}
	},
	mixins: [mixins],
	methods: {
		abrirModal() {
			this.$store.state.modalShowCreate = !this.$store.state.modalShowCreate;
			this.limpiarFormulario();
		},
		limpiarFormulario() {
			this.herramienta.her_nombre = '';
			this.herramienta.her_descripcion = '';
			this.$store.state.errors = [];
		},
		ResetearErrores(text) {
			this.errors.text = '';
		},
		setRegistrarHerramienta() {
			this.$store.state.fullscreenLoading = true;
			this.$services.herramientaService.create(this.herramienta).then( rspta => {
				this.MensajeCrear();
				this.$emit('llamarDataTable');
				this.$store.state.modalShowCreate = !this.$store.state.modalShowCreate;
				this.$store.state.fullscreenLoading = false;
			});
		},
	},
	mounted() {}
};
</script>