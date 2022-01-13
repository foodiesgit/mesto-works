<template>
	<div class="container" style="height: 100vh; width: 100vw;"></div>
</template>
<script>

import PSPDFKit from 'pspdfkit';

// Use the public directory URL as a base URL. PSPDFKit will download its library assets from here.
const baseUrl = `${window.location.protocol}//${window.location.host}/`;

/**
 * PSPDFKit for Web example component
 */
export default {
	/**
	 * The component receives these parameters:
	 * @documentUrl: string — URL of the document to be loaded.
	 * @baseUrl: string — URL from which the PSPDFKit library should get its payload and artifacts
	 */
	props: ["documentUrl"],
	_instance: null,
	/**
	* We wait until the template has been rendered to load the document into the library.
	*/
	mounted: function mounted() {
		this.load();
	},
	/**
	 * Our component has these two methods — one to trigger document loading, and the other to unload and clean up
	 * so the component is ready to load another document.
	 */
	methods: {
		load: function load() { 
			
				PSPDFKit.load({
					baseUrl: baseUrl,
					document: '/bos_pdf.pdf',//this.documentUrl,
					container: ".container"
				}).then((instance) => {
					instance.addEventListener("annotations.create", (annotations) => {   
						console.log("annotations created:", annotations.toJS());
						// Save changes when new annotations are created.
						instance.save();
					});
				});
		},
		unload: function unload() {
				if (this._instance) {
					PSPDFKit.unload(this._instance || ".container");
					this._instance = null;
				}
		}
	},
	/**
	 * We watch for `documentUrl` prop changes and trigger unloading and loading when there's a new document to load.
	 */
	watch: {
		documentUrl: function documentUrl() {
				this.unload();
				this.load();
		}
	},
	/**
	 * Clean up when the component is unmounted (not needed in this example).
	 */
	beforeDestroy: function beforeDestroy() {
		this.unload();
	}
}
</script>
