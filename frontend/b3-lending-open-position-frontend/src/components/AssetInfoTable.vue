<template>
    <table>
        <tr>
            <th>Data</th>
            <th>Quantidade</th>
            <th>Preço Médio</th>
            <th>Saldo Total (R$)</th>
        </tr>
        <tr v-for="(item, index) in asset_data_date" :key="index">
            <td v-if = "index%2 == 0">{{getFormattedDate(item)}}</td>
            <td v-if = "index%2 == 0">{{asset_data_bal_qty[index]}}</td>
            <td v-if = "index%2 == 0">{{parseFloat(asset_data_tradingAVG[index]).toFixed(2).replace('.', ',')}}</td>
            <td v-if = "index%2 == 0">{{(parseFloat(asset_data_tradingAVG[index]) * parseFloat(asset_data_bal_qty[index])).toFixed(2).replace('.', ',')}}</td>
            
            <td v-if = "index%2 != 0" style="background-color: #273444;">{{getFormattedDate(item)}}</td>
            <td v-if = "index%2 != 0" style="background-color: #273444;">{{asset_data_bal_qty[index]}}</td>
            <td v-if = "index%2 != 0" style="background-color: #273444;">{{parseFloat(asset_data_tradingAVG[index]).toFixed(2).replace('.', ',')}}</td>
            <td v-if = "index%2 != 0" style="background-color: #273444;">{{(parseFloat(asset_data_tradingAVG[index]) * parseFloat(asset_data_bal_qty[index])).toFixed(2).replace('.', ',')}}</td>
        </tr>
    </table>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({

    name: 'AssetInfoTable',

    created() {
        // console.log(this.asset_data_date[0]);
        // console.log(this.asset_data_bal_qty);
        // console.log(this.asset_data_tradingAVG);
    },

    data() {
        return {
            dateArray: [],
        }
    },

    methods: {
        getFormattedDate(date) {
            this.dateArray = date.split('-');
            date = "";
            for (let i = this.dateArray.length - 1; i >= 0; i--) {
                date += this.dateArray[i];
                if (i != 0) {
                    date += "/";
                }
            }
            return date;
        }
    },

    props: {
    asset_data_date: {
      type: Array,
    },
    asset_data_bal_qty: {
      type: Array,
    },
    asset_data_tradingAVG: {
      type: Array,
    },
    }
});
</script>

<style scoped>
    table{
        width: 80%;
        text-align: center;
        border-collapse: collapse;
        margin: 30px auto;
    }

    th{

        border-top: none;
        border-bottom: 2.5px solid #3a3f45;
    }

    td{
        border-bottom: 1.5px solid #3a3f45;
        padding: 8px 12px;
    }
</style>