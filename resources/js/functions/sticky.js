import {throttle} from './throttle'

var sticky = function(el)
{
    var block = el.querySelector('[data-sticky-block]'),
        parent = block ? block.parentNode : null,
        parentTop = 0,
        totalOffset = 0,
        checkPosition = function(){
            var newParentTop = parent.getBoundingClientRect().top,
                initialTop = parent.getBoundingClientRect().top + pageYOffset,
                docHeight = document.documentElement.clientHeight,
                blockHeight = block.getBoundingClientRect().height,
                max = -initialTop,
                min = docHeight - blockHeight - initialTop,
                offset = newParentTop - parentTop;

            if(newParentTop >=0){
                totalOffset = -pageYOffset;
            } else {
                if(docHeight >= blockHeight) totalOffset = max;
                else totalOffset = Math.max(Math.min(max, totalOffset+offset), min);
            }

            block.style.transform = 'translate(0, '+ totalOffset +'px)';
            parentTop = newParentTop;
        },
        addEvents = function(){
            throttle('scroll', checkPosition);
            throttle('resize', checkPosition);
        },
        fixPosition = function() {
            block.style.width = 'inherit';
            block.style.position='fixed';
            block.style.left='auto';
            block.style.top='80px';
        };

    setTimeout(function(){
        if(!block) {
            return;
        }

        addEvents();
        checkPosition();
        fixPosition();
    }, 150)
};

export {sticky};
