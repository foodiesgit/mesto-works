import App from './App.svelte';

const app = new App({
	target: document.body,
	props: {
		name: 'Svelte Js Binding'
	}
});

export default app;