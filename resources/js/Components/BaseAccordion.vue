<template>
  <div class="wrapper">
    <div class="accordion" @click="toggleItem">
      <h2 class="title">
        <slot name="title"></slot>
      </h2>
    </div>
    <div v-show="show" class="content">
      <slot name="content"></slot>
    </div>
  </div>
</template>
<script>
export default {
  components: {},
  data: function() {
    return {
      show: false
    };
  },
  methods: {
    toggleItem: function() {
      this.show = !this.show;
    }
  }
};
</script>