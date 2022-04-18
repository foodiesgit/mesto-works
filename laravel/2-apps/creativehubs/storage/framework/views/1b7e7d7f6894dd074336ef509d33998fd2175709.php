<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo e(asset('/main.css')); ?>">
</head>
<body>
  <div id="main-area"></div>
  <ul id="details">
    <header id="details-header">
      <span id="closeDetails">Kapat</span>
      <div id="header-title"></div>
      <p id="header-category"></p>
    </header>
    <div id="details-body">

    </div>
  </ul>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cytoscape/3.20.0/cytoscape.min.js" integrity="sha512-cjmYAonfXK+azDmWqvnqq8xmygHRHqVI7S0zuRxQnvcYVeoakwthRX6pPKoXfG1oIjDvMUtteRV9PhQjJwKWxQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    const graphFunction = async () => {
      const data = await fetch('/getdata')
      const result = await data.json()
      const nodes = result.nodes.map(item => {
        return{
          data:item
        }
      })
      const edges = result.edges.map(item => {
        return{
          data:item
        }
      })
      let cy = cytoscape({
        container: document.getElementById('main-area'),
        elements:{
          nodes: nodes,
          edges: edges
        },
        layout: {
          name: 'circle',
          rows: 1
        },

        style: [
          {
            selector: 'node',
            style: {
              'shape': 'data(sh)',
              'background-color':'data(bg)',
              'border-width':'data(bw)',
              'border-color':'data(bc)',
              'label': 'data(id)',
              'font-size':'12px',
              'font-family':'Cambria'
            }
          },

          {
            selector: 'edge',
            style: {
              'width': 1,
              'curve-style': 'data(arrowline)',
              'line-color': 'data(bg)',
              'target-arrow-shape': 'triangle',
              'target-arrow-color': 'data(bg)'
            }
          },
          {
            selector: ':selected',
            style: {
              'background-color': 'orange'
            }
          }
        ]
      })
      cy.on('tap', 'node', function(evt){
        let node = evt.target;
        getNodeDetails(node.id())
      })

    }
    graphFunction()
    document.getElementById('closeDetails').addEventListener('click', () => {
      document.getElementById('details').style.display = 'none'
    })

    const getNodeDetails = async(id) => {
      const result = await fetch(`/nodedetails/${id}`)
      const final = await result.json()
      document.getElementById('details').style.display = 'block'
      let finalFilter = final.result.filter(item => item.id === id)
      document.getElementById('details-header').style.backgroundColor  = finalFilter[0].bg
      document.getElementById('header-title').innerHTML = id
      document.getElementById('header-category').innerHTML = finalFilter[0].category

      document.getElementById('details-body').innerHTML = ''
      for (const item of final.result) {
        document.getElementById('details-body').innerHTML += `
          <li class="details-list">
            <header class="details-toggle" onclick='getSubDetails(event)'>
            <span class="header-logo">${item.id.charAt(0)}</span>
            <span>${item.id}</span>
            </header>
            <ul class='sub-details' id='${item.id}'>
              <li id="details-text">${item.text}</li>
              <li id="location">${item.location}</li>
              <a href='${item.link}' target='_blank'>Link'e git</a>
              <li id="address">${item.address}</li>
            </ul>
          </li>
        `
      }
    }
    const getSubDetails = (e) => {
      document.querySelectorAll('.sub-details').forEach(item => {
        item.style.display = 'none'
      })
      document.getElementById(e.target.innerText).style.display = 'block'
      document.getElementById('header-title').innerHTML = e.target.innerText
    }
  </script>
</body>
</html>
<?php /**PATH C:\Users\mfaga\Downloads\creativehubs\creativehubs\resources\views/welcome.blade.php ENDPATH**/ ?>