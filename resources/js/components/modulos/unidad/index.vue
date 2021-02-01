<template>
	<div>
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Modulo - Unidades</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="content container-fluid">
			<div class="card">
				<div class="card-header">
					<div class="card-tools">
						<router-link class="btn btn-info btn-sm" :to="'/unidad/crear'">
							<i class="fas fa-plus-square"></i> Nueva Unidad
						</router-link>
					</div>
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">LISTADO DE UNIDADES</h3>
							</div>
							<div class="card-body">
								<v-client-table :columns="columns" :data="unidades" :options="options"class="text-center">
									<button type="button" slot="edit" slot-scope="props" class="btn btn-warning text-center" @click="Editar(props.row)">Editar</button>
								</v-client-table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "unidad-index",
	data() {
		return {
			unidades: [],
			columns: ['uni_id','uni_descripcion','uni_abreviatura','edit'],
			options: {
				perPage: 5,
				perPageValues: [5,10,15,20],
				headings: {
					uni_id: 'ID',
					uni_descripcion: 'DESCRIPCION',
					uni_abreviatura: 'ABREVIATURA',
					edit: 'EDITAR'
				},
				sortable: ['uni_id','uni_descripcion','uni_abreviatura'],
				filterable: ['uni_id','uni_descripcion','uni_abreviatura']
			}
		}
	},
	methods: {
		Editar(row) {
			this.$router.push({
			    name: 'EditarUnidad', 
			    params: { id: row.uni_id}
			});
		},
		getUnidades() {
			this.$services.unidadService.getAll().then( rspta => {
				this.unidades = rspta.data;
			});
		}
	},
	mounted() {
		this.getUnidades();
	}
};
</script>