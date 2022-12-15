<template>

    <section>
        <Bar
        :chart-options="chartOptions"
        :chart-data="chartData"
        :chart-id="chartId"
        :dataset-id-key="datasetIdKey"
        :plugins="plugins"
        :css-classes="cssClasses"
        :styles="styles"
        :width="width"
        :height="height"
      />
    </section>
</template>
<script>
import { Bar } from 'vue-chartjs'
import { defineComponent, h } from 'vue'


import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale,
  Plugin
} from 'chart.js'


ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)



export default defineComponent({
  name: 'ResultSectionBalance',
  components: {
    Bar
  },
 
  
  props: {
    asset_data_date: {
      type: Array,
    },
    asset_data_bal_qty: {
      type: Array,
    },

    chartId: {
      type: String,
      default: 'bar-chart'
    },
    width: {
      type: Number,
      default: 400
    },
    height: {
      type: Number,
      default: 400
    },
    cssClasses: {
      default: '',
      type: String
    },
    styles: {
      type: Object,
      default: () => {}
    },
    plugins: {
      type: Array,
      default: () => []
    }
  },

  setup(props) {
    const chartData = {
      labels: props.asset_data_date,
      datasets: [
        {
          label: 'Balance Qty',
          backgroundColor: '#f87979',
          data: props.asset_data_bal_qty
        }
      ]
    }

    const chartOptions = {
      responsive: true,
      maintainAspectRatio: false
    }

    return () =>
      h(Bar, {
        chartData,
        chartOptions,
        chartId: props.chartId,
        width: props.width,
        height: props.height,
        cssClasses: props.cssClasses,
        styles: props.styles,
        plugins: props.plugins
      })
  }
})
</script>

<style scoped>
    section{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;

    }

</style>