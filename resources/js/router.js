import Vue from "vue";
import Router from "vue-router";
import Home from "./components/page/Home";
import Quiz from "./components/page/Quiz";
import Login from "./components/page/Login";
import Register from "./components/page/Register";

Vue.use(Router);

export default new Router({
    mode: "history", // SPAのURLにはhistoryモード(#ハッシュが付かないタイプを使う)
    routes: [
        {
            path: "/",
            name: "home",
            component: Home // URL「/」に対してHomeコンポーネントを使うという意味
        },
        {
            path: "/quiz",
            name: "quiz",
            component: Quiz
        },
        {
            path: "/login",
            name: "login",
            component: Login
        },
        {
            path: "/register",
            name: "register",
            component: Register
        }
    ]
});
