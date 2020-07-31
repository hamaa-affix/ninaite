<template>
    <div>
        <!--if文ロジックをしようしてAuthUserとfromUserで名前とmessageを分けたい。-->
        <div 
            v-for="message in chatMessages"
            :key='message.id'
        >
           <ul>
                <li>
                   <strong>{{ message.user.name }}</strong>
                   {{ message.body }}
                </li>
           </ul>
        </div>
        
        <textarea></textarea>
        <button>送信</button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            //laravel側からはメッサージのデータを渡しているので、変数massageは各カラムデータあり。
            chatMessages: [],
        }
    },
    //Vueインスタンス作成時にlaravel側のデータをフックして取得
    created() {
        this.getMessages();
     },
    methods: {
        getMessages() {
            axios.get('/api/chat_messages' )
            .then((res) => {
                this.chatMessages = res.data;
                console.log(res.data);
            });
        },
    }
}
</script>
