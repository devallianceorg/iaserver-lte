// Headers por defecto para AXIOS
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
var csrf = document.head.querySelector('meta[name="csrf-token"]');

if (csrf) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = csrf.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

var apiIngress = document.head.querySelector('meta[name="api-ingress"]');
var apiToken = document.head.querySelector('meta[name="api-token"]');
Vue.prototype.$apiIngress = apiIngress.content;
Vue.prototype.$apiToken = apiToken.content;
window.axios.defaults.headers.common['Authorization'] = `Bearer ${apiToken.content}`;
