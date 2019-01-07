 let d = document;
 let w = window;
function ds(t){
	return d.querySelector(t);
}
function dsA(t){
	return d.querySelectorAll(t);
}
function dsv(t){
	return d.querySelector(t).value;
}
function dss(t){
	return d.querySelector(t).style;
}
function dsr(t){
	d.querySelector(t).remove();
}

function es(t){
	return t.style;
}
function esa(t,u,v){
	 t.setAttribute(u,v);
}
function ega(t,u){
	return t.getAttribute(u);
}
function ec(t,u){
	 t.appendChild(u);
}

function de(a,b,c){
	d.execCommand(a,b,c);
}
function de(a,b,c,f){
	d.execCommand(a,b,c,f);
}

function dc(t){
	return d.createElement(t);
}
function dctn(t){
	return d.createTextNode(t);
}
function b(){
	return d.body;
}
function s(){
	return d.getSelection();
}
function eac(t,u){
	t.appendChild(u);
}

function ac(u){
	b().appendChild(u);
}

class ce {
    constructor(e) {
		if(typeof e === 'object' || e instanceof Object){
			this.a = e;
		}else if(e.indexOf('.')!=-1||e.indexOf('#')!=-1){
			this.a =ds(e);
		}else if(typeof e === 'string' || e instanceof String){
			this.a = dc(e);
		}
		this.b=this.a.style;
    }
	
	e(){
		return (this.a);
	}
	s(){
		return (this.b);
	}
	
	
	get sd(){return this.a.style.display;}
	set sd(u){this.b.display=u;}
	
	get sh(){return this.b.height;}
	set sh(u){this.b.height=u;}

	get sw(){return this.b.width;}
	set sw(u){this.b.width=u;}
		
	get sf(){return this.b.float;}
	set sf(u){this.b.float=u;}
	
	get sl(){return this.b.left;}
	set sl(u){ this.b.left=u;}

	get sr(){return this.b.right;}
	set sr(u){this.b.right=u;}

	get st(){return this.b.top;}
	set st(u){this.b.top=u;}

	get sb(){return this.b.bottom;}
	set sb(u){this.b.bottom=u;}

	get sbc(){return this.b.backgroundColor;}
	set sbc(u){this.b.backgroundColor=u;}
		
	get sc(){return this.b.color;}
	set sc(u){this.b.color=u;}
		
	get sp(){return this.b.position;}
	set sp(u){this.b.position=u;}
		
	get sc(){return this.b.cursor;}
	set sc(u){this.b.cursor=u;}
		
	get szi(){return this.b.zIndex;}
	set szi(u){this.b.zIndex=u;}
		
	get spd(){return this.b.padding;}
	set spd(u){this.b.padding=u;}
		

	sa(u,v){
		this.a.setAttribute(u,v);
	}
	ga(u){
		return this.a.getAttribute(u);
	}
	
	a(u){
	 this.a.append(u);
	}
	ac(u){
	 this.a.appendChild(u);
	}
	pp(u){
	 this.a.prepend(u);
	}
	pp2(u,v){
	 this.a.prepend(u,v);
	}
	
	
	
	
	
	
}


