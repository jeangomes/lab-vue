<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lab Vue</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 34px;
        }
        .links > a {
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md" id="example-2">
            <ul class="list-group">
                <li class="list-group-item" v-if="false" v-for="(item, index) in items">
                    {{ parentMessage }} - {{ index }} - {{ item.message }}
                </li>
                <li class="list-group-item" v-for="n in even(numbers)">{{ n }}</li>
            </ul>
        </div>

        <div id="todo-list-example">
            <input
                class="form-control"
                v-model="newTodoText"
                v-on:keyup.enter="addNewTodo"
                placeholder="Add a todo"
            >
            <ul class="list-group">
                <li class="list-group-item"
                    is="todo-item"
                    v-for="(todo, index) in todos"
                    v-bind:key="todo.id"
                    v-bind:title="todo.title"
                    v-on:remove="todos.splice(index, 1)"
                ></li>
            </ul>
        </div>

        <div class="links" id="links">
            <simple-counter></simple-counter>
            <simple-counter></simple-counter>
            <simple-counter></simple-counter>

            <child my-message="go!"></child>
        </div>
    </div>
</div>
<script src="vue.js"></script>
<script type="text/javascript">
    var example2 = new Vue({
        el: '#example-2',
        data: {
            numbers: [1, 2, 3, 4, 5],
            parentMessage: 'Parent',
            items: [
                {message: 'Foo'},
                {message: 'Bar'}
            ]
        },
        methods: {
            even: function (numbers) {
                return numbers.filter(function (number) {
                    return number % 2 === 0
                })
            }
        }
    });
    Vue.component('todo-item', {
        template: '\
    <li>\
      {{ title }}\
      <button class="btn btn-danger" v-on:click="$emit(\'remove\')">X</button>\
    </li>\
  ',
        props: ['title']
    })
    new Vue({
        el: '#todo-list-example',
        data: {
            newTodoText: '',
            todos: [
                {
                    id: 1,
                    title: 'Do the dishes',
                },
                {
                    id: 2,
                    title: 'Take out the trash',
                },
                {
                    id: 3,
                    title: 'Mow the lawn'
                }
            ],
            nextTodoId: 4
        },
        methods: {
            addNewTodo: function () {
                this.todos.push({
                    id: this.nextTodoId++,
                    title: this.newTodoText
                })
                this.newTodoText = ''
            }
        }
    })
    /*
        var Child = {
            template: '<div>A custom component!</div>'
        }
        new Vue({
            el: '#example',
            components: {
                // <my-component> will only be available in parent's template
                'my-component': Child
            }
        })*/
    Vue.component('child', {
        // declare the props
        props: ['myMessage'],
        // like data, the prop can be used inside templates and
        // is also made available in the vm as this.message
        template: '<span>{{ myMessage }}</span>'
    })
    Vue.component('simple-counter', {
        template: '<button v-on:click="counter += 1">{{ counter }}</button>',
        // data is technically a function, so Vue won't
        // complain, but we return the same object
        // reference for each component instance
        data: function () {
            return {
                counter: 0
            }
        }
    })
    new Vue({
        el: '#links'
    })
</script>
</body>
</html>