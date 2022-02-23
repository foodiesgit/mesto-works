<template>
  <div class="home-page">
    <logo />
    <div id="app" v-cloak>
    <div class="mood"> 
      <span class="mood-emoji">{{ mood.emoji }}</span>
      <span class="mood-name">{{ mood.name }}</span>
      <button @click="randomMood">Random Mood</button>
    </div>
  </div>
  </div>
</template>

<script>
export default {
  name: 'HomePage',
  data () {
    return {
      mood: {
      emoji: null,
      name: 'Emoji Placeholder'
    },
    moods: [
        { name: "Happy", "emoji": "😀" }, 
        { name: "Angry", "emoji": "😠" },
        { name: "Really Angry", "emoji": "😡" },
        { name: "Really Sad", "emoji": "☹️" },
        { name: "Poop", "emoji": "💩" },
        { name: "crying", "emoji": "😂" },
        { name: "kiss", "emoji": "😘" }
    ]
    }
  },
  methods: {
    randomMood: function () {
      this.mood  = this.moods[Math.floor(Math.random()*this.moods.length)]
        
    }
  }
}
</script>

<style scoped>
[v-cloak]  { 
	display:none; 
}
.mood {
  text-align: center;
}
	.mood-emoji {
	    line-height: 4rem;
	    font-size: 4rem;
	    margin-bottom: .25rem;
	}
	.mood-name {
	    font-size: 1.75rem;
	    margin-bottom: 2rem;
	    display: block;
	}
button {
    background: #ec6666;
    border: solid 1px #ec6666;
    padding: 10px 16px;
    color: #fff;
    cursor: pointer;
    outline:none;
}
</style>