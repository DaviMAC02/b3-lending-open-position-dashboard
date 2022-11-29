<template>
    <div class="container">
        <div class="titulo">
            <h1>Posições em aberto de empréstimos ativos</h1>
        </div>
        <SearchBar />
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import SearchBar from './SearchBar.vue';

export default defineComponent({
  name: 'Container',
  props: {

  },
  components: {
    SearchBar
  }
});
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');
    .container{
        position: absolute;
        width: 100%;
        height: 100%;
        margin: 0 auto;
        padding: 3% 3%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .titulo{
        font-size: 22px;
        width: 60%;
        text-align: center;
    }
</style>