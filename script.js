// 將bar的內容整理一遍
let header=document.getElementById('header');
let header_1=document.getElementById('header_1')
let menu=document.getElementById('menu');
let btn=document.getElementById('btn');

// 懶得記樣式QAQ饒了我，不要抓我，讓我弄變數記
let a=header_1.style.height;
let b=header_1.style.width;
let c=menu.style.height;
let d=btn.style.height;
let e=menu.style.width;
let f=btn.style.width;
let g=header.style.boxShadow;
let h=header.style.height;
let i=header.style.background;
let j=header_1.style.justifyContent;
let k=menu.style.display;


window.addEventListener('scroll', debounce(bc));

    
function bc(){
    if(window.scrollY>=1){
        header_1.style.height="100%";
        header_1.style.width="60%";
        menu.style.height="50%";//no
        btn.style.height="100%";//change
        menu.style.width="40%";//no
        btn.style.width="40%";
        header.style.boxShadow="0 0 0 ";
        header.style.height='8%';
        header.style.background="#F2F2F2";
        header_1.style.justifyContent="flex-start";
        menu.style.display='none';
        // menu.setAttribute('id','btn');
        
    }else{
        header_1.style.height=a;
        header_1.style.width=b;
        menu.style.height=c;
        btn.style.height=d;
        menu.style.width=e;
        btn.style.width=f;
        header.style.boxShadow=g;
        header.style.height=h;
        header.style.background=i;
        header_1.style.justifyContent=j;
        menu.style.display=k;
    }
}

// scroll太嚇人了一直跑 還好電腦效能扛得住OAO 之後要找時間再看一次，這個聽說很重要
function debounce(func, delay=100) {
    let timer = null;
   
    return () => {
      let context = this;
      let args = arguments;
   
      clearTimeout(timer);
      timer = setTimeout(() => {
        func.apply(context, args);
      }, delay)
    }
  }