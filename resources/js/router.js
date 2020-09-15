import Vue from "vue";
import Router from "vue-router";
import Home from "./components/page/Home";
import Quiz from "./components/page/Quiz";
import Login from "./components/page/Login";
import Register from "./components/page/Register";
import Mypage from "./components/page/Mypage";
import Keyword from "./components/page/Keyword";

Vue.use(Router);

export default new Router({
    mode: "history", // SPAのURLにはhistoryモード(#ハッシュが付かないタイプを使う)
    // base: process.env.BASE_URL,
    // scrollBehavior(to, from, savedPosition) {
    //     if (savedPosition) {
    //         return savedPosition;
    //     } else {
    //         return { x: 0, y: 0 };
    //     }
    // },
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
        },
        {
            path: "/mypage",
            name: "mypage",
            component: Mypage
        },
        {
            path: "/keyword",
            name: "keyword",
            component: Keyword
        }
    ]
});
