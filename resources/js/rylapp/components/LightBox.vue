<template>
	<div></div>
</template>

<script>
export default {
	props: {
		thumbnail: {
			type: String,
			required: true,
		},
		images: {
			type: Array,
			required: true,
		},
	},
	data: () => ({
		visible: false,
		index: 0,
	}),
	methods: {
		show() {
			this.visible = true
		},
		hide() {
			this.visible = false
			this.index = 0
		},
		hasNext() {
			return this.index + 1 < this.images.length
		},
		hasPrev() {
			return this.index - 1 >= 0
		},
		next() {
			if (this.hasNext()) {
				this.index += 1
			}
		},
		next() {
			if (this.hasPrev()) {
				this.index -= 1
			}
		},
	},
}
</script>

<style>
</style>