@extends('backend.layout.master')

@section('title', 'Dergi Ekle')
@section('page-css')
<style>
    /* General */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.ebook {
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
    font-family: sans-serif;
}
#ebook-top{
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    width: 100%;
    height: 100px;
    background-color: #f1f1f1;
}
.menu-con{
    display: flex;
    justify-content: space-between;
    min-width: 500px;
}
#ebook-bottom{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    width: 100%;
    background-color: lightblue;
}
.menu-items, .first-last-btn{
    min-height: 36px;
    margin: 0 20px;
    font-size: 18px;
    border:none;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
}
input[type='number'], #search-txt{
    padding-left: 10px;
}
/* Button */
button {
    border: none;
    background-color: transparent;
    margin: 80px;
    cursor: pointer;
    transition: transform 0.5s;
}

button:focus {
    outline: none;
}

button:hover i {
    color: rgb(102, 102, 102);
}

i {
    color: gray;
    font-size: 4em;
}

/* Book */
.book {
    width: 40%;
    height: 90vh;
    position: relative;
    transition: transform 0.5s;
}

.paper {
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    perspective: 1500px;
}

.front,
.back {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    padding: 20px;
    background-color: white;
    transform-origin: left;
    transition: transform 0.5s;
}

.front {
    backface-visibility: hidden;
    border-left: 3px solid #dac400;
    z-index: 1;
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
}

.back {
    z-index: 0;
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
}
.front-content,
.back-content {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.back-content {
    transform: rotateY(180deg)
}

/* Paper Flipped */
.flipped .front,
.flipped .back {
    transform: rotateY(-180deg)
}

/* Customization */

.book-title {
    text-align: center;
    padding: 10px;
}

.pages{
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}
.pages .page-numbers{
    display: block;
    width: 100%;
    text-align: center;
    min-height: 40px;
    line-height: 40px;
}
.img, .img-cover{
    width: 100%;
    height: 94%;
    object-fit: fill;
    border-radius: 5px;
}
.img-cover {
    height: 100%;
}

hr{
    margin: 10px 0;
    background-color: #ccc;
}

</style>

@endsection
@section('breadcrumb')
<audio id="audio" src="{{asset('/assets/icons/flip.wav')}}" autostart></audio>
<main class="ebook">
    <div id="ebook-top">
        <span style="margin: 10px;text-align: center;">Toplam Sayfalar: <span id="total-page"></span></span>
        <div class="menu-con">
            <i id="first-btn" class="fas fa-angle-double-left" style="cursor: pointer" onclick="firstPage()"></i>
            <div>
                <input type="number" id="search-txt" min="0" value="0" placeholder="Sayfa numarasi?" class="menu-items">
                <i class="fas fa-search fa-2x" id="search-btn" style="cursor: pointer" onclick="search()"></i>
            </div>
            <i id="last-btn" class="fas fa-angle-double-right" style="cursor: pointer" onclick="lastPage()"></i>
        </div>
    </div>
    <div id="ebook-bottom">
        <button id="prev-btn">
            <i class="fas fa-arrow-circle-left"></i>
        </button>

        <!-- The Book -->
        <div id="book" class="book">
            <!-- Papers -->

        </div>

        <button id="next-btn">
            <i class="fas fa-arrow-circle-right"></i>
        </button>
    </div>
</main>
@endsection

@section('scripts')
<script>
// Business Logic
let createId = 0
let currentState = 0
let papers = []

// References to DOM elements
const prevBtn = document.querySelector('#prev-btn')
const nextBtn = document.querySelector('#next-btn')
const book = document.querySelector('#book')

// Event listeners
prevBtn.addEventListener("click", goPrevious)
nextBtn.addEventListener("click", goNext)


function openBook() {
    book.style.transform = "translateX(50%)"
    if(window.outerWidth > 1500){
        prevBtn.style.transform = "translateX(-250px)"
        nextBtn.style.transform = "translateX(250px)"
    } else {
        prevBtn.style.transform = "translateX(-150px)"
        nextBtn.style.transform = "translateX(150px)"
    }
}

function closeBook(param) {
    if(param) {
        book.style.transform = "translateX(0%)"
    } else {
        book.style.transform = "translateX(100%)"
    }
    prevBtn.style.transform = "translateX(0px)"
    nextBtn.style.transform = "translateX(0px)"
}

const getPages = (createId) => {
    document.querySelectorAll('.pages').forEach((item, index) => {
        if(item.id === 'f'+0){
            item.innerHTML = `<img src="{{asset('/storage/Dergi 1/${index}.png')}}" class="img-cover" alt="">`
        } else if(item.id === 'b'+createId){
            item.innerHTML = `<img src="{{asset('/storage/Dergi 1/${createId*2+1}.png')}}" class="img-cover" alt="">`
        }  else {
            item.innerHTML = `
            <img src="{{asset('/storage/Dergi 1/${index}.png')}}" class="img" alt="">
            <span class="page-numbers">${index}</span>
            `
        }
    })

}
getPages()

document.querySelectorAll('.paper').forEach((item,index) => {
    index === 0 ? item.style.zIndex = 10 : item.style.zIndex = 0
})

const getPapers = () => {
    document.querySelectorAll('.paper').forEach(item => {
        papers.push(item)
    })
    document.getElementById('total-page').innerText = papers.length
    createId = papers.length-1
}
getPapers()
const getEbooks = async() => {
    const getUrl = window.location.href.split('/')
    const result = await fetch(`/admin/getebooks/${getUrl[getUrl.length-1]}`)
    const {pages} = await result.json()
        for (let i = 0; i < pages.length/2; i++) {
            createId++
            let container = document.getElementById('book')
            let newPage = document.createElement('div')
            newPage.setAttribute('id',`p${createId}`)
            newPage.classList.add('paper')
            newPage.innerHTML = `
            <div class="front">
                <div id="f${createId}" class="front-content pages">

                </div>
            </div>
            <div class="back">
                <div id="b${createId}" class="back-content pages">

                </div>
            </div>`
            container.appendChild(newPage)
        }
        papers = []
        getPapers()
        getPages(createId)
        papers[0].style.zIndex = 10
}

getEbooks()

const firstPage = () =>  {
    resetZindex()
    resetFlipped()
    papers[0].style.zIndex = 10
    closeBook(true)
    currentState = 0
}

const lastPage = () =>  {
    resetZindex()
    resetLast()
    closeBook(false)
    currentState = createId+1
    papers[createId].style.zIndex = 10;
}

const resetZindex = () => {
    document.querySelectorAll('.paper').forEach(item => {
        item.style.zIndex = 0
    })
}

const resetFlipped = () => {
    document.querySelectorAll('.paper').forEach(item => {
        item.classList.remove("flipped")
    })
}

const resetLast = () => {
    document.querySelectorAll('.paper').forEach(item => {
        item.classList.add("flipped")
    })
}

function goNext() {
    let pageNumber = 0
    resetZindex()
    openBook()
    if(currentState < createId){
        papers[currentState].classList.add("flipped")
        currentState++
        papers[currentState].style.zIndex = 10
    } else {
        lastPage()
    }
    document.getElementById('audio').play()
}

function goPrevious() {
    resetZindex()
    openBook()
    if(currentState !== 0) {
        currentState--;
        papers[currentState].classList.remove("flipped")
        papers[currentState].style.zIndex = 10
    }
    if (currentState === 0){
        firstPage()
    }
    document.getElementById('audio').play()
}

const search = () =>  {
    let searchValue = Number(document.getElementById('search-txt').value)
    if(searchValue === 0){
        firstPage()
    } else {
        if(searchValue-1 === createId){
            lastPage()
        } else if(searchValue-1 > createId){
            alert('Sayfa bulunamadi!')
            firstPage()
        } else {
            openBook()
            resetZindex()
            resetFlipped()
            for (let i = 0; i < searchValue; i++) {
                papers[i].classList.add('flipped')
            }
            papers[searchValue].style.zIndex = 10
            currentState = searchValue
        }
    }
}
</script>
@endsection
