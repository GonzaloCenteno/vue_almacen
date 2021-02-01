<template>
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="../../index3.html" class="brand-link">
			<img :src="ruta + '/img/adminLTELogo.png'"
			alt="AdminLTE Logo"
			class="brand-image img-circle elevation-3"
			style="opacity: .8">
			<span class="brand-text font-weight-light">AdminLTE 3</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img :src="ruta + '/img/avatar.png'" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="#" class="d-block">Alexander Pierce</a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		          	<li class="nav-header">OPERACIONES</li>
		          	<li class="nav-item">
		          		<router-link class="nav-link" :to="'/'" >
		          			<i class="nav-icon fa fa-cogs"></i>
		          			<p>
		          				Areas
		          			</p>
		          		</router-link>
		          	</li>
		          	<li class="nav-item">
		          		<router-link class="nav-link" :to="'/sucursal'" >
		          			<i class="nav-icon fa fa-map-marker"></i>
		          			<p>
		          				Sucursales
		          			</p>
		          		</router-link>
		          	</li>
		          	<li class="nav-item">
		          		<router-link class="nav-link" :to="'/unidad'" >
		          			<i class="nav-icon fa fa-tags"></i>
		          			<p>
		          				Unidades
		          			</p>
		          		</router-link>
		          	</li>
		          	<li class="nav-item">
		          		<router-link class="nav-link" :to="'/herramienta'" >
		          			<i class="nav-icon fa fa-wrench"></i>
		          			<p>
		          				Herramientas
		          			</p>
		          		</router-link>
		          	</li>
		          	<li class="nav-item">
		          		<router-link class="nav-link" :to="'/epp'" >
		          			<i class="nav-icon fa fa-bolt"></i>
		          			<p>
		          				Epps
		          			</p>
		          		</router-link>
		          	</li>
		          	<li class="nav-item">
		          		<router-link class="nav-link" :to="'/curso'" >
		          			<i class="nav-icon fa fa-book"></i>
		          			<p>
		          				Cursos
		          			</p>
		          		</router-link>
		          	</li>
		          </ul>
	      	</nav>
	  	</div>

		</aside>
</template>

<script>
export default {
	props: [
		'ruta'
	]
};
</script>
