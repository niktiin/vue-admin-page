<template>
  <div class="home">
    <div class="items-grid">
      <item v-for="item in itemsTest" :key="item"/>
    </div>
  </div>
</template>

<script>
import item from '@/components/Item.vue'

export default {
  name: 'Home',
  components: {
    item
  },
  mounted () {
    this.$store.dispatch('requestAPIGetItem')
  },
  data: function () {
    return {
      itemsTest: ['', '', '', '', '']
    }
  }
}
</script>

<style lang="scss">
  .items-grid {
    display: grid;
    grid-template-columns: repeat(4, auto);
    justify-content: space-between;
    justify-items: center;
    grid-auto-flow: row;
    grid-gap: 20px;
    margin: 0 20px;
  }
  // Adaptive
  @media screen and (max-width: 1200px) {
    .items-grid {
      grid-template-columns: repeat(3, 1fr);
    }
  }
  @media screen and (max-width: 900px) {
    .items-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }
  @media screen and (max-width: 600px) {
    .items-grid {
      grid-template-columns: 1fr;
    }
  }
</style>
