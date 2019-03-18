<template>
  <div>
    <div class="page-header">
      <h1>Livro Details</h1>
    </div>
    <p>Titulo: {{ book.titulo }}</p>
    <p>Pages: {{ book.ndepagina }}</p>
    <p>Author: {{ book.autor }}</p>
    <img v-if="book.cover" :src="'http://0.0.0.0:8082/upload/livros/'+book.cover">
  </div>
</template>

<script>
export default {
  name: 'BookDetail',
  props: ['id'],
  data () {
    return {
      book: {}
    }
  },
  watch: {
    '$route.params.id': function (id) {
      this.fetchBook()
    }
  },
  created () {
    // fetch the data when the view is created and the data is
    // already being observed
    this.fetchBook()
  },
  methods: {
    fetchBook: function () {
      let baseURI = 'livro/' + this.id
      this.$http.get(baseURI)
        .then((result) => {
          this.book = result.data
        })

      // this.$http.post('autor', {
      //   nome: 'Denilson',
      //   nacionalidade: 'Francesa',
      //   sexo: 'M'
      // })
      //   .then(function (response) {
      //     console.log(response)
      //   })
      //   .catch(function (error) {
      //     console.log(error)
      //   })
    }
  }
}
</script>

<style scoped>

</style>
