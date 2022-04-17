<template>
  <div>
    <u>
      <li v-for="(item, index) in users" :key="index">
        {{ item }}
        <!-- <div v-for="(item2, index) in item.betsummaries" :key="index">
          {{  item2.sumid }}
          {{  item2.userpay }}
        </div> -->
      </li>
    </u>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'Index',
  data () {
    return {
      users: {}
    }
  },
  mounted () {
    this.getUsers()
  },
  methods: {
    async getUsers() {
      await axios.get('/api').then((result) => {
        this.users = result.data.result
      })
    }
  },
}
</script>
