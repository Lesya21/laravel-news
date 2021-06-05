<script>
	export default {
		data() {
			return {
				success: false,
				name: '',
				comment: ''
			}
		},

		setup() {
			async function send(link) {
				const response = await this.axios.post(link, {name: this.name, comment: this.comment});
				if(response.data.success) {
					this.success = true;
				}
			}

			return {
				send
			}
		}
	}

</script>
