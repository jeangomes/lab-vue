import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Books from '@/components/Books'
import NewBook from '@/components/NewBook'
import BookDetail from '@/components/BookDetail'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/book',
      component: Books,
      children: [
        {path: 'detail/:id', component: BookDetail, props: true}
      ]
    },
    {
      path: '/book/new',
      component: NewBook
    }
    // },
    // {
    //   path: '/book/detail/:id',
    //   component: BookDetail,
    //   props: true
    // }
  ]
})
