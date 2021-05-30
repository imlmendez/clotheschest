//cursor
$(document).ready(function(){
    var isIE11 = !!window.MSInputMethodContext && !!document.documentMode;
    var is_touch = is_touch_device();
    var mq = window.matchMedia( "(max-width: 1024px)" );
    var show_cursor = !(is_touch || mq.matches);
    var lastScrollTop = 0;
    var cursor = {
        delay: 8,
        _x: 0,
        _y: 0,
        endX: (window.innerWidth / 2),
        endY: (window.innerHeight / 2),
        cursorVisible: true,
        cursorEnlarged: false,
        $dot: document.querySelector('.cursor-dot'),
        $outline: document.querySelector('.cursor-dot-outline'),
        timeout:0,
        init: function() {
            // Set up element sizes
            this.dotSize = this.$dot.offsetWidth;
            this.outlineSize = this.$outline.offsetWidth;
            
            this.setupEventListeners();
            this.animateDotOutline();
        },
        
        updateCursor: function(e) {
            var self = this;
            
            // Show the cursor
            self.cursorVisible = true;
            self.toggleCursorVisibility();

            // Position the dot
            self.endY = e.pageY;
            $(self.$dot).stop(false,false).animate({
                top:  self.endY
            }, 1);

        },
        
        setupEventListeners: function() {

            var self = this;
            if(show_cursor){
                // Anchor hovering
                document.querySelectorAll('a, .enlarge, .menu-opener').forEach(function(el) {
                    el.addEventListener('mouseover', function() {
                        self.cursorEnlarged = true;
                        self.toggleCursorSize();
                    });
                    el.addEventListener('mouseout', function() {
                        self.cursorEnlarged = false;
                        self.toggleCursorSize();
                    });
                });
                
                // Click events
                document.addEventListener('mousedown', function() {
                    self.cursorEnlarged = true;
                    self.toggleCursorSize();
                });
                document.addEventListener('mouseup', function() {
                    self.cursorEnlarged = false;
                    self.toggleCursorSize();
                });
        
        
                document.addEventListener('mousemove', function(e) {
                    // Show the cursor
                    self.cursorVisible = true;
                    self.toggleCursorVisibility();

                    // Position the dot
                    self.endX = e.pageX;
                    self.endY = e.pageY;
/*
                    if(isIE11){
                        if(self.endX > $(document).width() -60){
                            self.endX = $(document).width() -60
                        } 
                    }
                    else{
                        
                        if(self.endX > $(document).width() -40){
                            self.endX = $(document).width() -40
                        } 
                        
                        if(self.endX > $(document).width() -35){
                            self.endX = $(document).width() -35;
                        } 
                    }
*/     
                    self.$dot.style.top = self.endY + 'px';
                    self.$dot.style.left = self.endX + 'px';
                    clearTimeout(self.timeout);
                    self.showCursorOutline();
                    self.timeout = setTimeout(function(){
                        self.hideCursorOutline();
                    },1000);
                });
                
                // Hide/show cursor
                document.addEventListener('mouseenter', function(e) {
                    self.cursorVisible = true;
                    self.toggleCursorVisibility();
                    self.$dot.style.opacity = 1;
                    self.$outline.style.opacity = 1;
                });
                
                document.addEventListener('mouseleave', function(e) {
                    self.cursorVisible = true;
                    self.toggleCursorVisibility();
                    self.$dot.style.opacity = 0;
                    self.$outline.style.opacity = 0;
                });
                $(".header-buttons").hover(function() {
                    $(".cursor-dot, .cursor-dot-outline").addClass("special-cursor");
               }, function() {
                    $(".cursor-dot, .cursor-dot-outline").removeClass("special-cursor");
               });
               
               $(".menu-opener").hover(function() {
                    $(".cursor-dot, .cursor-dot-outline").addClass("menu-cursor");
                    }, function() {
                    $(".cursor-dot, .cursor-dot-outline").removeClass("menu-cursor");
                });
                
            }

        },
        
        animateDotOutline: function() {
            var self = this;
            
            self._x += (self.endX - self._x) / self.delay;
            self._y += (self.endY - self._y) / self.delay;
            self.$outline.style.top = self._y + 'px';
            self.$outline.style.left = self._x + 'px';
            
            requestAnimationFrame(this.animateDotOutline.bind(self));
        },
        
        toggleCursorSize: function() {
            var self = this;
            
            if (self.cursorEnlarged) {
                /*
                self.$dot.style.transform = 'translate(-50%, -50%) scale(0.75)';
                self.$outline.style.transform = 'translate(-50%, -50%) scale(0.75)';
                */
               self.$dot.style.transform = 'translate(-50%, -50%) scale(0.75)';
               self.$outline.style.transform = 'translate(-50%, -50%) scale(0)';

            } else {
                self.$dot.style.transform = 'translate(-50%, -50%) scale(1)';
                self.$outline.style.transform = 'translate(-50%, -50%) scale(1)';
            }
        },
        
        toggleCursorVisibility: function() {
            var self = this;
            
            if (self.cursorVisible) {
                self.$dot.style.opacity = 1;
                self.$outline.style.opacity = 1;
            } else {
                self.$dot.style.opacity = 0;
                self.$outline.style.opacity = 0;
            }
        },

        hideCursorOutline: function(){
            var self = this;
            self.$outline.style.opacity = 0;
        },

        showCursorOutline: function(){
            var self = this;
            self.$outline.style.opacity = 1;
        }

    }

    cursor.init();

    //Esconder header al hacer scroll hacia abajo, mostrarlo de nuevo al hacer scroll hacia arriba
    if(show_cursor){
        $(window).bind('mousewheel', function(event) {
            cursor.updateCursor(event);
            if(!($(window).scrollTop() + $(window).height() == getDocHeight()) && event.originalEvent.wheelDelta < 0 && !$(".menu-lateral").hasClass("open")) { // si no hemos llegado al final de la pagina y hacemos scroll hacia abajo y el menu no esta abierto ...
                if($("body").hasClass("home")){
                    //Estamos en la home
                    if($(".animated-screen").hasClass("d-none")){
                        // Y han acabado las animaciones, escondemos header
                        $(".header-class").addClass("upped");
                    }
                }
                else{
                    //No estamos en la home, escondemos header
                    $(".header-class").addClass("upped");
                }
            }
            if(event.originalEvent.wheelDelta >= 0){
                if($(".header-class").hasClass("upped")){
                    $(".header-class").removeClass("upped");
                }
            }
        });
    }
    else{
        $(window).scroll(function(event){
            var st = $(this).scrollTop();
            if(!($(window).scrollTop() + $(window).height() == getDocHeight()) && st > lastScrollTop ) { // si no hemos llegado al final de la pagina y hacemos scroll hacia abajo ...
                if($("body").hasClass("home")){
                    //Estamos en la home
                    if($(".animated-screen").hasClass("d-none")){
                        // Y han acabado las animaciones, escondemos header
                        $(".header-class").addClass("upped");
                    }
                }
                else{
                    //No estamos en la home, escondemos header
                    $(".header-class").addClass("upped");
                }
            }
            if(st <= lastScrollTop){
                if($(".header-class").hasClass("upped")){
                    $(".header-class").removeClass("upped");
                }
            }
            lastScrollTop = st;
        });
    }   
});


function getDocHeight() {
    var D = document;
    return Math.max(
        D.body.scrollHeight, D.documentElement.scrollHeight,
        D.body.offsetHeight, D.documentElement.offsetHeight,
        D.body.clientHeight, D.documentElement.clientHeight
    );
}


//Polyfill foreach IE11
if (typeof Array.prototype.forEach != 'function') {
    Array.prototype.forEach = function (callback) {
        for (var i = 0; i < this.length; i++) {
            callback.apply(this, [this[i], i, this]);
        }
    };
}

if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = Array.prototype.forEach;
}  

function is_touch_device() {
    
    var prefixes = ' -webkit- -moz- -o- -ms- '.split(' ');
    
    var mq = function (query) {
        return window.matchMedia(query).matches;
    }

    if (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
        return true;
    }

    // include the 'heartz' as a way to have a non matching MQ to help terminate the join
    // https://git.io/vznFH
    var query = ['(', prefixes.join('touch-enabled),('), 'heartz', ')'].join('');
    return mq(query);
}

