<template>
    <header>  
        <a href="/">
            <img src="@/assets/logo.svg" alt="logo" />
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
        background-color:white;
        margin: 0 auto;
        padding: 10px 20px;
        width: 100%;
        height: 64px;
        border-bottom: 1px solid #002c62;
        display: flex;
        align-items: left;
    }
    
    img {
        width: 52px;
        height: 30px;
        margin: 0 auto;
        display: block;
    }
</style>