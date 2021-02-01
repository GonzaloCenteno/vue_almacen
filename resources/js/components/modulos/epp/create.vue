<template>
	<div>
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Nuevo EPP</h5>
					<button class="close" @click="abrirModal"></button>
				</div>
				<div class="modal-body">
					<form role="form">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Descripcion:</label>
									<div class="col-md-9">
										<input type="text" :class="{ 'is-invalid' : $store.state.errors.epp_descripcion }" class="form-control" v-model="epp.epp_descripcion" @keydown.tab="ResetearErrores('epp_descripcion')" @keyup.enter="setRegistrarEpp" >
										<span v-if="$store.state.errors.epp_descripcion" :class="['TextInvalid']">{{ $store.state.errors.epp_descripcion[0] }}</span>
									</div>
								</div>
							</div>
						</div>	
					</form>
				</div>
				<div class="modal-footer">
					<div class="row">
						<div class="col-md-4">
							<button class="btn btn-info btn-block" @click.prevent="setRegistrarEpp" v-loading.fullscreen.lock="$store.state.fullscreenLoading">Registrar</button>
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

	name: "epp-create",
	data() {
		return {
			epp: {
				epp_descripcion: '',
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
			this.epp.epp_descripcion = '';
			this.$store.state.errors = [];
		},
		ResetearErrores(text) {
			this.errors.text = '';
		},
		setRegistrarEpp() {
			this.$store.state.fullscreenLoading = true;
			this.$services.eppService.create(this.epp).then( rspta => {
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