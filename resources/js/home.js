import Vue from "vue";
import App from "./components/page/Home";
import SocialSharing from "vue-social-sharing";

Vue.use(SocialSharing);

new Vue({
  el: "app", // 「el」はアプリケーションを紐付ける要素のセレクタ
  components: {
    app: App, //使用するコンポーネントの名称と使うコンポーネントを指定する（app:名称, App(./components/HelloWorld)使うコンポーネント）を指定する
  },
});
