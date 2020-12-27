import Vue from "vue";
import VueRouter from "vue-router";
import store from "../store/store";
//register components
import Home from "../layouts/Home";
import Login from "../components/auth_components/Login";
import Register from "../components/auth_components/Register";


Vue.use(VueRouter);

const routes = [
  {
    name: "Home",
    path: "/",
    component: Home,
  },
  {
    name: "login",
    path: "/login",
    component: Login,
    beforeEnter: (to, from, next) => {
      setTimeout( () => {
        if (store.getters['auth/check']) {
          console.log('参照できるよ');
          next('/')
        } else {
          console.log('参照できていないよ');
          next()
        }
      }, 3000)
    }
    // beforeEnter (to, from, next) {
    //   if (store.getters['auth/check']) {
    //     next('/')
    //   } else {
    //     next()
    //   }
    // }
  },
  {
    name: "register",
    path: "/register",
    component: Register,
  }
];

const router = new VueRouter({
  mode: "history",
  routes
});

export default router;
