import App from './App.svelte';

const app = new App({
	target: document.body,
	props: {
		msg: 'Main Prop'
	}
});

export default app;