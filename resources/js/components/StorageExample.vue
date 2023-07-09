<template>
    <div id="app">
        <div id="menu">
            <button @click="first">Первая</button>
            <input type="text" v-model="index">
            <button @click="go">Перейти</button>
            <button @click="last">Последняя</button>
        </div>
        <div id="content">
            <div v-for="(string, i) in strings" :key="i" :id="'item-' + i" class="item">{{ string }}</div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            strings: [],
            index: '',
        };
    },
    methods: {
        async init() {
            await new Promise((resolve) => setTimeout(resolve, 1000));
            for (let i = 0; i < 500; i++) {
                this.strings.push(this.randomString());
            }
            await new Promise((resolve) => setTimeout(resolve, 1000));
        },
        randomString() {
            let length = Math.floor(Math.random() * 6) + 5;
            let chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let result = '';
            for (let i = 0; i < length; i++) {
                result += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            return result;
        },
        scrollTo(index) {
            let element = document.getElementById('item-' + index);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        },
        first() {
            this.scrollTo(0);
        },
        last() {
            this.scrollTo(this.strings.length - 1);
        },
        go() {
            this.scrollTo(this.index);
        },
    },
    async mounted() {
        await this.init();
    },
};
</script>

<style scoped>
/* CSS code */
* {
    box-sizing: border-box;
}

#app {
    max-width: 900px;
    min-height: 100vh;
    margin: auto;
}

#menu {
    display: flex;
}

#menu>* {
    margin: 10px;
}

#menu input {
    flex-grow: 1;
}

@media (max-width: 575px) {
    #menu {
        flex-direction: column;
    }

    #menu input {
        width: auto;
    }
}
</style>
