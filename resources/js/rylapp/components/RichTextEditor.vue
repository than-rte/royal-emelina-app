<template>
	<div>
		<ckeditor :editor="editor" v-model="content" :config="editorConfig" />
	</div>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic"
export default {
	data: () => ({
		props: {
			content: String,
		},
	}),
}
</script>

<style>
</style>