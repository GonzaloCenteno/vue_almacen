<template>
	<div>
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Modulo - Areas</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="content container-fluid">
			<div class="card">
				<div class="card-header">
					<div class="card-tools">
						<router-link class="btn btn-info btn-sm" :to="'/area/crear'">
							<i class="fas fa-plus-square"></i> Nueva Area
						</router-link>
					</div>
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">LISTADO DE AREAS</h3>
							</div>
							<div class="card-body">
								<v-client-table :columns="columns" :data="areas" :options="options"class="text-center">
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
	name: "area-index",
	data() {
		return {
			areas: [],
			columns: ['are_id','are_descripcion','are_abreviatura','edit'],
			options: {
				perPage: 5,
				perPageValues: [5,10,15,20],
				headings: {
					are_id: 'ID',
					are_descripcion: 'DESCRIPCION',
					are_abreviatura: 'ABREVIATURA',
					edit: 'EDITAR'
				},
				sortable: ['are_id','are_descripcion','are_abreviatura'],
				filterable: ['are_id','are_descripcion','are_abreviatura']
			}
		}
	},
	methods: {
		Editar(row) {
			this.$router.push({
			    name: 'EditarArea', 
			    params: { id: row.are_id}
			});
		},
		getAreas() {
			this.$services.areaService.getAll().then( rspta => {
				this.areas = rspta.data;
			});
		}
	},
	mounted() {
		this.getAreas();
	}
};
</script>