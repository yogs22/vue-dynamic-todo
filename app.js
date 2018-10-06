new Vue({
	el: '#app',
	data: {
		newTodo: '',
		todos: [],
		done: false
	},
	methods: {
		addTodo: function() {
			var newItem = this.newTodo.trim();
			if (newItem) {
				this.todos.push({ text: newItem, done: false })
				this.newTodo = '';
				localStorage.setItem('lists', JSON.stringify(this.todos))
			}

			this.$http.post('API/index.php', { text: newItem, done: false, id_date: Date.now() }).then(response => {
				console.log(response)
			}, response => {
				console.log('error')
			})
		},
		removeTodo: function(index, id_date) {
			this.todos.splice(index, 1)
			this.$http.delete('API/index.php?id=' + id_date).then(response => {
				console.log(response)
			}, response => {
				console.log('error')
			})
		},
		toggleClick: function(todo, id_date) {
			( todo.done == 0 ) ? todo.done = false : true
			todo.done =! todo.done
			this.$http.put('API/index.php?id=' + id_date + '&done=' + todo.done).then(response => {
				console.log(response)
			}, response => {
				console.log('error')
			})
		}
	},
	created: function() {
		this.$http.get('API/index.php').then(response => {
			this.todos = response.data
		}, response => {
			console.log('error')
		})
	}
});

Vue.http.options.emulateJSON = true;