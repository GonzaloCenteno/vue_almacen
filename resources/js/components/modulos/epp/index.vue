<template>
	<div>
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Modulo - EPPS</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="content container-fluid">
			<div class="card">
				<div class="card-header">
					<div class="card-tools">
						<button type="button" class="btn btn-info btn-sm" @click="abrirModal"><i class="fas fa-plus-square"></i> Nuevo EPP</button>
					</div>
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">LISTADO DE EPPS</h3>
							</div>
							<div class="card-body">
								<v-client-table :columns="columns" :data="epps" :options="options">
									<button type="button" slot="edit" slot-scope="props" class="btn btn-warning text-center" @click="Editar(props.row)">Editar</button>
								</v-client-table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" :class="{ show: this.$store.state.modalShowCreate }" :style=" this.$store.state.modalShowCreate ? mostrarModal : ocultarModal ">
			<eppCreate @llamarDataTable="getEpps"></eppCreate>
		</div>

		<div class="modal fade" :class="{ show: this.$store.state.modalShowEdit }" :style=" this.$store.state.modalShowEdit ? mostrarModal : ocultarModal ">
			<eppEditar @llamarDataTable="getEpps" ref="EppModal"></eppEditar>
		</div>
	</div>
</template>

<script>
import eppCreate from './create.vue';
import eppEditar from './edit.vue';
export default {
	name: "epp-index",
	components: {
		eppCreate,
		eppEditar
	},
	data() {
		return {
			epps: [],
			columns: ['epp_id','epp_descripcion','edit'],
			options: {
				perPage: 5,
				perPageValues: [5,10,15,20],
				headings: {
					epp_id: 'ID',
					epp_descripcion: 'DESCRIPCION',
					edit: 'EDITAR'
				},
				columnsClasses: {
                    epp_id: 'text-center',
                    epp_descripcion:'text-left',
                    edit: 'text-center'
                },
				sortable: ['epp_id','epp_descripcion'],
				filterable: ['epp_id','epp_descripcion']
			},
			mostrarModal: {
				display: 'block',
				background: '#0000006b'
			},
			ocultarModal: {
				display: 'none'
			}
		}
	},
	methods: {
		abrirModal() {
			this.$store.state.modalShowCreate = !this.$store.state.modalShowCreate;
		},
		Editar(row) {
			this.$refs.EppModal.getEpp(row.epp_id);
			this.$store.state.modalShowEdit = !this.$store.state.modalShowEdit;
		},
		getEpps() {
			this.$services.eppService.getAll().then( rspta => {
				this.epps = rspta.data;
			});
		}
	},
	mounted() {
		this.getEpps();
	}
};
</script>