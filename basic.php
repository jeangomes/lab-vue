<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lab Vue</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="assets/bootstrap.css">
    <!-- Styles -->
</head>
<body>
<!--<div class="flex-center position-ref full-height container"  id="example-2">

    <div class="content">
        <div class="title m-b-md">
            <ul class="list-group">
                <li class="list-group-item"  v-for="(item, index) in items">
                    {{ parentMessage }} - {{ index }} - {{ item.message }}
                </li>
                <li class="list-group-item" v-for="n in even(numbers)">{{ n }}</li>
            </ul>
        </div>

        <hr>
    </div>
</div>-->
<div id="components-demo">

    <button class="btn btn-primary" @click="dis" :disabled="disabled">{{ btnText }}</button>

    <div :style="{ fontSize: postFontSize + 'em' }">
        <blog-post
                v-for="post in posts"
                v-bind:key="post.id"
                v-bind:post="post"
                v-on:enlarge-text="onEnlargeText"
        ></blog-post>
    </div>
</div>
<div id="dynamic-component-demo" class="demo">
    <button
            v-for="tab in tabs"
            v-bind:key="tab"
            v-bind:class="['tab-button', { active: currentTab === tab }]"
            v-on:click="currentTab = tab"
    >{{ tab }}</button>

    <component
            v-bind:is="currentTabComponent"
            class="tab"
    ></component>
</div>
<script src="assets/vue.js"></script>
<script type="text/javascript">

    Vue.component('blog-post', {
        props: ['post'],
        template: '<div class="blog-post">' +
        '<h3>- {{ post.title }}</h3> <button v-on:click="$emit(\'enlarge-text\',0.2)">Enlarge text</button> ' +
        '<p v-html="post.content"></p></div>'
    });

    Vue.component('tab-home', {
        template: '<div>Home component</div>'
    })
    Vue.component('tab-posts', {
        template: '<div>Posts component</div>'
    })
    Vue.component('tab-archive', {
        template: '<div>Archive component</div>'
    })

    new Vue({
        el: '#dynamic-component-demo',
        data: {
            currentTab: 'Home',
            tabs: ['Home', 'Posts', 'Archive']
        },
        computed: {
            currentTabComponent: function () {
                return 'tab-' + this.currentTab.toLowerCase()
            }
        }
    })

    new Vue({
        el: '#components-demo',
        data: {
            btnText: 'Disable Me',
            disabled: false,
            posts: [
                {id: 1, title: 'My journey with Vue', content: 'Oi lalalalalala'},
                {id: 2, title: 'Blogging with Vue', content: 'fdsfsdf'},
                {id: 3, title: 'Why Vue is so fun', content: 'porpere'}
            ],
            postFontSize: 1
        },
        methods: {
            onEnlargeText: function (enlargeAmount) {
                this.postFontSize += enlargeAmount
            },
            dis: function() {
                this.btnText = "Disabled";
                this.disabled = true;
            }
        }
    });


    /*    var example2 = new Vue({
            el: '#example-2',
            data: {
                numbers: [1, 2, 3, 4, 5,6],
                parentMessage: 'Parent',
                items: [
                    {message: 'Jesus'},
                    {message: 'Cleuci'},
                    {message: 'Natã'},
                    {message: 'Jean'},
                    {message: 'Daiane'}
                ]
            },
            methods: {
                even: function (numbers) {
                    return numbers.filter(function (number) {
                        return number % 2 === 0
                    })
                }
            }
        });*/

</script>
</body>
</html>
