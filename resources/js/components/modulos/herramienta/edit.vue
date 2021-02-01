<template>
	<div>
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editar Herramienta</h5>
					<button class="close" @click="abrirModal"></button>
				</div>
				<div class="modal-body">

					<div v-if="this.skeleton_loading" class="item">
						<div class="item__meta">
							<div class="item__info">
								<PuSkeleton :count="1" width="45%" height="30px" style="margin-left:20px;"></PuSkeleton>
								<PuSkeleton :count="1" width="45%" height="30px" style="margin-left:20px;"></PuSkeleton>
							</div>
							<div class="item__title">
								<PuSkeleton :count="1" width="100%" height="30px"></PuSkeleton>
							</div>
						</div>
					</div>

					<form v-if="!this.skeleton_loading" role="form">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Nombre:</label>
									<div class="col-md-9">
										<input type="text" :class="{ 'is-invalid' : $store.state.errors.her_nombre }" class="form-control" v-model="herramienta.her_nombre" @keydown.tab="ResetearErrores('her_nombre')" @keyup.enter="setModificarHerramienta" >
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
										<input type="text" :class="{ 'is-invalid' : $store.state.errors.her_descripcion }" class="form-control" maxlength="3" v-model="herramienta.her_descripcion" @keydown.tab="ResetearErrores" @keyup.enter="setModificarHerramienta">
										<span v-if="$store.state.errors.her_descripcion" :class="['TextInvalid']">{{ $store.state.errors.her_descripcion[0] }}</span>
									</div>
								</div>
							</div>
						</div>	
					</form>
				</div>
				<div class="modal-footer">
					<div class="form-group row">
						<div class="col-md-4">
							<button class="btn btn-info btn-block" @click.prevent="setModificarHerramienta" v-loading.fullscreen.lock="$store.state.fullscreenLoading">Modificar</button>
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

	name: "herramienta-edit",
	data() {
		return {
			herramienta: {
				her_nombre: '',
				her_descripcion: '',
				uni_id: ''
			},
			skeleton_loading: null,
			her_id: ''
		}
	},
	mixins: [mixins],
	methods: {
		abrirModal() {
			this.$store.state.modalShowEdit = !this.$store.state.modalShowEdit;
			this.$store.state.errors = [];
		},
		limpiarFormulario() {
			this.herramienta.her_nombre = '';
			this.herramienta.her_descripcion = '';
			this.$store.state.errors = [];
		},
		ResetearErrores(text) {
			this.errors.text = '';
		},
		setModificarHerramienta() {
			this.$store.state.fullscreenLoading = true;
			this.$services.herramientaService.update(this.her_id, this.herramienta).then( rspta => {
				this.$store.state.modalShowEdit = !this.$store.state.modalShowEdit;
				this.$emit('llamarDataTable');
				this.MensajeEditar();
				this.$store.state.fullscreenLoading = false;
			});
		},
		getHerramienta(id) {
			this.her_id = id;
			this.skeleton_loading = true;
			this.$services.herramientaService.show(id).then( rspta => {
				this.herramienta.her_nombre = rspta.data[0].her_nombre;
				this.herramienta.her_descripcion = rspta.data[0].her_descripcion;
				this.herramienta.uni_id = rspta.data[0].uni_id;
				this.skeleton_loading = false;
			});
		}
	},
	mounted() {}
};
</script>