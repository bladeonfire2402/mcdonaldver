console.log("dđ")

var mainmenu
var mainMenuTriangle

var desertmemu
var desertMenuTriangle

var mcoffemenu
var mcoffeMenuTriangle


var menudefault 
var menudesert

mainmenu=document.querySelector('.main-food')
mainMenuTriangle=document.querySelector('.main-tria')
desertmemu=document.querySelector('.main-desert')
desertMenuTriangle=document.querySelector('.desert-tria')
mcoffemenu=document.querySelector('.main-mccafe')
mcoffeMenuTriangle=document.querySelector('.mccafe-tria')

menudefault=document.querySelector('.menudefault')
menudesert=document.querySelector('.menudesert')
menucafe=document.querySelector('.menucafe')
console.log(mcoffemenu)

function HandleSetCheck(a,b,c){
    if(a!==null){
        // xóa class no-display
        mainMenuTriangle.classList.remove('no-display')
        mainmenu.classList.add('bg-primary')

        desertmemu.addEventListener('mouseover',()=>{
            desertmemu.classList.add('bg-primary')
            desertMenuTriangle.classList.remove('no-display')
        })
        desertmemu.addEventListener('mouseleave',()=>{
            desertmemu.classList.remove('bg-primary')
            desertMenuTriangle.classList.add('no-display')
        })
        mcoffemenu.addEventListener('mouseover',()=>{
            mcoffemenu.classList.add('bg-primary')
            mcoffeMenuTriangle.classList.remove('no-display')
        })
        mcoffemenu.addEventListener('mouseleave',()=>{
            mcoffemenu.classList.remove('bg-primary')
            mcoffeMenuTriangle.classList.add('no-display')
        })
             
    }
    else if(b!==null){
        desertMenuTriangle.classList.remove('no-display')
        desertmemu.classList.add('bg-primary')
        

        mainmenu.addEventListener('mouseover',()=>{
            mainmenu.classList.add('bg-primary')
            mainMenuTriangle.classList.remove('no-display')
        })
        mainmenu.addEventListener('mouseleave',()=>{
            mainmenu.classList.remove('bg-primary')
            mainMenuTriangle.classList.add('no-display')
        })
        mcoffemenu.addEventListener('mouseover',()=>{
            mcoffemenu.classList.add('bg-primary')
            mcoffeMenuTriangle.classList.remove('no-display')
        })
        mcoffemenu.addEventListener('mouseleave',()=>{
            mcoffemenu.classList.remove('bg-primary')
            mcoffeMenuTriangle.classList.add('no-display')
        })
    }
    else if(c!==null){
        mcoffeMenuTriangle.classList.remove('no-display')
        mcoffemenu.classList.add('bg-primary')

        desertmemu.addEventListener('mouseover',()=>{
            desertmemu.classList.add('bg-primary')
            desertMenuTriangle.classList.remove('no-display')
        })
        desertmemu.addEventListener('mouseleave',()=>{
            desertmemu.classList.remove('bg-primary')
            desertMenuTriangle.classList.add('no-display')
        })
        mainmenu.addEventListener('mouseover',()=>{
            mainmenu.classList.add('bg-primary')
            mainMenuTriangle.classList.remove('no-display')
        })
        mainmenu.addEventListener('mouseleave',()=>{
            mainmenu.classList.remove('bg-primary')
            mainMenuTriangle.classList.add('no-display')
        })

    }

}


HandleSetCheck(menudefault,menudesert,menucafe)
