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
import { Line } from 'vue-chartjs'
import { defineComponent, h } from 'vue'


import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  LineElement,
  LinearScale,
  PointElement,
  CategoryScale,
  Plugin
} from 'chart.js'


ChartJS.register(
  Title,
  Tooltip,
  Legend,
  LineElement,
  LinearScale,
  PointElement,
  CategoryScale
)


export default defineComponent({
name: 'ResultSectionPriceAVG',
components: {
  Line
},

props: {
  asset_data_date: {
    type: Array,
  },
  asset_data_tradingAVG: {
    type: Array,
  },



  chartId: {
    type: String,
    default: 'line-chart'
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
        label: 'PriceAVG',
        backgroundColor: '#f87979',
        data: props.asset_data_tradingAVG
      }
    ]
  }

  const chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      y: {
        beginAtZero: true,
        ticks:{
          type: 'linear',
          grace: '5%',
        }
      }
    }
  }

  return () =>
    h(Line, {
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