<template>
    <div class="search-bar">
        <form action="#" type="submit" v-on:submit.prevent="buscar">
            <label>Ativo:</label>
                <select name="asset_selector" id="asset_selector">
                    <option v-for="option in options">
                        {{ option }}
                    </option>
                </select>

            <label>Data Inicial:</label>
                <input type="date" name="inicial_date" id="inicial_date" />
                <label>Data Final:</label>
                <input type="date" name="final_date" id="final_date" />
            <button>Buscar</button>
        </form>
    </div>
</template>

<script>
    import { defineComponent } from 'vue';

    export default defineComponent({
        name: 'SearchBar',
        props: {
            options: {
                type: Array,
                required: false
            }
        },

        methods: {
            async getAssets() {
                const response = await fetch('http://127.0.0.1:8000/api/getAsset/all');
                const data = await response.json();
                this.options = data;
            },

           async buscar(submitEvent) {

                const response = await fetch('http://127.0.0.1:8000/api/getAsset/' + submitEvent.target.asset_selector.value + '/' + submitEvent.target.inicial_date.value + '/' + submitEvent.target.final_date.value);
                const data = await response.json();
                this.asset_data = data;
                this.$emit('buscar', this.asset_data);
            }
        },

        created() {
            this.getAssets();
        },

        data(){       
            return{
                options: [],
                asset_data: []
            }
        },

        components: {
            
        }
    });
</script>

<style scoped>
    .search-bar{
        width: 100%;
        height: 10%;
        margin: 40px auto;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
    }

    form select, input{
        width: 120px;
        height: 40px;
        margin: 0 10px;
        border: 1px solid #002c62;
        border-radius: 5px;
    }

    button{
        width: 100px;
        height: 40px;
        margin: 0 10px;
        border: 1px solid #002c62;
        border-radius: 5px;
        background-color: #002c62;
        color: #fff;
    }

    button:hover{
        background-color: #002c62;
        cursor: pointer;
    }
</style>