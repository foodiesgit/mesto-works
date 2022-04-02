<script>
  let title = "Home Page";
  let menu = {
    home:'Home',
    aboutus:'About Us',
    contact:'Contact'
  }
</script>

<h1>{title}</h1>

<ul>
  <li>{menu.home}</li>
  <li>{menu.aboutus}</li>
  <li>{menu.contact}</li>
</ul>

<style>
  ul{
    display: flex;
    list-style: none;
    justify-content: center;
    margin: 0;
    padding: 0;
  }
  ul li{
    margin: 0 20px;
  }

  @media (max-width: 640px) {
    ul {
      flex-direction: column;
    }
  }
</style>
