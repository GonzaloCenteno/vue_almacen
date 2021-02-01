<template>
	<div>
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Modulo - Sucursales</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="content container-fluid">
			<div class="card">
				<div class="card-header">
					<div class="card-tools">
						<router-link class="btn btn-info btn-sm" :to="'/sucursal/crear'">
							<i class="fas fa-plus-square"></i> Nueva Sucursal
						</router-link>
					</div>
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">LISTADO DE SUCURSALES</h3>
							</div>
							<div class="card-body">
								<v-client-table :columns="columns" :data="sucursales" :options="options"class="text-center">
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
	name: "sucursal-index",
	data() {
		return {
			sucursales: [],
			columns: ['suc_id','suc_descripcion','suc_direccion','suc_abreviatura','edit'],
			options: {
				perPage: 5,
				perPageValues: [5,10,15,20],
				headings: {
					suc_id: 'ID',
					suc_descripcion: 'DESCRIPCION',
					suc_direccion: 'DIRECCION',
					suc_abreviatura: 'ABREVIATURA',
					edit: 'EDITAR'
				},
				sortable: ['suc_id','suc_descripcion','suc_direccion','suc_abreviatura'],
				filterable: ['suc_id','suc_descripcion','suc_direccion','suc_abreviatura']
			}
		}
	},
	methods: {
		Editar(row) {
			this.$router.push({
			    name: 'EditarSucursal', 
			    params: { id: row.suc_id}
			});
		},
		getSucursales() {
			this.$services.sucursalService.getAll().then( rspta => {
				this.sucursales = rspta.data;
			});
		}
	},
	mounted() {
		this.getSucursales();
	}
};
</script>