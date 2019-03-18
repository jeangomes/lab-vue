<template>
  <div>
    <h1>Cadastro de livro</h1>
    <form>
      <div class="form-check form-check-inline">
        <input class="form-check-input" v-model="book.version" type="checkbox" id="inlineCheckbox1" value="Física">
        <label class="form-check-label" for="inlineCheckbox1">Versão física</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" v-model="book.version" type="checkbox" id="inlineCheckbox2" value="Ebook">
        <label class="form-check-label" for="inlineCheckbox2">Ebook</label>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Título</label>
          <input type="text" v-model="book.title" class="form-control" id="inputEmail4" placeholder="Título">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Autor</label>
          <input type="text" v-model="book.author" class="form-control" id="inputPassword4" placeholder="Autor">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Data de compra</label>
          <input type="date" v-model="book.buy_date" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-4" hidden>
          <label for="inputState">State</label>
          <select id="inputState" class="form-control">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="inputZip">Valor</label>
          <input type="text" v-model="book.price" class="form-control" id="inputZip">
        </div>
      </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" v-model="book.read" type="checkbox" id="gridCheck">
          <label class="form-check-label" for="gridCheck">
            Já li
          </label>
        </div>
      </div>

      <button type="button" @click="postBook" class="btn btn-primary">Salvar</button>
      {{book}}
    </form>
  </div>
</template>

<script>
export default {
  name: 'NewBook',
  data () {
    return {
      book: {
        title: '',
        author: '',
        price: '',
        buy_date: '',
        read: false,
        version: []
      }
    }
  },
  methods: {
    postBook: function () {
      console.log(this.book)
      let baseURI = 'livro/create'
      this.$http.post(baseURI, this.book)
        .then((result) => {
          console.log(result.data)
          // this.book = result.data
        })
    }
  }
}
</script>

<style scoped>

</style>
