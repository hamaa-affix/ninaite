import Vue from "vue";
import VueRouter from "vue-router";
import store from "../store/store";

// components
import Home from "../layouts/Home";
import Login from "../components/auth_components/Login";
import Register from "../components/auth_components/Register";
import System from "../components/error/System.vue";


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
  },
  {
    name: "register",
    path: "/register",
    component: Register,
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
  },
  {
    name: "System_error",
    path: "/500",
    component: System,

  }
];

const router = new VueRouter({
  mode: "history",
  routes
});

export default router;
