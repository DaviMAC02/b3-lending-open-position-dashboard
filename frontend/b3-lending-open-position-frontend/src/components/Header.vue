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
        background-color: #1d2632;
        margin: 0 auto;
        padding: 10px 20px;
        width: 100%;
        height: 64px;
        border-bottom: 1px solid #2a3544;
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