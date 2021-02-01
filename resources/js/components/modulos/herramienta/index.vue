<template>
	<div>
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Modulo - Herramientas</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="content container-fluid">
			<div class="card">
				<div class="card-header">
					<div class="card-tools">
						<button type="button" class="btn btn-info btn-sm" @click="abrirModal"><i class="fas fa-plus-square"></i> Nueva Herramienta</button>
					</div>
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">LISTADO DE HERRAMIENTAS</h3>
							</div>
							<div class="card-body">
								<v-client-table ref="table" :columns="columns" :data="herramientas" :options="options">
									<button type="button" slot="edit" slot-scope="props" class="btn btn-warning text-center" @click="Editar(props.row)">Editar</button>
								</v-client-table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" :class="{ show: this.$store.state.modalShowCreate }" :style=" this.$store.state.modalShowCreate ? mostrarModal : ocultarModal ">
			<herramientaCreate @llamarDataTable="getHerramientas"></herramientaCreate>
		</div>

		<div class="modal fade" :class="{ show: this.$store.state.modalShowEdit }" :style=" this.$store.state.modalShowEdit ? mostrarModal : ocultarModal ">
			<herramientaEditar @llamarDataTable="getHerramientas" ref="HerramientaModal"></herramientaEditar>
		</div>
	</div>
</template>

<script>
import herramientaCreate from './create.vue';
import herramientaEditar from './edit.vue';
export default {
	name: "herramienta-index",
	components: {
		herramientaCreate,
		herramientaEditar
	},
	data() {
		return {
			herramientas: [],
			columns: ['her_id','her_nombre','her_descripcion','uni_id','edit'],
			options: {
				perPage: 5,
				perPageValues: [5,10,15,20],
				headings: {
					her_id: 'ID',
					her_nombre: 'NOMBRE',
					her_descripcion: 'DESCRIPCION',
					uni_id: 'UNIDAD',
					edit: 'EDITAR'
				},
				columnsClasses: {
                    her_id: 'text-center',
                    her_nombre:'text-left',
                    her_descripcion: 'text-left',
                    uni_id: 'text-center',
                    edit: 'text-center'
                },
				sortable: ['her_id','her_nombre','her_descripcion','uni_id'],
				filterable: ['her_id','her_nombre','her_descripcion','uni_id']
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
			this.$store.dispatch('setUnidades');
		},
		Editar(row) {
			this.$refs.HerramientaModal.getHerramienta(row.her_id);
			this.$store.state.modalShowEdit = !this.$store.state.modalShowEdit;
			this.$store.dispatch('setUnidades');
		},
		getHerramientas() {
			this.$services.herramientaService.getAll().then( rspta => {
				this.herramientas = rspta.data;
			});
		}
	},
	mounted() {
		this.getHerramientas();
	}
};
</script>