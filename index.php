<!DOCTYPE html>
<html>
<head>
	<title>Vue To Do</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree" rel="stylesheet">  
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
	<div id="app">
		<div class="container">
			<h1 class="title">Vue Todo List</h1>
				<input type="text" v-model="newTodo" class="form-control col-md-4 offset-md-4 form" @keyup.enter="addTodo" placeholder="Enter your todo">
			<ul>
				<p v-if="!todos.length" class="col-md-4 offset-md-4 notodo"><i class="fas fa-info-circle"></i> No ToDo</p>
				<li v-for="(todo, index) in todos">
					<i class="fas fa-arrow-right"></i>&nbsp;<span :class="{'completed': (typeof todo.done === 'string') ? parseInt(todo.done) : todo.done }" > {{ todo.text }}&nbsp;<span> 
					<button class="btn btn-danger btn-sm delete" @click="removeTodo(index, todo.id_date)"><i class="fas fa-trash"></i> Delete</button>
					<button class="btn btn-success btn-sm done" @click="toggleClick(todo, todo.id_date)"><i class="fas fa-check"></i> Done</button>
				</li>
			</ul>
		</div>
	</div>
<script type="text/javascript" src="vue.js"></script>
<script type="text/javascript" src="vue-resource.min.js"></script>
<script type="text/javascript" src="app.js"></script>
</body>
</html>