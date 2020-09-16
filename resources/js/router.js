import Vue from "vue";
import Router from "vue-router";
import Home from "./components/page/Home";
import Quiz from "./components/page/Quiz";
import Login from "./components/page/Login";
import Register from "./components/page/Register";
import Mypage from "./components/page/Mypage";
import Keyword from "./components/page/Keyword";

Vue.use(Router);

const router = new Router({
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
        },
        {
            path: "/mypage",
            name: "mypage",
            component: Mypage,
            // 認証が必要になる設定
            meta: {
                requiresAuth: true
            }
        },
        {
            path: "/keyword",
            name: "keyword",
            component: Keyword
        }
    ]
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(rec => rec.meta.requiresAuth)) {
        router.app.$http // axiosのこと
            .get("/api/user")
            .then(response => {
                const user = response.data;
                if (user) {
                    next();
                } else {
                    next({
                        path: "/login"
                    });
                }
            })
            .catch(error => {
                if (error.response.status === 401) {
                    alert(
                        "未認証のユーザーのためログイン画面でログインを行ってください"
                    );
                } else {
                    alert(
                        "予期しないエラーが発生しました。再度ログインを行ってください"
                    );
                }
                next({
                    path: "/login"
                });
            });
    } else {
        next();
    }
});
export default router;
