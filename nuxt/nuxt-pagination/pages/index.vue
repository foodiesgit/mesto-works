<template>
  <div class="container">
    <h2>Nuxt Pagination</h2>
    <table>
      <thead>
        <tr class="table-header">
          <th class="table-header-item">Name</th>
          <th class="table-header-item">Gender</th>
          <th class="table-header-item">Country</th>
        </tr>
      </thead>
      <tr class="table-list" v-for="(item, index) in persons" :key="index">
        <td class="table-list-item">{{ item.name }}</td>
        <td class="table-list-item">{{ item.gender }}</td>
        <td class="table-list-item">{{ item.company.location.country }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "index",
  data() {
    return {
      persons: {},
    };
  },
  mounted() {
    this.connectNodejs();
  },
  methods: {
    async connectNodejs() {
      await axios
        .post("/api", { query: this.$route.query.page })
        .then((result) => {
          console.log(result.data);
          this.persons = result.data;
        });
    },
  },
};
</script>

<style>
.container {
  margin: 0 auto;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  text-align: center;
}
</style>
