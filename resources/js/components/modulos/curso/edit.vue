<template>
	<div>
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editar Curso</h5>
					<button class="close" @click="abrirModal"></button>
				</div>
				<div class="modal-body">

					<div v-if="this.skeleton_loading" class="item">
						<div class="item__meta">
							<div class="item__info">
								<PuSkeleton :count="1" width="45%" height="30px" style="margin-left:20px;"></PuSkeleton>
								<PuSkeleton :count="1" width="45%" height="30px" style="margin-left:20px;"></PuSkeleton>
							</div>
						</div>
					</div>

					<form v-if="!this.skeleton_loading" role="form">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Descripcion:</label>
									<div class="col-md-9">
										<input type="text" :class="{ 'is-invalid' : $store.state.errors.cur_descripcion }" class="form-control" v-model="curso.cur_descripcion" @keydown.tab="ResetearErrores" @keyup.enter="setModificarCurso">
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
					<div class="form-group row">
						<div class="col-md-4">
							<button class="btn btn-info btn-block" @click.prevent="setModificarCurso" v-loading.fullscreen.lock="$store.state.fullscreenLoading">Modificar</button>
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

	name: "curso-edit",
	data() {
		return {
			curso: {
				cur_descripcion: '',
				cur_tipo: ''
			},
			skeleton_loading: null,
			cur_id: '',
			tipos: []
		}
	},
	mixins: [mixins],
	methods: {
		abrirModal() {
			this.$store.state.modalShowEdit = !this.$store.state.modalShowEdit;
			this.$store.state.errors = [];
		},
		limpiarFormulario() {
			this.curso.cur_descripcion = '';
			this.$store.state.errors = [];
		},
		ResetearErrores(text) {
			this.errors.text = '';
		},
		setModificarCurso() {
			this.$store.state.fullscreenLoading = true;
			this.$services.cursoService.update(this.cur_id, this.curso).then( rspta => {
				this.$store.state.modalShowEdit = !this.$store.state.modalShowEdit;
				this.$emit('llamarDataTable');
				this.MensajeEditar();
				this.$store.state.fullscreenLoading = false;
			});
		},
		getCurso(id) {
			this.cur_id = id;
			this.skeleton_loading = true;
			this.$services.cursoService.show(id).then( rspta => {
				this.curso.cur_descripcion = rspta.data[0].cur_descripcion;
				this.curso.cur_tipo = rspta.data[0].cur_tipo;
				this.skeleton_loading = false;
			});
		},
		getTipos(tipos) {
			this.tipos = tipos;
		}
	},
	mounted() {}
};
</script>