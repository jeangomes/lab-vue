<html>
<head>
    <title>Computed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
</head>
<body>
<div class="container" id="tasks">
    <h2>All Tasks</h2>
    <ul>
        <li v-for="task in tasks">
            <input type="checkbox" v-model="task.completed"/>{{ task.description }}
        </li>
    </ul>
    <div class="content">
        <h2 class="title">Incomplete Tasks</h2>
        <ul>
            <li v-for="task in incompleteTasks" v-text="task.description"></li>
        </ul>
    </div>
    <div class="content">
        <h2 class="title">Complete Tasks</h2>
        <ul>
            <li v-for="task in completeTasks" v-text="task.description"></li>
        </ul>
    </div>
    <hr>
    <message title="Nome completo" body="Teste 123 do 567 lalaland"></message>

    <message title="Cantores" body="José e Fernando"></message>

    <div class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            Oiiiiiiiiiiiiiii
        </div>
        <button class="modal-close is-large" aria-label="close"></button>
    </div>
</div>
<script src="vue.js"></script>
<script>

    Vue.component('message', {
        props: ['title', 'body'],
        data(){
            return{
                isVisible:true
            };
        },
        template: `<article class="message" v-show="isVisible">
        <div class="message-header">
        <p>{{title}}</p>
        <button class="delete" @click="isVisible = false" aria-label="delete"></button>
        </div>
        <div class="message-body">
        {{body}}
        </div>
    </article>`
    });

    var app = new Vue({
        el: '#tasks',
        data: {
            tasks: [
                {description: 'Go to the store', completed: true},
                {description: 'Finish the screencast', completed: false},
                {description: 'Make donation', completed: false},
                {description: 'Clear inbox', completed: false},
                {description: 'Make dinner', completed: false},
                {description: 'Clean room', completed: true}
            ]
        },
        computed: {
            incompleteTasks() {
                return this.tasks.filter(task => !task.completed);
            },
            completeTasks() {
                return this.tasks.filter(task => task.completed);
            }
        }
    })
</script>
</body>
</html>