var submenuInfo=document.querySelector('.info-navigation')
var info=document.querySelector('.info')
var food=document.querySelector('.food')

var submenuFood=document.querySelector('.food-navigation')
var discountNavigation=document.querySelector('.food-navigation')
var newsNavigation=document.querySelector('.news-navigation')
var contactNavigtaion=document.querySelector('.contact-navigation')
var connectInfoBridge=document.querySelector('.connectwithinfo')
var connectFoodBridge=document.querySelector('.connectwithfood')

var header = document.querySelector('.header')
var banner =document.querySelector('.Custom-Slider')


var HandleInfoShow =(IsInfoShow)=>{
   if(IsInfoShow===false){
       info.classList.remove('no-display')
       info.classList.add('flex')
       console.log(IsInfoShow)
   }
   else if(IsInfoShow===true){
       info.classList.add('no-display')
       info.classList.remove('flex')
       console.log(IsInfoShow)
   }
}

var HandleFoodShow =(IsInfoShow)=>{
   if(IsInfoShow===false){
       food.classList.remove('no-display')
       food.classList.add('flex')
       console.log(IsInfoShow)
   }
   else if(IsInfoShow===true){
       food.classList.add('no-display')
       food.classList.remove('flex')
       console.log(IsInfoShow)
   }
}

submenuInfo.addEventListener('mouseover',()=>{
   HandleInfoShow(false)
})
submenuInfo.addEventListener('mouseleave',()=>{
   HandleInfoShow(true)
})
submenuFood.addEventListener('mouseover',()=>{
   HandleFoodShow(false)
})
submenuFood.addEventListener('mouseleave',()=>{
   HandleFoodShow(true)
})
info.addEventListener('mouseover',()=>{
   HandleInfoShow(false)
})
info.addEventListener('mouseleave',()=>{
   HandleInfoShow(true)
})
food.addEventListener('mouseover',()=>{
   HandleFoodShow(false)
})
food.addEventListener('mouseleave',()=>{
   HandleFoodShow(true)
})

connectFoodBridge.addEventListener('mouseover',()=>{
   HandleFoodShow(false)
})


connectInfoBridge.addEventListener('mouseover',()=>{
   HandleInfoShow(false)
})



contactNavigtaion.addEventListener('mouseover')

