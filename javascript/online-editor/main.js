//left side
function allowDrop(e) {
  e.preventDefault()
}

const drag = (e) => {
  e.dataTransfer.setData("text", e.target.id)
}

const drop = (e) => {
  e.preventDefault()
  let ele;
  if(document.getElementById(e.dataTransfer.getData('text')) !== null){
    let main = document.getElementById('tual')
    let parentElement = document.createElement('div')
    parentElement.classList.add('parent-element')
    parentElement.setAttribute('onclick','startEditMode(event)')
    parentElement.setAttribute('style', `top:${e.clientY-20}px;left:${e.clientX-20}px`)
    main.appendChild(parentElement)

    if(document.getElementById(e.dataTransfer.getData('text')).className === 'img'){
      ele =  document.createElement('img')
      ele.src = document.getElementById(e.dataTransfer.getData('text')).src
      ele.classList.add('child-element','added-img')
    } else if(document.getElementById(e.dataTransfer.getData('text')).id === 'text'){
      ele =  document.createElement('textarea')
      ele.innerText = 'Text'
      ele.classList.add('child-element', 'textarea')
    } else {
      ele =  document.createElement('div')
      ele.innerText = document.getElementById(e.dataTransfer.getData('text')).innerText
      ele.classList.add('child-element')
    }
    ele.setAttribute('onmousedown','')
    ele.setAttribute('onclick','startEditMode(event)')
    ele.setAttribute('ondblclick','editStyle(event)')
    parentElement.appendChild(ele)
    parentElement.style.top = (this.scrollY + e.clientY)- ele.offsetHeight/2 + 'px'
    parentElement.style.left = (this.scrollX + e.clientX)- ele.offsetWidth/2 + 'px'
    initDragElement()

  }
}
function initDragElement (){
  let pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0
  let parentElements = document.getElementsByClassName("parent-element")
  let parent = null
  let currentZIndex = 10

  for (let item of parentElements) {
    let content = getChild(item)
    if (content) {
      content.onmousedown = dragMouseDown
    }
  }
  function getChild(param) {
    let child = param.getElementsByClassName("child-element")
    if (child.length === 1) {
      return child[0]
    }
    return null
  }

  function dragMouseDown (e) {
    parent = this.parentElement
    parent.style.zIndex = "" + ++currentZIndex
    pos3 = e.clientX
    pos4 = e.clientY
    document.onmouseup = closeDragElement
    document.onmousemove = elementDrag
  }

  const elementDrag = (e) => {
    if (!parent) {
      return;
    }
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    parent.style.top = parent.offsetTop - pos2 + "px";
    parent.style.left = parent.offsetLeft - pos1 + "px";
    parent.style.outline = '2px dotted #666'
  }

  const closeDragElement = () => {
    document.onmouseup = null
    document.onmousemove = null
  }
}
//navbar-------------------------------------------------------------
let topElement = null
const checkTopElement = () => {
  if (topElement === null){
    document.querySelectorAll('input').forEach(item => {
      if(item.type !== 'file'){
        item.setAttribute('disabled','true')
      }
    })
  }
}
checkTopElement()

const startEditMode = e => {
  e.stopPropagation()
  e.target.style.outline = '2px dotted #666'
}
const exitEditMode = () => {
  document.getElementById('tual').addEventListener('click', () => {
    document.querySelectorAll('.child-element').forEach(item => {
      item.style.outline = 'none'
      item.parentElement.style.outline = 'none'
    })
    topElement = null
    checkTopElement()
  })
}
exitEditMode()
//tools
const editStyle = (e) => {
  const inputElements = document.querySelectorAll('input')
  inputElements.forEach(item => {
    item.removeAttribute('disabled','false')
  })
  topElement = e
  topElement.target.parentElement.style.outline = '2px dotted #444'
  topElement.target.style.outline = '2px dotted red'

  let fs = document.getElementById('font-size')
  let fc = document.getElementById('font-color')
  let bg = document.getElementById('bgc-color')
  let pdl = document.getElementById('padding-left')
  let pdt = document.getElementById('padding-top')
  let pdr = document.getElementById('padding-right')
  let pdb = document.getElementById('padding-bottom')
  let brw = document.getElementById('border-width')
  let brc = document.getElementById('border-color')
  let brs = document.getElementById('border-style')
  let brd = document.getElementById('border-radius')

  fs.focus()
  fs.addEventListener('change', (e) => {
    topElement.target.style.fontSize =  fs.value + 'px'
    if (e.key === 'Enter') {
      topElement.target.style.fontSize =  fs.value + 'px'
    }
  })
  document.getElementById('font-italic').addEventListener('click', () => {
    topElement.target.style.fontStyle = 'italic'
  })
  document.getElementById('font-nor').addEventListener('click', () => {
    topElement.target.style.fontWeight = 'normal'
    topElement.target.style.fontStyle = 'normal'
  })
  document.getElementById('font-bold').addEventListener('click', () => {
    topElement.target.style.fontWeight = 'bold'
  })
  fc.addEventListener('change', () => {
    topElement.target.style.color =  fc.value
  })
  bg.addEventListener('change', () => {
    topElement.target.parentElement.style.backgroundColor =  bg.value
    topElement.target.style.backgroundColor =  bg.value
  })
  pdl.addEventListener('change', () => {
    topElement.target.style.paddingLeft =  pdl.value+'px'
  })
  pdt.addEventListener('change', () => {
    topElement.target.style.paddingTop =  pdt.value+'px'
  })
  pdr.addEventListener('change', () => {
    topElement.target.style.paddingRight =  pdr.value+'px'
  })
  pdb.addEventListener('change', () => {
    topElement.target.style.paddingBottom =  pdb.value+'px'
  })
  brw.addEventListener('change', () => {
    topElement.target.parentElement.style.borderWidth =  brw.value+'px'
  })
  brs.addEventListener('change', () => {
    topElement.target.parentElement.style.borderStyle =  brs.value
  })
  brc.addEventListener('change', () => {
    topElement.target.parentElement.style.borderColor =  brc.value
  })
  brd.addEventListener('change', () => {
    topElement.target.parentElement.style.borderRadius =  brd.value + 'px'
  })
  trash.addEventListener('click', () => {
    topElement.target.parentElement.remove()
  })

  if(document.getElementsByTagName('textarea').type='textarea'){
    document.getElementById('font-left').addEventListener('click', () => {
      topElement.target.style.textAlign = 'left'
    })
    document.getElementById('font-center').addEventListener('click', () => {
      topElement.target.style.textAlign = 'center'
    })
    document.getElementById('font-right').addEventListener('click', () => {
      topElement.target.style.textAlign = 'right'
    })
  }
    document.getElementById('font-left').addEventListener('click', () => {
      topElement.target.style.justifyContent = 'flex-start'
    })
    document.getElementById('font-center').addEventListener('click', () => {
      topElement.target.style.justifyContent = 'center'
    })
    document.getElementById('font-right').addEventListener('click', () => {
      topElement.target.style.justifyContent = 'flex-end'
    })
    document.getElementById('font-vertical-start').addEventListener('click', () => {
      topElement.target.style.alignItems = 'flex-start'
    })
    document.getElementById('font-vertical-center').addEventListener('click', () => {
      topElement.target.style.alignItems = 'center'
    })
    document.getElementById('font-vertical-end').addEventListener('click', () => {
      topElement.target.style.alignItems = 'flex-end'
    })
}
//edit tual background

let tual = document.getElementById('tual')
let bgs = document.getElementById('background-size')
let bgr = document.getElementById('background-repeat')
let bgp = document.getElementById('background-position')

bgs.addEventListener('change', () => {
  tual.style.backgroundSize =  bgs.value
})
bgr.addEventListener('change', () => {
  tual.style.backgroundRepeat =  bgr.value
})
bgp.addEventListener('change', () => {
  tual.style.backgroundPosition =  bgp.value
})
document.getElementById('load-file').addEventListener('change', e => {
  tual.style.backgroundImage = `url(${URL.createObjectURL(e.target.files[0])})`
})
document.getElementById('load-file').addEventListener('change', e => {
  document.getElementById('tual').style.backgroundImage = `url(${URL.createObjectURL(e.target.files[0])})`
})

document.getElementById('screenshot-button').addEventListener('click', () => {
  window.scrollTo(0,0)
  html2canvas(document.getElementById('tual'),{
    allowTaint: true,
    useCORS: true,
  }).then((canvas) => {
    // document.getElementById('output').appendChild(canvas)
    var link = document.createElement('a')
    link.download = 'download.png'
    link.href = canvas.toDataURL()
    link.click()
    link.delete
  })
})
