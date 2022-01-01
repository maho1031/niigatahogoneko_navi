document.addEventListener('DOMContentLoaded', function(){

    const main = new Main();
});

class Main {
    constructor() {
        this.header = document.querySelector('.l-header');
        this._observers = [];
        this._scrollInit();
    }

    set observers(val) {
        this._observers.push(val);
    }

    get observers() {
        return this._observers;
    }

    _navAnimation(el, inview){
        if(inview){
            this.header.classList.remove('triggered');
        }else{
            this.header.classList.add('triggered');
        }
    }
    _destroyObservers(){
        this.observers.forEach(ob => {
            ob.destroy();
        });
    }
    destroy(){
        this._destroyObservers();
    }

    _scrollInit(){
        this._observers = new ScrollObserver('.js-nav-trigger', this._navAnimation.bind(this), {once: false});
        console.log(this.observers);
    }

}