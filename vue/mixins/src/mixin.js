export const test = x => ({
  mounted(){
    this.getMsg(x)
  },
  methods:{
    getMsg(x){
      console.log(x)
    }
  }
})