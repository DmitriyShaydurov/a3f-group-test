import StringStorage from '../../classes/StringStorage';

export default {
    data() {
        return {
            storage: new StringStorage(),
            index: '',
        };
    },
    computed: {
        strings() {
            return this.storage.get();
        },
    },
    methods: {
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
        await this.storage.init();
    },
};
