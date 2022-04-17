<template>
  <div class="home-page">
    <div class="mood"> 
      <span class="mood-emoji">{{ mood.emoji }}</span>
      <ul>
        <li v-for="emojilist in moods" :key="emojilist.id" class="emoji-list">
          <span class="emoji" @click="addEmoji(emojilist.id)">{{ emojilist.emoji }}</span>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HomePage',
  data () {
    return {
    mood: '',
    moods: [
        { id: 0, emoji: "😃" }, 
        { id: 1, emoji: "😉" },
        { id: 2, emoji: "😊" },
        { id: 3, emoji: "🤑" },
        { id: 4, emoji: "😂" },
        { id: 5, emoji: "😪" },
        { id: 6, emoji: "😕" },
        { id: 7, emoji: "😟" },
        { id: 8, emoji: "😮" },
        { id: 9, emoji: "😲" },
        { id: 10, emoji: "😛" },
        { id: 11, emoji: "😜" },
        { id: 12, emoji: "😍" },
        { id: 13, emoji: "😘" },
        { id: 14, emoji: "💘" },
        { id: 15, emoji: "💋" },
        { id: 16, emoji: "💣" },
        { id: 17, emoji: "👍" },
        { id: 18, emoji: "👎" },
        { id: 19, emoji: "💪" },
        { id: 20, emoji: "✌️" },
        { id: 21, emoji: "🖐️" },
        { id: 22, emoji: "👀" },
        { id: 23, emoji: "⚽" },
        { id: 24, emoji: "🏀" },
        { id: 25, emoji: "⚾" },
        { id: 26, emoji: "🏐" },
      ]
    }
  },
  methods: {
    addEmoji: function (id) {
      this.mood  = this.moods[id]
    }
  }
}
</script>

<style>
ul {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  justify-content: flex-start;
  width: 300px;
  height: auto;
  margin: 0 auto;
  margin-top: 30px;
  padding: 0;
  list-style: none;
  border: 1px solid #d3d3d3;
}
.emoji-list {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 40px;
  margin: 0;
  padding: 5px;
  cursor: pointer;
}
.emoji {
  font-size: 22px;
}
[v-cloak]  { 
	display:none; 
}
.mood {
  text-align: center;
}
.mood-emoji {
  display: block;
  font-size: 50px;
  margin-top: 20px;
}
</style>