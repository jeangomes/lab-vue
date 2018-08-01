<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lab Vue 2</title>

    <link rel="stylesheet" href="assets/bootstrap.css">
</head>
<body>
<div class="container" id="tasks">
    <input
            class="form-control"
            v-model="newTodoText"
            v-on:keyup.enter="addNewTodo"
            placeholder="Add a todo"
    >
    <hr>
    {{todos.length}}
    <message v-for="(todo, index) in todos.data"
             v-bind:title="todo.nome"
             v-bind:key="todo.id" v-on:remove="todos.data.splice(index, 1)"
             v-bind:body="todo.email"></message>

</div>
<script src="assets/vue.js"></script>
<script src="assets/axios.min.js"></script>
<script src="assets/vue-router.js"></script>
<script>
    Vue.component('message', {
        props: ['title', 'body'],
        data() {
            return {
                isVisible: true
            };
        },
        template: `<div class="panel panel-default">
        <div class="panel-heading">
        <p class="panel-title">{{title}}</p>
        <button class="btn btn-warning delete" @click="$emit('remove')" aria-label="delete">x</button>
        </div>
        <div class="panel-body">
        {{body}}
        </div>
    </div>`
    });

/*    new Vue({
        el: '#app',
        data () {
            return {
                info: null
            }
        },

    })*/

    var app = new Vue({
        el: '#tasks',
        data: {
            newTodoText: '',
            todos: [],
            nextTodoId: 5
        },
        mounted () {
            axios
                .get('http://localhost:8080/api/usuario')
                .then(response => (this.todos = response))
        },
        methods: {
            addNewTodo: function () {
                this.todos.data.push({
                    id: this.nextTodoId++,
                    nome: this.newTodoText
                })
                this.newTodoText = ''
            }
        }
    })
</script>
</body>
</html>