<template>
    <div>
        <h1>こんにちはVueです</h1>
        <TheChat></TheChat>
        <Test></Test>
    </div>
</template>

<script>
import TheChat from './components/TheChat';
import Test from './components/Test';


    export default {
        components: {
            TheChat,
            Test
        }
    }
</script>