<template>
  <div id="app" class="container">
    <!--<img src="./assets/logo.png">-->
    <ul class="nav nav-pills">
      <li class="nav-item">
        <router-link class="nav-link" to="/"  active-class="active" exact><a>Home</a></router-link>
      </li>
      <li class="nav-item">
        <router-link class="nav-link" to="/book" active-class="active"><a>Livros</a></router-link>
      </li>
    </ul>
    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
