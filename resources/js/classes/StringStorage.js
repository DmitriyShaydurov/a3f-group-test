export default class StringStorage {

    constructor() {
        this.strings = [];
    }

    async init() {
        await new Promise((resolve) => setTimeout(resolve, 1000));
        for (let i = 0; i < 500; i++) {
            this.strings.push(this.randomString());
        }
        await new Promise((resolve) => setTimeout(resolve, 1000));
    }

    get() {
        return this.strings;
    }

    randomString() {
        let length = Math.floor(Math.random() * 6) + 5;
        let chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let result = '';
        for (let i = 0; i < length; i++) {
            result += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return result;
    }
}
