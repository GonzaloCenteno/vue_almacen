<template>
	<div>
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Modulo - Cursos</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="content container-fluid">
			<div class="card">
				<div class="card-header">
					<div class="card-tools">
						<button type="button" class="btn btn-info btn-sm" @click="abrirModal"><i class="fas fa-plus-square"></i> Nuevo Curso</button>
					</div>
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">LISTADO DE CURSOS</h3>
							</div>
							<div class="card-body">
								<v-client-table ref="table" :columns="columns" :data="cursos" :options="options">
									<button type="button" slot="edit" slot-scope="props" class="btn btn-warning text-center" @click="Editar(props.row)">Editar</button>
									<button type="button" slot="asign" slot-scope="props" class="btn btn-danger text-center" @click="Asignar(props.row)"><i class="fa fa-plus-square"></i></button>
									<button type="button" slot="view" slot-scope="props" class="btn btn-primary text-center" @click="Editar(props.row)"><i class="fa fa-eye"></i></button>
								</v-client-table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" :class="{ show: this.$store.state.modalShowCreate }" :style=" this.$store.state.modalShowCreate ? mostrarModal : ocultarModal ">
			<cursoCreate @llamarDataTable="getCursos" ref="DataModal"></cursoCreate>
		</div>

		<div class="modal fade" :class="{ show: this.$store.state.modalShowEdit }" :style=" this.$store.state.modalShowEdit ? mostrarModal : ocultarModal ">
			<cursoEditar @llamarDataTable="getCursos" ref="CursoModal"></cursoEditar>
		</div>
	</div>
</template>

<script>
import cursoCreate from './create.vue';
import cursoEditar from './edit.vue';
export default {
	name: "curso-index",
	components: {
		cursoCreate,
		cursoEditar
	},
	data() {
		return {
			cursos: [],
			tipos: [
				{ id: 'HERRAMIENTAS', name: 'HERRAMIENTAS' },
				{ id: 'EPPS', name: 'EPPS' }
			],
			columns: ['cur_id','cur_descripcion','cur_tipo','edit','asign','view'],
			options: {
				perPage: 5,
				perPageValues: [5,10,15,20],
				headings: {
					cur_id: 'ID',
					cur_descripcion: 'DESCRIPCION',
					cur_tipo: 'TIPO',
					edit: 'EDITAR',
					asign: 'ASIGNAR',
					view: 'VER'
				},
				columnsClasses: {
                    cur_id: 'text-center',
                    cur_descripcion:'text-left',
                    cur_tipo: 'text-left',
                    edit: 'text-center',
                    asign: 'text-center',
					view: 'text-center'
                },
				sortable: ['cur_id','cur_descripcion','cur_tipo'],
				filterable: ['cur_id','cur_descripcion','cur_tipo']
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
			this.$refs.DataModal.getTipos(this.tipos);
			this.$store.state.modalShowCreate = !this.$store.state.modalShowCreate;
		},
		Editar(row) {
			this.$refs.CursoModal.getCurso(row.cur_id);
			this.$refs.CursoModal.getTipos(this.tipos);
			this.$store.state.modalShowEdit = !this.$store.state.modalShowEdit;
		},
		Asignar(row) {
			this.$router.push({
			    name: 'AsignarCurso', 
			    params: { tipo: row.cur_tipo}
			});
		},
		getCursos() {
			this.$services.cursoService.getAll().then( rspta => {
				this.cursos = rspta.data;
			});
		}
	},
	mounted() {
		this.getCursos();
	}
};
</script>