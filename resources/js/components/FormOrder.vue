<script>
	export default {
		data() {
			return {
				success: false,
				error: false,
				name: '',
				phone: '',
				email: '',
				comment: ''
			}
		},

		setup() {
			async function send(link) {
				const response = await this.axios.post(link, {
						name: this.name,
						email: this.email,
						phone: this.phone,
						comment: this.comment
				});
				if(response.data.success) {
					this.success = true;
				} else {
					this.error = true;
				}
			}

			return {
				send
			}
		}
	}

</script>
