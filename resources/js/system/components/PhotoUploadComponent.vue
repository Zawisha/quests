<template>
	<div class="cell small-12">
		<label>Фотография
			<input
				name="photo"
				type="file"
			    @change="onChange"
			>
		</label>
		<div class="text-center wrap-photo">
			<img
				:src="path">
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			item: {
				type: Object,
                default() {
                    return {
                        photo_path: null,
                    }
                }
			},
		},
        data(){
            return {
                imageSrc: null,
            }
        },
		computed: {
			path() {
				if (this.item.photo_path) {
                    return this.item.photo_path;
                } else {
				    return this.imageSrc
                }
			}
		},
		methods: {
			onChange (event) {
				const input = event.target;
				// console.log(input);

				if (input.files && input.files[0]) {
					const reader = new FileReader();
					const vm = this;
					// console.log(this);

					reader.onload = function(e) {
						vm.imageSrc = e.target.result;

					};

					reader.readAsDataURL(input.files[0]);
				}
			}
		}
	}
</script>
