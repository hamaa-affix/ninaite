<template>
    <div>
        <!--if文ロジックをしようしてAuthUserとfromUserで名前とmessageを分けたい。-->
        <div 
            v-for="(message, index) in chatMessages"
            :key="index"
        >
           <ul>
                <li>
                   <strong>{{ message.user.name }}</strong>
                   {{ message.body }}
                </li>
           </ul>
        </div>
        <textarea v-model="postMessage"></textarea>
        <button @click="sendMessage">送信</button>
    </div>
</template>

<script>
import axios from 'axios';


export default {
    data() {
        return {
            //laravel側からはメッサージのデータを渡しているので、変数massageは各カラムデータあり。
            chatMessages: [],
            postMessage: ''
        }
    },
    //Vueインスタンス作成時にlaravel側のデータをフックして取得
    created() {
        this.getMessages();
        window.Echo.channel("ChatRoomChannel").listen("ChatPusher", (e) => {
            console.log('receved a message');
            console.log(e);
            this.chatMessages.push({
                body: e.message.body,
                user: e.user
            });
        });
        
     },
    methods: {
        getMessages() {
            axios.get('/api/chat_messages' )
            .then((res) => {
                this.chatMessages = res.data;
                console.log(res.data);
            });
        },
        sendMessage() {
            axios.post('/api/chat_messages', { message: this.postMessage })
            .then((res) => {
                this.postMessage = '';
                console.log(res);
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    }
}
</script>

