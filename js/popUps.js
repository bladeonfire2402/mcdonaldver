const closeBtn=document.querySelector('.close')

var IsLogin=true
var ScreenClose =document.querySelector('.userLog-popUps-screen')

closeBtn.addEventListener('click',()=>{
   ScreenClose.classList.add('no-display')
})

function logHandle(IsLogin){
   if(IsLogin===true){
      console.log("đăng nhập đc")
   }
   else{
      console.log("Không đăng nhập rồi")
   }
}

logHandle(IsLogin)

function NavigateToMcProfile(){
   if(IsLogin===true){
       window.location.href='../mcDelivery/mcProfile.html'
       console.log(IsLogin)
   }
   else{
      ScreenClose.classList.remove('no-display')
      console.log(IsLogin)

   }
}




function NavigateToMcMenu(){
   if(IsLogin===true){
       window.location.href='../mcDelivery/mcMenu.html'
       console.log(IsLogin)
   }
   else{
      ScreenClose.classList.remove('no-display')
      console.log(IsLogin)
   }
}

