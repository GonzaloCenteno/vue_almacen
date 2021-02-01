<template>
	<div>
		
		<Navbar :ruta="ruta"></Navbar>
		
		<Sidebar :ruta="ruta"></Sidebar>

		<div class="content-wrapper">
			<transition name="slide-fade" mode="out-in">
				<router-view></router-view>
			</transition>
		</div>
		
		<Footer></Footer>

		<aside class="control-sidebar control-sidebar-dark">

		</aside>

	</div>
</template>

<script>
	import Navbar from './plantilla/Navbar';
	import Sidebar from './plantilla/Sidebar';
	import Content from './plantilla/Content';
	import Footer from './plantilla/Footer';

	export default {
		components : {
			Navbar,
			Sidebar,
			Content,
			Footer
		},
		props: [
			'ruta'
		]
	};
</script>
