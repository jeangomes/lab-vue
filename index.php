<!DOCTYPE html>
<html>
    <head>
        <title>Vue</title>
        <script type="text/javascript" src="vue.js"></script>
    </head>
    <body>
        <div id="app">
            <input type="text" v-on:input="changeTitle">
            <p>{{title}} <br> Data: <?php echo date('d/m/Y H:i'); ?></p>
            {{ message }}
        </div>
        <hr>
        <div id="app-2">
            <span v-bind:title="message">
                Hover your mouse over me for a few seconds
                to see my dynamically bound title!
            </span>
        </div>
        <hr>
        <div id="app-3">
            <span v-if="seen">Now you see me</span>
        </div>
        <hr>
        <div id="app-4">
            <ol>
                <li v-for="todo in todos">
                    {{ todo.text }}
                </li>
            </ol>
        </div>
        <hr>
        <div id="app-5">
            <p>{{ message }}</p>
            <button @click="reverseMessage">Reverse Message</button>
        </div>
        <hr>
        <div id="app-6">
            <p>{{ message }}</p>
            <input v-model="message">
        </div>
        <hr>
        <div id="app-7">
            <ol>
                <!--
                  Now we provide each todo-item with the todo object
                  it's representing, so that its content can be dynamic.
                  We also need to provide each component with a "key",
                  which will be explained later.
                -->
                <todo-item
                    v-for="item in groceryList"
                    v-bind:todo="item"
                    v-bind:key="item.id">
                </todo-item>
            </ol>
        </div>

        <script type="text/javascript" src="app.js"></script>
    </body>
</html>