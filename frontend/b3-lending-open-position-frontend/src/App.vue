<template>
  <Header />
  <Container />
</template>

<script>
import { defineComponent } from 'vue';
import Header from './components/Header.vue';
import Container from './components/Container.vue';

export default defineComponent({
  name: 'App',
  components: {
    Header,
    Container,
  }
});
</script>

<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  background-color: #1d2632;
  font-family: Nunito, sans-serif;
  color: white;
  font-weight: 400;

}

</style>
