<template>
    <div class="search-bar">
        <form action="#">
            <label for="lang">Ativo</label>
                <select name="languages" id="lang">
                    <option v-for="option in options">
                        {{ option }}
                    </option>
                </select>
</form>
    </div>
</template>

<script>
    import { defineComponent } from 'vue';

    export default defineComponent({
        name: 'SearchBar',
        props: {
            
        },
        data(){       
            return{
                options: ['teste', 'teste2', 'teste3']
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
</style>