
var app = new Vue({
    el: '#app',
    data: {
        title: 'Olá Jean Gomes: ' + 8 * 8,
        message: 'Hello Vue!'
    },
    methods: {
        changeTitle: function (event) {
            this.title = event.target.value;
            console.log(this.title);
        }
    }
});

var app2 = new Vue({
    el: '#app-2',
    data: {
        message: 'You loaded this page on ' + new Date().toLocaleString()
    }
});

var app3 = new Vue({
    el: '#app-3',
    data: {
        seen: true
    }
});

var app4 = new Vue({
    el: '#app-4',
    data: {
        todos: [
            {text: 'Learn JavaScript'},
            {text: 'Learn Vue'},
            {text: 'Build something awesome'}
        ]
    }
});

var app5 = new Vue({
    el: '#app-5',
    data: {
        message: 'Jean Gomes Pereira'
    },
    methods: {
        reverseMessage: function () {
            this.message = this.message.split('').reverse().join('');
        }
    }
});

var app6 = new Vue({
    el: '#app-6',
    data: {
        message: 'Hello Vue!'
    }
});

Vue.component('todo-item', {
  props: ['todo'],
  template: '<li>Juca - {{ todo.text }}</li>'
});

var app7 = new Vue({
  el: '#app-7',
  data: {
    groceryList: [
      { id: 0, text: 'Vegetables' },
      { id: 1, text: 'Cheese' },
      { id: 2, text: 'Whatever else humans are supposed to eat' },
      { id: 3, text: 'Denilson' }
    ]
  }
});
