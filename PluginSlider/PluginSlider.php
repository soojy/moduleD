<?php
/*
    Plugin Name: slider plugin
    Author: soojy
    Author URI: https://github.com/soojy
*/


function CreateSlider()
{


    echo '
    <style>
        
        .slider{
            display: block;
            width: 100%;
            min-height: 45vh;
            position:relative;
            overflow-x: hidden;
        }
        .slider-content, .slider-controls, .slider-item, .controls-arrows,.controls-marks {
            position:absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;   
        }
        .slider-content{
        overflow: hidden;
        }
        .controls-marks {
        display: flex;
        justify-content: center;
        align-items: end;
        padding-bottom: 1rem;
        }
        .mark-item {
        display: block;
        width: 15px;
        height: 15px;
        background:#f1f1f1;
        border-radius: 100%;
        margin: 0 1rem;
        border: 1px solid #000000;
        opacity: .3;
        }
        .mark-item.active{
        opacity: 1;
        transform: scale(1.1);
        background:#ffffff;
        }
        .controls-arrows{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 1rem;
        font-size: 2rem;
        }
        .controls-arrows .arrows-left, .arrows-right {
            cursor: pointer;
            font-weight: bold;
            opacity: .7;
            color: white;
        }
        .controls-arrows .arrows-left:hover, .arrows-right:hover {
            opacity: 1;
        }
        .slider-item{

        width: 100%;
        height: 100%;
        overflow: hidden;
        transition: .5s;
        }
        .slider-item.active{
        display:flex ;
        justify-content:center;
        align-items: center;
        font-size: 45px;
        transform: translateX(0%);
        }
        .slider-item:not(.active){
        transform: translateX(+100%);
        animation: fadeout .5s;
        }
        @keyframes fadeout {
          from {
            transform: translateX(0%);
          }
        
          to {
            transform: translateX(-100%);
          }
        }
        @keyframes fadein {
          from {
            transform: translateX(+100%);
          }
        
          to {
            transform: translateX(0%);
          }
        }
        
    </style>
    ';

    echo '
    <div class="slider">
        <div class="slider-content">
           ';
    $dir = WP_PLUGIN_URL . '/PluginSlider/img/';
    for ($i = 0;$i < 5;$i++)
    {

        echo "
                <div class='slider-item' id='${i}'>
                <img src='";
        echo $dir;
        echo "${i}.jpg' alt=''>
                </div>
                ";
    }

    echo '
        </div>
        <div class="slider-controls">
        <div class="controls-marks">
        ';
    for ($i = 0;$i < 5;$i++)
    {
        echo "
                <div class='mark-item' id='mark${i}'>
                
                </div>
                ";
    }
    echo '
        </div>
    <div class="controls-arrows">
    <btn class="slider-arrow arrows-left ">
    <
    </btn>
     <btn class=" slider-arrow arrows-right">
    >
    </btn>
</div>
    </div>
        </div>
    ';

    echo '
        <script>
        document.onkeydown = checkKey;
        function checkKey(e) {
            e = e || window.event
        if (e.keyCode == 39) {
            nextSlide()
        }
        else if(e.keyCode == 37) {
                        prevSlide()

        }
        

}
        let items = document.getElementsByClassName(`slider-item`)
        let itemsMarks = document.getElementsByClassName(`mark-item`)
        let Controls = document.getElementsByClassName(`slider-arrow`)
        Controls[1].onclick = ()=> {
            nextSlide()
        }
        Controls[0].onclick = ()=> {
            prevSlide()
        }
        let activeSlide = 0
        function nextSlide() {
            if (activeSlide +1 == items.length){
                activeSlide = -1
            }
            activeSlide++
            for (let item of items){
                if (item.classList.contains(`active`)){
                    item.classList.remove(`active`)
                }
            }
            for (let item of itemsMarks){
                if (item.classList.contains(`active`)){
                    item.classList.remove(`active`)
                }
            }
            items[activeSlide].classList.add(`active`)
            itemsMarks[activeSlide].classList.add(`active`)
        }
        
        function prevSlide() {
            if (activeSlide -1 == -1){
                activeSlide = 5
            }
            activeSlide--
            for (let item of items){
                if (item.classList.contains(`active`)){
                    item.classList.remove(`active`)
                }
            }
            for (let item of itemsMarks){
                if (item.classList.contains(`active`)){
                    item.classList.remove(`active`)
                }
            }
            items[activeSlide].classList.add(`active`)
            itemsMarks[activeSlide].classList.add(`active`)
        }
        setTimeout(()=>{nextSlide()},0)
        setInterval(()=>{nextSlide()},5000)
        </script>
        ';

}

