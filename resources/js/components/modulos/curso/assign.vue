<template>
	<div>
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Asignar Curso</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="content container-fluid">
			<div class="card">
				<div class="card-header">
					<div class="card-tools">
						<router-link class="btn btn-info btn-sm" :to="'/curso'">
							<i class="fas fa-arrow-left"></i> Regresar
						</router-link>
					</div>
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">LISTADO DE CURSOS</h3>
							</div>
							<div class="card-body">
								<form role="form">
									<div class="row">
										<h1 v-if="herramientas.length == 0"> EPPS</h1>
										<h1 v-else> HERRAMIENTAS</h1>
										<!-- <table>
											<thead>
												<th></th>
											</thead>
										</table> -->
									</div>	
								</form>
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

	name: "curso-assign",
	data() {
		return {
			herramientas: [],
			epps: []
		}
	},
	mixins: [mixins],
	methods: {
		getItems() {
			this.$store.state.fullscreenLoading = true;
			if(this.$route.params.tipo == 'HERRAMIENTAS')
			{
				this.$services.herramientaService.getAll().then( rspta => {
					this.herramientas = rspta.data;
				});
				this.$store.state.fullscreenLoading = false;
			}
			else
			{
				this.$services.eppService.getAll().then( rspta => {
					this.epps = rspta.data;
				});
				this.$store.state.fullscreenLoading = false;
			}
		}
	},
	mounted() {
		this.getItems();
	}
};
</script>