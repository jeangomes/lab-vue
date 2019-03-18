<template>
  <div class="well">
    <h1>Book Manager</h1>
    <ul class="nav nav-pills">
      <router-link to="/book/new" class="nav-item" tag="li" active-class="active">
        <a class="nav-link">Add Livro</a>
      </router-link>
    </ul>
    <hr>
    <div class="row">
      <div class="col-lg-6">
        <ul class="list-group">
          <li class="list-group-item list-group-item-action" v-for="book in books" :key="book.id">
            <router-link :to="'/book/detail/' + book.id">{{book.titulo}}</router-link>
          </li>
        </ul>
      </div>
      <div class="col-lg-6">
        <router-view/>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Books',
  data () {
    return {
      books: []
    }
  },
  created () {
    // fetch the data when the view is created and the data is
    // already being observed
    this.fetchBooks()
  },
  methods: {
    fetchBooks: function () {
      const baseURI = 'livro'
      this.$http.get(baseURI)
        .then((result) => {
          this.books = result.data
        })
    }
  }
}
</script>

<style scoped>

</style>
