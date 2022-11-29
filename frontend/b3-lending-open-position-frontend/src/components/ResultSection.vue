<template>
    <section v-for="asset in asset_data">
        {{asset}}
    </section>
</template>
<script>
import { defineComponent } from 'vue';
export default defineComponent({
  name: 'ResultSection',
  components: {
    
  },

  props: {
    asset_data: {
      type: Array,
      default: [],
      required: false
    }
  },

});
</script>

<style scoped>
    section{
        width: 100%;
        height: 100%;
    }
</style>