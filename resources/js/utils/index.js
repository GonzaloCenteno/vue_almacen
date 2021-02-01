export default {
	methods: {
		MensajeCrear: function() {
			this.$toast.success("Se Creo el Registro con Exito", {
			  	timeout: 3000,
			});
		},
		MensajeEditar: function() {
			this.$toast.success("Se Modifico el Registro con Exito", {
				timeout: 3000,
			});
		}
	}
}