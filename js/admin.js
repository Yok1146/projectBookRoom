const room = document.querySelectorAll(".room");
const td = document.querySelectorAll("td");
td.forEach(e =>{
    // console.log(e)
    if(e.innerHTML != "ยังไม่มีผู้เช่า"){
        // console.log(e)
        // console.log(e.innerHTML)
        
        room.forEach(a =>{
            // console.log(a.classList)
            if(a.classList[1] == e.innerHTML){
                a.style="background-color: #25da15;"
                // console.log(e)
            }
        })
    }
})

const slip = document.querySelectorAll('#slip');
const image = document.querySelectorAll('.img');
const x = document.querySelectorAll('#x');

slip.forEach(e=>{
    e.addEventListener('click',(r)=>{
        image.forEach(a=>{
            if(a.id == r.target.className){
                a.style.display="flex"
            }
        })
    })
})
x.forEach(e=>{
    e.addEventListener('click',()=>{
        image.forEach(a=>{
            if(a.id == e.className){
                a.style.display="none"
            }
        })
    })
})

const showdiv = document.querySelectorAll(".showdiv");
const div = document.querySelectorAll(".div");

showdiv.forEach(e=>{
    console.log(e.id)
    e.addEventListener("click",a=>{
        div.forEach(z=>{
            if(z.id == a.target.id){
                z.style.display="table-row"
            }
        })
        // console.log(a.target.id)
    })
})
// console.log(showdiv)
// console.log(div)
