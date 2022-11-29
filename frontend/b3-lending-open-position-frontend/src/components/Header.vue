<template>
    <header>  
        <a href="/">
            <img src="@/assets/logo.png" alt="logo" />
        </a>
    </header>
</template>

<script>
    import { defineComponent } from 'vue';


    export default defineComponent({
        name: 'Header',
        props: {
            title: {
                type: String,
                required: true
            }
        },
        components: {
            
        }
    });
</script>

<style scoped>
    header{
        background-color: rgb(29,38,50);
        margin: 0 auto;
        padding: 10px 20px;
        width: 100%;
        height: 64px;
        border-bottom: 1px solid rgb(40, 53, 67);
        display: flex;
        align-items: left;
    }
    
    img {
        width: 176px;
        height: 39px;
        margin: 0 auto;
        display: block;
    }
</style>