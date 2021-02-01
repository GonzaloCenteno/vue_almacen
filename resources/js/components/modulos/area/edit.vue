<template>
	<div>
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Modificar Area</h1>
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
								<h3 class="card-title">FORMULARIO MODIFICAR AREA</h3>
							</div>
							<div class="card-body">

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
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Descripcion</label>
												<div class="col-md-9">
													<input type="text" :class="{ 'is-invalid' : $store.state.errors.are_descripcion }" class="form-control" v-model="area.are_descripcion" @keydown.tab="ResetearErrores('are_descripcion')" @keyup.enter="setModificarArea" >
													<span v-if="$store.state.errors.are_descripcion" :class="['TextInvalid']">{{ $store.state.errors.are_descripcion[0] }}</span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Abreviatura</label>
												<div class="col-md-9">
													<input type="text" :class="{ 'is-invalid' : $store.state.errors.are_abreviatura }" class="form-control" maxlength="3" v-model="area.are_abreviatura" @keydown.tab="ResetearErrores" @keyup.enter="setModificarArea">
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
										<button class="btn btn-flat btn-info btn-block" @click.prevent="setModificarArea" v-loading.fullscreen.lock="$store.state.fullscreenLoading">Modificar</button>
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
			area: {
				are_descripcion: '',
				are_abreviatura: ''
			},
			skeleton_loading: null,
		}
	},
	mixins: [mixins],
	methods: {
		getArea() {
			this.skeleton_loading = true;
			this.$services.areaService.show(this.$route.params.id).then( rspta => {
				this.area.are_descripcion = rspta.data[0].are_descripcion;
				this.area.are_abreviatura = rspta.data[0].are_abreviatura;
				this.skeleton_loading = false;
			});
		},
		limpiarFormulario() {
			this.area.are_descripcion = '';
			this.area.are_abreviatura = '';
			this.$store.state.errors = [];
		},
		ResetearErrores(text) {
			this.errors.text = '';
		},
		setModificarArea() {
			this.$store.state.fullscreenLoading = true;
			this.$services.areaService.update(this.$route.params.id, this.area).then( rspta => {
				this.$store.state.fullscreenLoading = false;
				this.MensajeEditar();
				this.$router.push('/');
			});	
		}
	},
	mounted() {
		this.getArea();
		this.$store.state.errors = [];
	}
};
</script>