<!DOCTYPE html>
<html>
<head>
	<title>Vue To Do</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree" rel="stylesheet">  
</head>
<body>
	<div id="app">
		<div class="container">
			<h1 class="title">Vue Todo List</h1>
				<input type="text" v-model="newTodo" class="form-control col-md-4 offset-md-4 form" @keyup.enter="addTodo" placeholder="Enter your todo">
			<ul>
				<p v-if="!todos.length" class="col-md-4 offset-md-4 notodo"> No ToDo</p>
				<li v-for="(todo, index) in todos">
					<span :class="{'completed': (typeof todo.done === 'string') ? parseInt(todo.done) : todo.done }">{{ todo.text }}<span> &nbsp;
					<button class="btn btn-danger btn-sm" @click="removeTodo(index, todo.id_date)">X</button>
					<button class="btn btn-success btn-sm" @click="toggleClick(todo, todo.id_date)">Done</button>
				</li>
			</ul>
		</div>
	</div>
<script type="text/javascript" src="vue.js"></script>
<script type="text/javascript" src="vue-resource.min.js"></script>
<script type="text/javascript" src="app.js"></script>
</body>
</html>