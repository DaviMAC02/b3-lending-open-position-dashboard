<template>
    <div class="container">
        <div class="titulo">
            <h1>Posições em aberto de empréstimos ativos</h1>
        </div>
        <SearchBar v-on:buscar = "buscar"/>
        <ResutltSectionBalance  v-if="!this.asset_data_empty" :asset_data_date = "this.asset_data_date" :asset_data_bal_qty="this.asset_data_bal_qty"/>
        <ResutltSectionPriceAVG v-if="!this.asset_data_empty" :asset_data_date = "this.asset_data_date" :asset_data_tradingAVG="this.asset_data_tradingAVG" />
        <AssetInfoTable v-if="!this.asset_data_empty" :asset_data_date = "this.asset_data_date" :asset_data_tradingAVG="this.asset_data_tradingAVG" :asset_data_bal_qty="this.asset_data_bal_qty" />
        <Disclaimer />
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import SearchBar from './SearchBar.vue';
import ResutltSectionPriceAVG from './ResultSectionPriceAvg.vue';
import ResutltSectionBalance from './ResultSectionBalance.vue';
import AssetInfoTable from './AssetInfoTable.vue';
import Disclaimer from './Disclaimer.vue';

export default defineComponent({
  name: 'Container',
  props: {

  },

  data() {
    return {
      asset_data_date: [],
      asset_data_bal_qty: [],
      asset_data_tradingAVG: [],
      asset_data_empty: true
    }
  },

  methods: {
    buscar(asset_data) {
          this.asset_data_empty = true;
          setTimeout(() => {
          asset_data = JSON.parse(JSON.stringify(asset_data))
          this.asset_data_date = asset_data.map((item) => item.date);
          this.asset_data_bal_qty = asset_data.map((item) => item.BalQty);
          this.asset_data_tradingAVG = asset_data.map((item) => item.TradAvrgPric.replace(',','.'));
          this.asset_data_empty = false;
        }, 200);

      }
  },

  components: {
    SearchBar,
    ResutltSectionBalance,
    ResutltSectionPriceAVG,
    AssetInfoTable,
    Disclaimer
},

  emits: ['buscar']
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