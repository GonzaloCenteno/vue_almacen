<template>
	<div>
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editar EPP</h5>
					<button class="close" @click="abrirModal"></button>
				</div>
				<div class="modal-body">

					<div v-if="this.skeleton_loading" class="item">
						<div class="item__meta">
							<div class="item__title">
								<PuSkeleton :count="1" width="100%" height="30px"></PuSkeleton>
							</div>
						</div>
					</div>

					<form v-if="!this.skeleton_loading" role="form">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Descripcion:</label>
									<div class="col-md-9">
										<input type="text" :class="{ 'is-invalid' : $store.state.errors.epp_descripcion }" class="form-control" v-model="epp.epp_descripcion" @keydown.tab="ResetearErrores('epp_descripcion')" @keyup.enter="setModificarEpp" >
										<span v-if="$store.state.errors.epp_descripcion" :class="['TextInvalid']">{{ $store.state.errors.epp_descripcion[0] }}</span>
									</div>
								</div>
							</div>
						</div>	
					</form>
				</div>
				<div class="modal-footer">
					<div class="form-group row">
						<div class="col-md-4">
							<button class="btn btn-info btn-block" @click.prevent="setModificarEpp" v-loading.fullscreen.lock="$store.state.fullscreenLoading">Modificar</button>
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

	name: "epp-edit",
	data() {
		return {
			epp: {
				epp_descripcion: '',
			},
			skeleton_loading: null,
			epp_id: ''
		}
	},
	mixins: [mixins],
	methods: {
		abrirModal() {
			this.$store.state.modalShowEdit = !this.$store.state.modalShowEdit;
			this.$store.state.errors = [];
		},
		limpiarFormulario() {
			this.epp.epp_descripcion = '';
			this.$store.state.errors = [];
		},
		ResetearErrores(text) {
			this.errors.text = '';
		},
		setModificarEpp() {
			this.$store.state.fullscreenLoading = true;
			this.$services.eppService.update(this.epp_id, this.epp).then( rspta => {
				this.$store.state.modalShowEdit = !this.$store.state.modalShowEdit;
				this.$emit('llamarDataTable');
				this.MensajeEditar();
				this.$store.state.fullscreenLoading = false;
			});
		},
		getEpp(id) {
			this.epp_id = id;
			this.skeleton_loading = true;
			this.$services.eppService.show(id).then( rspta => {
				this.epp.epp_descripcion = rspta.data[0].epp_descripcion;
				this.skeleton_loading = false;
			});
		}
	},
	mounted() {}
};
</script>