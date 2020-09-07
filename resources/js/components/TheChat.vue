<template>
      
    <b-container>
        <b-row>
            <b-col>
                <transition-group name="chat" tag="div" class="list content">
                    <section v-for="( message, index ) in chatMessages" :key="message" class="item">
                      <b-avatar variant="success" class="item-image"></b-avatar>
                      <div class="item-detail">
                       <div class="item-name">{{ message.user.name }}</div>
                        <div class="item-message">
                          <nl2br tag="div" :text="message.body"/>
                        </div>
                      </div>
                    </section>
                </transition-group>
            </b-col>
        </b-row>
        <b-form-textarea
            v-model="postMessage"
            id="textarea-default"
            placeholder="メッセージを入力してください"
        ></b-form-textarea>
        <b-button　pill variant="success" @click="sendMessage">送信</b-button>
    </b-container>
</template>

<script>
import axios from 'axios';
import Nl2br from 'vue-nl2br';

export default {
    components: { Nl2br },
    data() {
        return {
            //laravel側からはメッサージのデータを渡しているので、変数massageは各カラムデータあり。
            chatMessages: [],
            postMessage: ''
        }
    },
    //elmentにmount後にlaravel側のデータをフックして取得
    mounted() {
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
    computed: {
        textExists() {
            return this.chatMessages.length > 0;
        }
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
