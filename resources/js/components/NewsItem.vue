<script>
	export default {
		data() {
			return {
				success: false,
				id: null,
			}
		},

		setup() {
			async function send(id, elem) {
        const response = await this.axios.delete(`/admin/news/${id}`, {}, {
	        headers: {
		        'X-CSRF-TOKEN': window.csrf_token
	        }
        });

        if(response.data.success) {
	        elem.closest('tr').classList.add('hidden');
					this.success = true;
				}
			}

			return {
				send
			}
		}
	}

</script>

<style>
    table tr.hidden {
        display: none;
    }
</style>
