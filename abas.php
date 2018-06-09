<html>
<head>
    <title></title>
</head>
<body>
<div id="root">
    <button @click="dis" :disabled="disabled">{{ btnText }}</button>
</div>
<script src="https://unpkg.com/vue"></script>
<script>
    var app = new Vue({
        el: '#root',
        data: {
            btnText: 'Disable Me',
            disabled: false
        },
        methods: {
            dis: function() {
                this.btnText = "Disabled";
                this.disabled = true;
            }
        }
    })
</script>
</body>
</html>