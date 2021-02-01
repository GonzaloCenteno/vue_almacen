<template>
	<div>
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Nuevo Curso</h5>
					<button class="close" @click="abrirModal"></button>
				</div>
				<div class="modal-body">
					<form role="form">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Descripcion:</label>
									<div class="col-md-9">
										<input type="text" :class="{ 'is-invalid' : $store.state.errors.cur_descripcion }" class="form-control" v-model="curso.cur_descripcion" @keydown.tab="ResetearErrores" @keyup.enter="setRegistrarCurso">
										<span v-if="$store.state.errors.cur_descripcion" :class="['TextInvalid']">{{ $store.state.errors.cur_descripcion[0] }}</span>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group row">
									<label class="col-md-2 col-form-label">Tipo:</label>
									<div class="col-md-10">
										<el-select v-model="curso.cur_tipo" placeholder="Seleccionar Tipo" :class="{ 'is-invalid' : $store.state.errors.cur_tipo }" clearable>
											<el-option v-for="item in tipos" :key="item.id" :label="item.name" :value="item.name"></el-option>
										</el-select>
										<span v-if="$store.state.errors.cur_tipo" :class="['TextInvalid']">{{ $store.state.errors.cur_tipo[0] }}</span>
									</div>
								</div>
							</div>
						</div>	
					</form>
				</div>
				<div class="modal-footer">
					<div class="row">
						<div class="col-md-4">
							<button class="btn btn-info btn-block" @click.prevent="setRegistrarCurso" v-loading.fullscreen.lock="$store.state.fullscreenLoading">Registrar</button>
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

	name: "curso-create",
	data() {
		return {
			curso: {
				cur_descripcion: '',
				cur_tipo: ''
			},
			tipos: []
		}
	},
	mixins: [mixins],
	methods: {
		abrirModal() {
			this.$store.state.modalShowCreate = !this.$store.state.modalShowCreate;
			this.limpiarFormulario();
		},
		limpiarFormulario() {
			this.curso.cur_descripcion = '';
			this.$store.state.errors = [];
		},
		ResetearErrores(text) {
			this.errors.text = '';
		},
		setRegistrarCurso() {
			this.$store.state.fullscreenLoading = true;
			this.$services.cursoService.create(this.curso).then( rspta => {
				this.MensajeCrear();
				this.$emit('llamarDataTable');
				this.$store.state.modalShowCreate = !this.$store.state.modalShowCreate;
				this.$store.state.fullscreenLoading = false;
			});
		},
		getTipos(tipos) {
			this.tipos = tipos;
		}
	},
	mounted() {}
};
</script>