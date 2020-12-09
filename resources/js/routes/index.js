import Vue from "vue";
import VueRouter from "vue-router";
//register components
import Home from "../layouts/Home";
import Login from "../components/auth_components/Login";


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
  }
];

const router = new VueRouter({
  mode: "history",
  routes
});

export default router;
