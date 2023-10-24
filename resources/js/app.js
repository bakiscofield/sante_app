import './bootstrap';

import {createApp} from 'vue'

import chatMessages from './components/ChatMessages.vue';
import ChatForm from './components/ChatForm.vue'
import IncrementCounter from './components/IncrementCounter.vue';

createApp({
    data() {
        return {
            messages: []
        }
      },
    created() {
        this.fetchMessages();
    },
    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },

        addMessage(message) {
            this.messages.push(message);
            // console.log(window.axios.defaults.headers.common['x-csrf-token']);
            // console.log(window.laravel.csrftoken);
            axios.post('/messages', message).then(response => {
                console.log(response.data);
            });

        }
     }
    })
    .component('incrementcounter', IncrementCounter)
    .component('chat-messages', chatMessages)
    .component('chat-form', ChatForm)
    .mount("#app")

Echo.private('chat')
  .listen('MessageSent', (e) => {
    this.messages.push({
      message: e.message.message,
      user: e.user
    });
});
